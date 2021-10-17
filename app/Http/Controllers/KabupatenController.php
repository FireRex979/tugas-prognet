<?php

namespace App\Http\Controllers;

use App\Models\Kabupaten;
use App\Models\Provinsi;
use Illuminate\Http\Request;

class KabupatenController extends Controller
{
    public function index()
    {
        $kabupaten = Kabupaten::query()->paginate(5);
        return view('front.kabupaten.index', compact('kabupaten'));
    }

    public function create()
    {
        $provinsi = Provinsi::query()->orderby('province', 'asc')->get();
        return view('front.kabupaten.create', compact('provinsi'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_kabupaten' => 'required|min:2',
            'kode_pos' => 'required'
        ]);

        $kabupaten = new Kabupaten();
        $kabupaten->city_name = $request->nama_kabupaten;
        $kabupaten->province_id = $request->provinsi_id;
        $kabupaten->pos_code = $request->kode_pos;
        $kabupaten->save();

        return redirect()->route('kabupaten.index')->with(['success' => 'Data Berhasil disimpan.']);
    }

    public function edit($id)
    {
        $provinsi = Provinsi::query()->orderby('province', 'asc')->get();
        $kabupaten = Kabupaten::find($id);
        return view('front.kabupaten.create', compact('provinsi', 'kabupaten'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_kabupaten' => 'required|min:2',
            'kode_pos' => 'required'
        ]);

        $kabupaten = Kabupaten::find($id);
        $kabupaten->city_name = $request->nama_kabupaten;
        $kabupaten->province_id = $request->provinsi_id;
        $kabupaten->pos_code = $request->kode_pos;
        $kabupaten->save();

        return redirect()->route('kabupaten.index')->with(['success' => 'Data Berhasil diupdate.']);
    }

    public function delete(Request $request)
    {
        $kabupaten = Kabupaten::find($request->id);
        $kabupaten->delete();

        return redirect()->route('kabupaten.index')->with(['success' => 'Data Berhasil dihapus.']);
    }
}
