<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class ArtikelController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //echo "HI!!!";
    }

    public function get()
    {
        //echo "Getdata!!!";
        $data = DB::table('artikel')->get();
        return response()->json($data);
    }

    //
}
