<?php

namespace App\Http\Controllers;

use App\Models\Pesanan;

use Illuminate\Http\Request;

class PesananController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $pesanan = Pesanan::latest()->paginate(6);
        return view('pesanan/index', compact('pesanan'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //['kode', 'nama_pesanan', 'harga', 'tanggal', 'nomor_meja', 'keterangan', 'status'];
        $kode = Date('Ymd') . rand(10, 200);
        Pesanan::create([
            'kode' => $kode,
            'nama_pesanan' => $request->nama_pesanan,
            'quantity' => $request->quantity,
            'harga' => $request->harga,
            'tanggal' => Date('Y-m-d'),
            'nomor_meja' => $request->nomor_meja,
            'keterangan' => $request->keterangan,
            'status' => 0
        ]);
        return redirect()->route('index')->with('success', 'Pesanan sudah kami terima, mohon tunggu pesanan anda.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pesanan = Pesanan::find($id);
        $pesanan->status = $request->status;
        $pesanan->save();
        return redirect()->route('pesanan.index')->with('success', 'Berhasil diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
