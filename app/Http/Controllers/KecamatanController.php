<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Kecamatan;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KecamatanController extends Controller
{
    public function index()
    {
        $kecamatan = Kecamatan::query()->paginate(10);
        return view('front.kecamatan.index', compact('kecamatan'));
    }

    public function getKabupaten(Request $request)
    {
        $kabupaten = Kabupaten::query()->where('province_id', $request->provinsi_id)->get();
        return response()->json(['data' => $kabupaten]);
    }

    public function create()
    {
        $provinsi = Provinsi::query()->get();
        return view('front.kecamatan.create', compact('provinsi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'kabupaten_id' => 'required',
            'nama_kecamatan' => 'required'
        ]);

        $kecamatan = new Kecamatan();
        $kecamatan->kabupaten_id = $request->kabupaten_id;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with(['success' => 'Data Berhasil ditambahkan.']);
    }

    public function edit($id)
    {
        $kecamatan = Kecamatan::find($id);
        $provinsi = Provinsi::query()->get();
        $kabupaten = Kabupaten::query()->where('province_id', $kecamatan->kabupaten->province_id)->get();
        return view('front.kecamatan.edit', compact('provinsi', 'kecamatan', 'kabupaten'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kabupaten_id' => 'required',
            'nama_kecamatan' => 'required'
        ]);

        $kecamatan = Kecamatan::find($id);
        $kecamatan->kabupaten_id = $request->kabupaten_id;
        $kecamatan->nama_kecamatan = $request->nama_kecamatan;
        $kecamatan->save();
        return redirect()->route('kecamatan.index')->with(['success' => 'Data Berhasil diupdate.']);
    }

    public function delete(Request $request)
    {
        $kecamatan = Kecamatan::find($request->id);
        $kecamatan->delete();
        return redirect()->route('kecamatan.index')->with(['success' => 'Data Berhasil dihapus.']);
    }
}
