<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Supplier extends Model
{
    use HasFactory;

    protected $table = 'supplier';

    protected $guarded = [];

    public static function search($request)
    {

        $_SESSION['nama_supplier'] = isset($_GET['nama_supplier']) ? $request->nama_supplier : '';
        $_SESSION['alamat'] = isset($_GET['alamat']) ? $request->alamat : '';
        $_SESSION['nomor_hp'] = isset($_GET['nomor_hp']) ? $request->nomor_hp : '';

        $query = DB::table('supplier')
            ->where('nama_supplier', 'like', '%' . $_SESSION['nama_supplier'] . '%')
            ->where('alamat', 'like', '%' . $_SESSION['alamat'] . '%')
            ->where('nomor_hp', 'like', '%' . $_SESSION['nomor_hp'] . '%')
            ->paginate(20);

        return $query;
    } 
}
