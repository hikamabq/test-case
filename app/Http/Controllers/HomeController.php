<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {   
        $produk = DB::table('produk')->count();
        $supplier = DB::table('supplier')->count();
        $pelanggan = DB::table('pelanggan')->count();
        $kategori = DB::table('kategori')->count();
        return view('admin.dashboard.index', [
            'produk' => $produk,
            'supplier' => $supplier,
            'pelanggan' => $pelanggan,
            'kategori' => $kategori
        ]);
    }
}
