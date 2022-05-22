<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Produk;
use App\Models\Kategori;
use App\Models\Supplier;

class ProdukController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $produk = Produk::search($request);
        $kategori = Kategori::all();
        $supplier = Supplier::all();
        return view('admin.produk.index', [
            'produk' => $produk,
            'kategori' => $kategori,
            'supplier' => $supplier
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $supplier = Supplier::all();
        $kategori = Kategori::all();
        return view('admin.produk.create', [
            'kategori' => $kategori,
            'supplier' => $supplier
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
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required',
            'stok' => 'required',
            'id_kategori' => 'required',
            'id_supplier' => 'required'
        ]);

        $validateProduk = Produk::validasi($request);
       
        if ($validateProduk == true) {

            // $path = $request->file('gambar')->store('public/image');
            // if (!empty($request->file('gambar'))) {
            //     $input['gambar'] = $request->file('gambar')->store('')
                
            // }
            $input = $request->all();
            $produk = Produk::create($input);
            return redirect()->route('produk.index')->with('success', ' Produk baru berhasil dibuat.');
        }else{
            return redirect()->route('produk.create')->with('warning', ' Produk sudah ada.');
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
        $produk = Produk::findOrFail($id);

        return view('admin.produk.detail', [
            'produk' => $produk
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
        $produk = Produk::findOrFail($id);
        $supplier = Supplier::all();
        $kategori = Kategori::all();
        return view('admin.produk.edit', [
            'produk' => $produk,
            'kategori' => $kategori,
            'supplier' => $supplier
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
            'nama_produk' => 'required',
            'deskripsi_produk' => 'required',
            'harga_produk' => 'required',
            'stok' => 'required',
            'id_kategori' => 'required',
            'id_supplier' => 'required'
        ]);

        $produk = Produk::find($id)->update($request->all());

        return redirect()->route('produk.index')->with('success', ' Produk berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $produk = Produk::find($id);

        $produk->delete();

        return redirect()->route('produk.index')->with('success', ' Produk berhasil dihapus.');
    }
}
