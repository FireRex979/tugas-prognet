<?php

namespace App\Http\Controllers;

use App\Models\Animal;
use App\Models\Suara;
use App\Models\Mover;
use Illuminate\Http\Request;
use File;

class AnimalController extends Controller
{
    public function index()
    {
        $animal = Animal::query()->with(['suara'])->orderby('nama', 'asc')->paginate(5);
        return view('front.animal.index', compact('animal'));
    }

    public function create()
    {
        $suara = Suara::query()->orderby('suara', 'asc')->get();
        return view('front.animal.create', compact('suara'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'kaki' => 'required',
            'umur' => 'required|numeric|min:0',
            'foto' => 'required|mimes:jpg,jpeg,png,svg',
            'deskripsi' => 'required'
        ]);

        $filename = Mover::slugFile($request->file('foto'), 'foto-animal/');
        $animal = new Animal();
        $animal->nama = $request->nama;
        $animal->usia = $request->umur;
        $animal->jumlah_kaki = $request->kaki;
        $animal->suara_id = $request->suara;
        $animal->foto = $filename;
        $animal->deskripsi = $request->deskripsi;
        $animal->save();

        return redirect()->route('animal.index')->with(['success' => 'Data Berhasil Ditambah']);
    }

    public function show($id)
    {
        $animal = Animal::find($id);
        return view('front.animal.show', compact('animal'));
    }

    public function edit($id)
    {
        $animal = Animal::find($id);
        $suara = Suara::query()->orderby('suara', 'asc')->get();
        return view('front.animal.edit', compact('animal', 'suara'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'kaki' => 'required',
            'umur' => 'required|numeric|min:0',
            'foto' => 'mimes:jpg,jpeg,png,svg',
            'deskripsi' => 'required'
        ]);

        $animal = Animal::find($id);
        if ($request->file('foto') != null) {
            $filename = Mover::slugFile($request->file('foto'), 'foto-animal/');
            File::delete(public_path('foto/animal/' . $animal->foto));
            $animal->foto = $filename;
        }

        $animal->nama = $request->nama;
        $animal->usia = $request->umur;
        $animal->jumlah_kaki = $request->kaki;
        $animal->suara_id = $request->suara;
        $animal->deskripsi = $request->deskripsi;
        $animal->save();

        return redirect()->route('animal.index')->with(['success' => 'Data Berhasil Diupdate']);
    }

    public function delete(Request $request)
    {
        $animal = Animal::find($request->id);
        File::delete(public_path('foto/animal/' . $animal->foto));
        $animal->delete();

        return redirect()->route('animal.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
