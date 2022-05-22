<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Transaksi;
use App\Models\Produk;
use App\Helpers\Helpers;
use Illuminate\Support\Facades\DB;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $transaksi = Transaksi::search($request);
        return view('admin.transaksi.index', [
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $produk = DB::table('produk')->where('stok', '>', 0)->get();
        $nota = Helpers::nota();
        return view('admin.transaksi.create', [
            'produk' => $produk,
            'nota' => $nota
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nota' => 'required',
            'id_produk' => 'required',
            'jumlah' => 'required'
        ]);
        if (Helpers::cekStok($request->id_produk, $request->jumlah) == false) {
            return redirect()->route('transaksi.create')->with('warning', 'Stok tidak cukup atau habis.');
        }else{
            $transaksi = Transaksi::create([
                'nota' => $request->nota,
                'id_produk' => $request->id_produk,
                'jumlah' => $request->jumlah,
                'harga_total' => Helpers::total($request->id_produk, $request->jumlah),
            ]);
            return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dibuat.');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('admin.transaksi.detail', [
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $transaksi = Transaksi::findOrFail($id);

        return view('admin.transaksi.edit', [
            'transaksi' => $transaksi
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'nota' => 'required',
            'id_produk' => 'required',
            'jumlah' => 'required'
        ]);
        $transaksi = Transaksi::find($id)->update($request->all());

        return redirect()->route('transaksi.index')->with('success', ' Transaksi berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);

        $transaksi->delete();

        return redirect()->route('transaksi.index')->with('success', 'Transaksi berhasil dihapus.');
    }
}
