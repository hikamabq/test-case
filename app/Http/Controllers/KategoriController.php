<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Kategori;
use App\Models\Produk;

class KategoriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $kategori = Kategori::search($request);
        return view('admin.kategori.index', [
            'kategori' => $kategori
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.kategori.create');
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
            'kategori' => 'required'
        ]);
        $kategori = Kategori::create($request->all());

        return redirect()->route('kategori.index')->with('success', ' Kategori baru berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $kategori = Kategori::findOrFail($id);

        return view('admin.kategori.detail', [
            'kategori' => $kategori
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
        $kategori = Kategori::findOrFail($id);

        return view('admin.kategori.edit', [
            'kategori' => $kategori
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
            'kategori' => 'required'
        ]);
        $kategori = Kategori::find($id)->update($request->all()); 

        return redirect()->route('kategori.index')->with('success', ' Kategori berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cek = Produk::where('id_kategori', $id)->first();
        // var_dump($cek);
        if ($cek != null) {
            return redirect()->route('kategori.index')->with('warning', ' Kategori masih dipakai produk.');
        }else{
            $kategori = Kategori::find($id);
            $kategori->delete();
            return redirect()->route('kategori.index')->with('success', ' Kategori berhasil dihapus.');
        }

    }
    public function kategoriSearch(Request $request)
    {
        $data = [];

        if ($request->has('q')) {
            $search = $request->q;
            $data = Kategori::select('id', 'kategori')
            ->where('kategori', 'LIKE', "%$search%")
            ->get();
        }
        return response()->json($data);
    }
}
