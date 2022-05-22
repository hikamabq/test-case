<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Pelanggan;

class PelangganController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $pelanggan = Pelanggan::search($request);
        return view('admin.pelanggan.index', [
            'pelanggan' => $pelanggan
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.pelanggan.create');
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
            'nama_pelanggan' => 'required',
            'nomor_hp' => 'required'
        ]);
        $pelanggan = Pelanggan::create($request->all());

        return redirect()->route('pelanggan.index')->with('success', ' Pelanggan baru berhasil dibuat.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pelanggan = Pelanggan::findOrFail($id);

        return view('admin.pelanggan.detail', [
            'pelanggan' => $pelanggan
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
        $pelanggan = Pelanggan::findOrFail($id);

        return view('admin.pelanggan.edit', [
            'pelanggan' => $pelanggan
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
            'nama_pelanggan' => 'required',
            'nomor_hp' => 'required'
        ]);
        $pelanggan = Pelanggan::find($id)->update($request->all());

        return redirect()->route('pelanggan.index')->with('success', ' Pelanggan berhasil diedit.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $pelanggan = Pelanggan::find($id);

        $pelanggan->delete();

        return redirect()->route('pelanggan.index')->with('success', ' Pelanggan berhasil dihapus.');
    }
}
