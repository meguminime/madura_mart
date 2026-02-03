<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('be.products.index', [
            'title' => 'Products',
            'datas' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('be.products.create', [
            'title' => 'Create Product',
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'kd_barang' => 'required|string|max:15|unique:products,kd_barang',
            'nama_barang' => 'required|string|max:50|unique:products,nama_barang',
            'jenis_barang' => 'required|string|max:50',
            'tgl_expired' => 'nullable|date',
            'harga_jual' => 'nullable|integer|min:0',
            'stok' => 'nullable|integer|min:0',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $data = $validated;

        if ($request->hasFile('foto_barang')) {
            $file = $request->file('foto_barang');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('products', $filename, 'public');
            $data['foto_barang'] = $path;
        }

        Product::create($data);

        return redirect()->route('products.index')->with('success', 'Product data has been successfully saved');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $product = Product::findOrFail($id);
        return view('be.products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('be.products.edit', [
            'product' => $product,
            'title' => 'Edit Product'
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
   public function update(Request $request, $id)
{
   $product = Product::findOrFail($id);

    // 🔍 cek duplikat (kecuali dirinya sendiri)
    $duplikat = Product::where('kd_barang', $request->kd_barang)
        ->where('nama_barang', $request->nama_barang)
        ->where('jenis_barang', $request->jenis_barang)
        ->where('id', '!=', $id)
        ->first();

    if ($duplikat) {
        return redirect()
            ->route('products.edit', $id)
            ->with('duplikat', 'Produk dengan data yang sama sudah ada.');
    }

    $data = $request->only([
        'kd_barang',
        'nama_barang',
        'jenis_barang',
        'tgl_expired',
        'harga_jual',
        'stok'
    ]);

    // 📸 kalau upload foto baru
    if ($request->hasFile('foto_barang')) {

        // hapus foto lama
        if (
            $product->foto_barang &&
            Storage::exists('public/foto_barang/' . $product->foto_barang)
        ) {
            Storage::delete('public/foto_barang/' . $product->foto_barang);
        }

        $file = $request->file('foto_barang');
        $namaFile = time() . '_' . $file->getClientOriginalName();
        $file->storeAs('public/foto_barang', $namaFile);

        $data['foto_barang'] = $namaFile;
    }

    $product->update($data);

    return redirect()
        ->route('products.index')
        ->with('ubah', 'Produk ' . $product->nama_barang . ' berhasil diperbarui');
}


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $product = Product::findOrFail($id);
        $product->delete();

        return redirect()->route('products.index')->with('success', 'Product data has been successfully deleted!');
    }
}