<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaksi::all();

        // return $data;
        return response()->json([
            "message" => "Load Data Success",
            "data" => $data
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $table = new Transaksi();
        // $table->id_transaksi = $request->id_transaksi;
        $table->id_produk = $request->id_produk;
        $table->tgl_transaksi = $request->tgl_transaksi;
        $table->jumlah = $request->jumlah;
        $table->harga = $request->harga;
        $table->save();

        // return $table;
        return response()->json([
            "message" => "Store Success",
            "data" => $table
        ], 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $table = Transaksi::find($id);
        if($table){
            return $table;
        }else{
            return ["message" => "Transaksi tidak tersedia"];
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $table = Transaksi::find($id);
        if($table){
            // $table->id_transaksi = $request->id_transaksi ? $request->id_transaksi : $table->id_transaksi;
            $table->id_produk = $request->id_produk ? $request->id_produk : $table->id_produk;
            $table->tgl_transaksi = $request->tgl_transaksi ? $request->tgl_transaksi : $table->tgl_transaksi;
            $table->jumlah = $request->jumlah ? $request->jumlah : $table->jumlah;
            $table->harga = $request->harga ? $request->harga : $table->harga;
            $table->save();

            return $table;
        }else{
            return ["message" => "Gagal Update Transaksi"];
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $table = Transaksi::find($id);
        if($table){
            $table->delete();
            return ["message" => "Berhasil Membatalkan Transaksi"];
        }else{
            return ["message" => "Transaksi Tidak Tersedia"];
        }
    }
}
