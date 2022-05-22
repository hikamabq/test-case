<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Pelanggan extends Model
{
    use HasFactory;

    protected $table = 'pelanggan';

    protected $guarded = [];

    public static function search($request){

        $_SESSION['nama_pelanggan'] = isset($_GET['nama_pelanggan']) ? $request->nama_pelanggan : '';
        $_SESSION['nomor_hp'] = isset($_GET['nomor_hp']) ? $request->nomor_hp : '';

        $query = DB::table('pelanggan')
            ->where('nama_pelanggan', 'like', '%'.$_SESSION['nama_pelanggan'].'%')
            ->where('nomor_hp', 'like', '%' . $_SESSION['nomor_hp'] . '%')
            ->paginate(20);

        return $query;
    } 
}
