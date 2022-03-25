<?php

namespace App\Http\Controllers;

use App\Models\kategori;
use App\Models\buku;
use Illuminate\Http\Request;

class Buku2Controller extends Controller
{
    public function index(){
        $buku = buku::all();

        //ubah ke json
        return response()->json([
            'succes' => true,
            'message' => 'List Data buku',
            'data' => $buku
        ], 200);
    }

    public function create(){
        //
    }

    public function store(Request $request){
        $request->validate([

            'judul_buku' => 'required',
            'harga' => 'required',
            'cover' => 'required|image|max:2048',
            'keterangan' => 'required',
            'id_kategori' => 'required',
            'pengarang_buku' => 'required',
            'stok' => 'required',
            'tahun_terbit' => 'required',
        ]);

        $buku = new buku;
        $buku->judul_buku = $request->judul_buku;
        $buku->harga = $request->harga;
        // upload image / foto
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/buku/', $name);
            $buku->cover = $name;
        }
        $buku->keterangan = $request->keterangan;
        $buku->id_kategori = $request->id_kategori;
        $buku->pengarang_buku = $request->pengarang_buku;
        $buku->stok = $request->stok;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->save();
         //ubah ke json
         return response()->json([
            'succes' => true,
            'message' => 'List Data buku',
            'data' => $buku
        ], 200);
    }

    public function show($id){
        $buku = buku::find($id);

        //ubah ke json
        return response()->json([
            'succes' => true,
            'message' => 'List Data buku',
            'data' => $buku
        ], 200);
    }

    public function edit($id){
         //
    }

    public function update(Request $request, $id){

        $buku = buku::findOrFail($id);
        $buku->id_kategori = $request->id_kategori;
        $buku->judul_buku = $request->judul_buku;
        $buku->harga = $request->harga;
        // upload image / foto
        if ($request->hasFile('cover')) {
            $image = $request->file('cover');
            $name = rand(1000, 9999) . $image->getClientOriginalName();
            $image->move('image/buku/', $name);
            $buku->cover = $name;
        }
        else{
            $buku->cover = $buku->cover;
        }
        $buku->keterangan = $request->keterangan;
        $buku->pengarang_buku = $request->pengarang_buku;
        $buku->stok = $request->stok;
        $buku->tahun_terbit = $request->tahun_terbit;
        $buku->save();
        
        //ubah ke json
        return response()->json([
            'succes' => true,
            'message' => 'List Data buku',
            'data' => $buku
        ], 200);

    }
}
