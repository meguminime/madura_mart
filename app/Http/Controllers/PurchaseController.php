<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use App\Models\Distributor;
use App\Models\Product;
use App\Models\Purchase;
use App\Models\Purchase_Detail;
use App\Models\User;


class PurchaseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('purchase.index', [
            'title' => 'Purchase',
            'datas' => DB::table('vwpurchases')->get()
            
        ]);
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('purchase.create', [
            'title' => 'Purchase',
            'distributors' => Distributor::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        if($request->has('no_nota')) {
            $purchase = $request->only('no_nota', 'tgl_nota', 'id_distributor');
            $purchase['total_bayar'] = 0;
            $purchase = Purchase::create($purchase);
        }

        $purchaseDetails = $request->only('id_barang', 'harga_beli', 'margin_jual', 'jumlah_beli', 'subtotal');
        $purchaseDetails['id_pembelian'] = DB::table('purchases')->max('id');
        $purchaseDetails = Purchase_Detail::create($purchaseDetails);

        return redirect()->route('purchase.index')->with('success', 'Purchase with invoice no  '. $request->no_nota .' has been created successfully.')
        ->with('success', 'Purchase details for invoice no  '. $request->no_nota .' has been created successfully.')
        ->with('data', DB::table('purchases')->where('id', DB::table('purchases')->max('id'))->first());
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
        $data = DB::table('vwpurchases')->where('id_purchases', $id)->first();

        if (!$data) {
            return redirect()->route('purchase.index')->with('error', 'Purchase data not found.');
        }

        return view('purchase.edit', [
            'title' => 'Purchase',
            'data' => $data,
            'distributors' => Distributor::all(),
            'products' => Product::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Get the purchase detail record
        $purchaseDetail = DB::table('vwpurchases')->where('id_purchases', $id)->first();

        if (!$purchaseDetail) {
            return redirect()->route('purchase.index')->with('error', 'Purchase data not found.');
        }

        // Update the purchase record
        Purchase::where('id', $id)->update([
            'no_nota' => $request->no_nota,
            'tgl_nota' => $request->tgl_nota,
            'id_distributor' => $request->id_distributor,
            'total_bayar' => $request->total_bayar ?? 0,
        ]);

        // Update the purchase detail record
        Purchase_Detail::where('id', $purchaseDetail->id_PD)->update([
            'id_barang' => $request->id_barang,
            'harga_beli' => $request->harga_beli,
            'margin_jual' => $request->margin_jual,
            'jumlah_beli' => $request->jumlah_beli,
            'subtotal' => $request->subtotal,
        ]);

        return redirect()->route('purchase.index')->with('success', 'Purchase with invoice no '. $request->no_nota .' has been updated successfully.');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $purchase = Purchase::find($id);

        if (!$purchase) {
            return response()->json(['success' => false, 'message' => 'Purchase data not found.'], 404);
        }

        // Delete associated purchase details first
        Purchase_Detail::where('id_pembelian', $id)->delete();
        $purchase->delete();

        return response()->json(['success' => true, 'message' => 'Purchase data has been deleted successfully.']);
    }

    /**
     * Validate the boss (Library Head / owner) password.
     */
    public function validatePassword(Request $request)
    {
        $request->validate([
            'password' => 'required',
        ]);

        // Find the boss user (role = 'owner' or the first admin/owner user)
        $boss = User::where('role', 'owner')->first();

        if (!$boss) {
            // Fallback: try 'admin' role
            $boss = User::where('role', 'admin')->first();
        }

        if (!$boss) {
            return response()->json([
                'success' => false,
                'message' => 'No boss/owner account found in the system.'
            ]);
        }

        // Verify the password
        if (Hash::check($request->password, $boss->password)) {
            return response()->json([
                'success' => true,
                'message' => 'Your password is correct!'
            ]);
        }

        return response()->json([
            'success' => false,
            'message' => 'Incorrect password! Access denied.'
        ]);
    }
}