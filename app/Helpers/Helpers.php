<?php

namespace App\Helpers;

use Illuminate\Support\Facades\DB;

class Helpers
{

    public static function nota()
    {
        $cek = DB::table('transaksi')->latest()->first();
        if ($cek == null) {
            $nota = 1;
            $nota = 'NOTA-'.$nota;
            return $nota;
        }else{
            $nota = $cek->id + 1;
            $nota = 'NOTA-' . $nota;
            return $nota;
        }
    }
    public static function total($produk, $jumlah)
    {
        $cekProduk = DB::table('produk')->where('id', $produk)->first();
        $total = $cekProduk->harga_produk * $jumlah;
        return $total;
    }
    public static function cekStok($produk, $jumlah)
    {
        $cekProduk = DB::table('produk')->where('id', $produk)->first();

        if ($cekProduk->stok < $jumlah) {
            return false;
        }else{
            $stok = $cekProduk->stok - $jumlah;
            $update = DB::table('produk')
                ->where('id', $cekProduk->id)
                ->update(['stok' => $stok]);
            return true;
        }
    }

}
