<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use App\Models\Purchase;
use App\Models\Purchase_Detail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Validator;

class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('purchases.index', [
            'title' => 'Purchases',
            'datas' => Purchase::with('distributor')->get()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $distributors = \App\Models\Distributor::all();
        $products = \App\Models\Product::all();
        return view('purchases.create', [
            'title' => 'Create Purchase',
            'distributors' => $distributors,
            'products' => $products,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'no_nota' => 'required|string|max:255|unique:purchases,no_nota',
            'tgl_nota' => 'required|date',
            'id_distributor' => 'required|exists:distributors,id',
            'products' => 'required|array|min:1',
            'products.*.id_barang' => 'required|exists:products,id',
            'products.*.harga_beli' => 'required|numeric|min:0',
            'products.*.margin_jual' => 'required|numeric|min:0',
            'products.*.jumlah_beli' => 'required|integer|min:1',
            'products.*.subtotal' => 'required|numeric|min:0',
        ]);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        DB::transaction(function () use ($request) {
            $totalBayar = collect($request->products)->sum('subtotal');

            $purchase = Purchase::create([
                'no_nota' => $request->no_nota,
                'tgl_nota' => $request->tgl_nota,
                'id_distributor' => $request->id_distributor,
                'total_bayar' => $totalBayar,
            ]);

            foreach ($request->products as $product) {
                Purchase_Detail::create([
                    'id_pembelian' => $purchase->id,
                    'id_barang' => $product['id_barang'],
                    'harga_beli' => $product['harga_beli'],
                    'margin_jual' => $product['margin_jual'],
                    'jumlah_beli' => $product['jumlah_beli'],
                    'subtotal' => $product['subtotal'],
                ]);
            }
        });

        return redirect()->route('purchases.index')->with('success', 'Purchase created successfully.');
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
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
