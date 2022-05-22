<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Produk extends Model
{
    use HasFactory;

    protected $table = 'produk';

    protected $guarded = [];

    public static function search($request)
    {
        $_SESSION['nama_produk'] = isset($_GET['nama_produk']) ? $request->nama_produk : '';
        $_SESSION['harga_produk'] = isset($_GET['harga_produk']) ? $request->harga_produk : '';
        $_SESSION['stok'] = isset($_GET['stok']) ? $request->stok : '';
        $_SESSION['kategori'] = isset($_GET['kategori']) ? $request->kategori : '';
        $_SESSION['supplier'] = isset($_GET['supplier']) ? $request->supplier : '';

        $query = DB::table('produk')
            ->join('kategori', 'produk.id_kategori', '=', 'kategori.id')
            ->join('supplier', 'produk.id_supplier', '=', 'supplier.id')
            ->select(
                'produk.*',
                'kategori.kategori',
                'supplier.nama_supplier'
            )
            ->where('produk.nama_produk', 'like', '%' . $_SESSION['nama_produk'] . '%')
            ->where('produk.harga_produk', 'like', '%' . $_SESSION['harga_produk'] . '%')
            ->where('produk.stok', 'like', '%' . $_SESSION['stok'] . '%')
            ->where('kategori.kategori', 'like', '%' . $_SESSION['kategori'] . '%')
            ->where('supplier.nama_supplier', 'like', '%' . $_SESSION['supplier'] . '%')
            ->paginate(20);

        return $query;
    }

    public static function validasi($request)
    {
        $data = $request->nama_produk;
        $cek = DB::table('produk')->where('nama_produk', $data)->count();
        if ($cek == 0) {
            return true;
        }else{
            return false;
        }
    } 
}
