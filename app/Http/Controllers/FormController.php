<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class FormController extends Controller
{
    //
    public function index(){
        echo "haii";
    }

    public function data_produk(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('produk')->select('id', 'nama_produk')
            ->where('nama_produk', 'LIKE', '%' . $cari . '%')
            ->get();
            return response()->json($data);
        }
    }
    public function data_kategori(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('kategori')->select('id', 'kategori')
            ->where('kategori', 'LIKE', '%' . $cari . '%')
                ->get();
            return response()->json($data);
        }
    }
    public function data_supplier(Request $request)
    {
        if ($request->has('q')) {
            $cari = $request->q;
            $data = DB::table('supplier')->select('id', 'nama_supplier')
                ->where('nama_supplier', 'LIKE', '%' . $cari . '%')
                ->get();
            return response()->json($data);
        }
    }

}
