<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Transaksi extends Model
{
    use HasFactory;

    protected $table = 'transaksi';

    protected $guarded = [];

    public static function search($request)
    {

        $_SESSION['nota'] = isset($_GET['nota']) ? $request->nota : '';
        $_SESSION['id_produk'] = isset($_GET['id_produk']) ? $request->id_produk : '';
        $_SESSION['jumlah'] = isset($_GET['jumlah']) ? $request->jumlah : '';
        $_SESSION['harga_total'] = isset($_GET['harga_total']) ? $request->harga_total : '';
        $_SESSION['tanggal'] = isset($_GET['tanggal']) ? $request->tanggal : '';
        $query = DB::table('transaksi')
            ->join('produk', 'transaksi.id_produk', '=', 'produk.id')
            ->select(
                'transaksi.*',
                'produk.nama_produk',
                'produk.harga_produk'
            )
            ->where('transaksi.nota', 'like', '%' . $_SESSION['nota'] . '%')
            ->where('transaksi.jumlah', 'like', '%' . $_SESSION['jumlah'] . '%')
            ->where('transaksi.harga_total', 'like', '%' . $_SESSION['harga_total'] . '%')
            // ->whereDate('transaksi.created_at', '%' . $_SESSION['tanggal'] . '%')
            ->where('produk.nama_produk', 'like', '%' . $_SESSION['id_produk'] . '%')
            ->paginate(20);
        return $query;
    } 
}
