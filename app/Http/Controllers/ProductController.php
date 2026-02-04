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
        return view('products.index', [
            'title' => 'Products',
            'datas' => Product::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('products.create', [
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
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $product = Product::findOrFail($id);
        return view('products.edit', [
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

    $data = $request->only([
        'kd_barang',
        'nama_barang',
        'jenis_barang',
        'tgl_expired',
        'harga_jual',
        'stok'
    ]);

    // cek apakah ADA perubahan
    $product->fill($data);

    if (!$product->isDirty() && !$request->hasFile('foto_barang')) {
        return redirect()
            ->route('products.index')
            ->with('duplicated', true);
    }

    // 📸 upload foto baru
    if ($request->hasFile('foto_barang')) {

        if ($product->foto_barang && Storage::disk('public')->exists($product->foto_barang)) {
            Storage::disk('public')->delete($product->foto_barang);
        }

        $file = $request->file('foto_barang');
        $filename = time() . '_' . $file->getClientOriginalName();
        $path = $file->storeAs('products', $filename, 'public');

        $data['foto_barang'] = $path;
    }

    $product->update($data);

    return redirect()
        ->route('products.index')
        ->with('success', 'Produk berhasil diperbarui');
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