<?php

namespace App\Http\Controllers;

use App\Artikel;
use Illuminate\Http\Request;

class ArtikelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * 
     * 
     */
    public function __construct()
    {
        //echo "HI!!!";
    }

    public function get()
    {
        //echo "Getdata!!!";
        $data = Artikel::get();
        return response()->json($data);
    }

    public function add(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required',
            'foto' => 'required',
            'isi' => 'required',
        ]);

        //echo "Getdata!!!";
        $judul = $request->judul;
        $foto = $request->foto;
        $isi = $request->isi;

        $add = Artikel::create([
            'judul'  => $judul,
            'foto' => $foto,
            'isi' => $isi,
        ]);
        if ($add) {
            return response()->json([
                'status' => "berhasil tambah artikel",
                'data' => $add
            ]);
        } else {
            return response()->json([
                'status' => "gagal tambah artikel",
                'data' => null
            ]);
        }
    }
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'judul' => 'required',
            'foto' => 'required',
            'isi' => 'required',
        ]);

        //echo "Getdata!!!";
        $judul = $request->judul;
        $foto = $request->foto;
        $isi = $request->isi;

        $artikel = Artikel::find($id);

        $update = $artikel->update([
            'judul'  => $judul,
            'foto' => $foto,
            'isi' => $isi,
        ]);

        if ($update) {
            return response()->json([
                'status' => "berhasil ubah artikel",
                'data' => $artikel
            ]);
        } else {
            return response()->json([
                'status' => "gagal ubah artikel",
                'data' => null
            ]);
        }
    }

    public function delete($id)
    {
        $artikel = Artikel::find($id);
        $delete = $artikel->delete();

        if ($delete) {
            return response()->json([
                'status' => "berhasil hapus artikel",
                'data' => $artikel
            ]);
        } else {
            return response()->json([
                'status' => "gagal hapus artikel",
                'data' => null
            ]);
        }
    }
}
