<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Produk::all();

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
        // $table = Produk::create([
        //     "id_produk" => $request->id_produk,
        //     "nama_produk" => $request->nama_produk,
        //     "deskripsi" => $request->deskripsi,
        // ]);

        $table = new Produk();
        $table->id_produk = $request->id_produk;
        $table->nama_produk = $request->nama_produk;
        $table->deskripsi = $request->deskripsi;
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
        $table = Produk::find($id);
        if($table){
            return $table;
        }else{
            return ["message" => "Produk tidak tersedia"];
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
        $table = Produk::find($id);
        if($table){
            $table->id_produk = $request->id_produk ? $request->id_produk : $table->id_produk;
            $table->nama_produk = $request->nama_produk ? $request->nama_produk : $table->nama_produk;
            $table->deskripsi = $request->deskripsi ? $request->deskripsi : $table->deskripsi;
            $table->harga = $request->harga ? $request->harga : $table->harga;
            $table->save();

            return $table;
        }else{
            return ["message" => "Gagal Update Produk"];
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
        $table = Produk::find($id);
        if($table){
            $table->delete();
            return ["message" => "Berhasil Menghapus Produk"];
        }else{
            return ["message" => "Produk Tidak Tersedia"];
        }
    }
}
