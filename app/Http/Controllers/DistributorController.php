<?php

namespace App\Http\Controllers;

use App\Models\Distributor;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DistributorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        return view('distributor.index', [
            'title' => 'Distributor',
            'datas' => Distributor::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('distributor.create', [
            'title' => 'Distributor'
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $data = $request->only(['nama_distributor', 'alamat_distributor', 'notelepon_distributor']);
        Distributor::create($data);
        return redirect()->route('distributor.index')->with('simpan', 'The new Distributor Data, ' . $request->nama_distributor . ', has been succesfully saved');
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
        return view('distributor.edit', [
            'title' => 'Distributor',
            'data' => Distributor::findOrFail($id)
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
        $distributor_lama = DB::table('distributors')->where('id', $id)->value('nama_distributor');
        $nama = DB::table('distributors')->where('nama_distributor', $request->nama_distributor)->value('nama_distributor');
        $alamat = DB::table('distributors')->where('alamat_distributor', $request->alamat_distributor)->value('alamat_distributor');
        $notelepon = DB::table('distributors')->where('notelepon_distributor', $request->notelepon_distributor)->value('notelepon_distributor');

        if ($request->nama_distributor == $nama && $request->alamat_distributor == $alamat && $request->notelepon_distributor == $notelepon) {
            return redirect()->route('distributor.edit', $id)->with('duplikat', 'Distributor ' . $request->nama_distributor . ' data with the same address ' . $request->alamat_distributor . ' and phone number ' . $request->notelepon_distributor . ' is already exists. Please use different data.');
        }else{
            //
            $data = $request->only(['nama_distributor', 'alamat_distributor', 'notelepon_distributor']);
            $distributor = Distributor::findOrFail($id);
            $distributor->update($data);
            return redirect()->route('distributor.index')->with('ubah', 'The Distributor Data, ' . $distributor_lama . ' become ' . $request->nama_distributor . ', has been succesfully updated');
        }
        
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
