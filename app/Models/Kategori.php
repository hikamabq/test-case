<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Kategori extends Model
{
    use HasFactory;

    protected $table = 'kategori';

    protected $guarded = [];

    public static function search($request)
    {
        $_SESSION['kategori'] = isset($_GET['kategori']) ? $request->kategori : '';

        $query = DB::table('kategori')
            ->where('kategori', 'like', '%' . $_SESSION['kategori'] . '%')
            ->paginate(20);

        return $query;
    } 
}
