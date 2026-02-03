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
    public function update(Request $request, string $id)
    {
        $validated = $request->validate([
            'kd_barang' => 'required|string|max:15|unique:products,kd_barang,' . $id,
            'nama_barang' => 'required|string|max:50|unique:products,nama_barang,' . $id,
            'jenis_barang' => 'required|string|max:50',
            'tgl_expired' => 'nullable|date',
            'harga_jual' => 'nullable|integer|min:0',
            'stok' => 'nullable|integer|min:0',
            'foto_barang' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = Product::findOrFail($id);

        // Check if data has changed
        $dataChanged = false;
        if ($product->kd_barang != $request->kd_barang ||
            $product->nama_barang != $request->nama_barang ||
            $product->jenis_barang != $request->jenis_barang ||
            $product->tgl_expired != $request->tgl_expired ||
            $product->harga_jual != $request->harga_jual ||
            $product->stok != $request->stok ||
            $request->hasFile('foto_barang')) {
            $dataChanged = true;
        }

        if (!$dataChanged) {
            return redirect()->back()->with('duplikat', 'Duplikasi Data!');
        }

        $oldName = $product->nama_barang;

        $data = $validated;

        if ($request->hasFile('foto_barang')) {
            // Delete old file if exists
            if ($product->foto_barang && Storage::disk('public')->exists($product->foto_barang)) {
                Storage::disk('public')->delete($product->foto_barang);
            }

            $file = $request->file('foto_barang');
            $filename = time() . '_' . $file->getClientOriginalName();
            $path = $file->storeAs('products', $filename, 'public');
            $data['foto_barang'] = $path;
        }

        $product->update($data);

        return redirect()->route('products.index')->with('success', 'Berhasil diupdate!');
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