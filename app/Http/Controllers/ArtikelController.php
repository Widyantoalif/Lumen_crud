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
}
