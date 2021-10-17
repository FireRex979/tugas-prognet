<?php

namespace App\Http\Controllers;

use App\Models\Provinsi;
use Illuminate\Http\Request;

class ProvinsiController extends Controller
{
    public function index()
    {
        $provinsi = Provinsi::query()->paginate(5);
        return view('front.provinsi.index', compact('provinsi'));
    }

    public function create()
    {
        return view('front.provinsi.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_provinsi' => 'required|min:2'
        ]);

        $provinsi = new Provinsi();
        $provinsi->province = $request->nama_provinsi;
        $provinsi->save();

        return redirect()->route('provinsi.index')->with(['success' => 'Data Berhasil disimpan.']);
    }

    public function edit($id)
    {
        $provinsi = Provinsi::find($id);
        return view('front.provinsi.edit', compact('provinsi'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama_provinsi' => 'required|min:2'
        ]);

        $provinsi = Provinsi::find($id);
        $provinsi->province = $request->nama_provinsi;
        $provinsi->save();

        return redirect()->route('provinsi.index')->with(['success' => 'Data Berhasil diupdate.']);
    }

    public function delete(Request $request)
    {
        $provinsi = Provinsi::find($request->id);
        $provinsi->delete();

        return redirect()->route('provinsi.index')->with(['success' => 'Data Berhasil dihapus']);
    }
}
