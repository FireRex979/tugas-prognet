<?php

namespace App\Http\Controllers;

use App\Models\Suara;
use Illuminate\Http\Request;

class SuaraController extends Controller
{
    public function index()
    {
        $suara = Suara::query()->orderby('suara', 'asc')->paginate(5);
        return view('front.suara.index', compact('suara'));
    }

    public function create()
    {
        return view('front.suara.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'suara' => 'required'
        ]);

        $suara = new Suara();
        $suara->suara = $request->suara;
        $suara->save();

        return redirect()->route('suara.index')->with(['success' => 'Data Berhasil Ditambah']);
    }

    public function show($id)
    {
        $suara = Suara::find($id);
        return view('front.suara.show', compact('suara'));
    }

    public function edit($id)
    {
        $suara = Suara::find($id);
        return view('front.suara.edit', compact('suara'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'suara' => 'required'
        ]);

        $suara = Suara::find($id);
        $suara->suara = $request->suara;
        $suara->save();

        return redirect()->route('suara.index')->with(['success' => 'Data Berhasil Diupdate']);
    }

    public function delete(Request $request)
    {
        $suara = Suara::find($request->id);
        $suara->delete();
        return redirect()->route('suara.index')->with(['success' => 'Data Berhasil Dihapus']);
    }
}
