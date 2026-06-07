<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Product;

use Illuminate\Support\Facades\DB;

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
            'title' => 'Products'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {   
        $kd = DB::table('products')->where('kd_barang', $request->kd_barang)->value('kd_barang');
        $nama = DB::table('products')->where('nama_barang', $request->nama_barang)->value('nama_barang');

        if ($request->kd_barang == $kd) {
            return redirect()->route('products.create')->with('duplikat', 'Product ' . $request->kd_barang . ' data with code ' . $request->kd_barang . ' is already in the database!')->withInput();
        }else if ($request->nama_barang == $nama) {
            return redirect()->route('products.create')->with('duplikat', 'Product ' . $request->nama_barang . ' data with name ' . $request->nama_barang . ' is already in the database!')->withInput();
        }else{
            $data = $request->all();
            $data['foto_barang'] = $request->file('foto_barang')->store('product-images', 'public');
            Product::create($data);
            return redirect()->route('products.index')->with('simpan', 'The New Product data, ' . $request->nama_barang . ' has been successfully added to the database!');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        return view('products.edit', [
            'title' => 'Products',
            'data' => Product::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $nama_lama = DB::table('products')->where('id', $id)->value('nama_barang');
        $foto_barang_lama = DB::table('products')->where('id', $id)->value('foto_barang');
        $product = Product::findOrFail($id);
        if($request->hasFile('foto_barang')){
            $data = $request->all();
            $data['foto_barang'] = $request->file('foto_barang')->store('product-images', 'public');
            Storage::disk('public')->delete($foto_barang_lama);
            $product->update($data);
            return redirect()->route('products.index')->with('update', 'The Product data, ' . $nama_lama . ' has been successfully updated!');
        }
        else{
            $product->update($request->all());
            return redirect()->route('products.index')->with('update', 'The Product data, ' . $nama_lama . ' has been successfully updated!');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $ada_purchases = DB::table('purchase__details')->where('id_barang', $id)->exists();
        if ($ada_purchases) {
            return redirect()->route('products.index')->with('forbidden', 'The Product data cannot be deleted because it is still associated with existing purchase_details records!');
        } else {
            $nama = DB::table('products')->where('id', $id)->value('nama_barang');
            Product::findOrFail($id)->delete();
            return redirect()->route('products.index')->with('hapus', 'The Product data, ' . $nama . ' has been successfully deleted!');
        }
    }
}
