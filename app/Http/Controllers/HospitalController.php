<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Hospital;

class HospitalController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();
        return view('hospital.list', compact('hospitals'));
    }

    public function form_create()
    {
        return view('hospital.create');
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telepon' => 'required',
        ]);

        Hospital::create($request->all());

        return redirect()->route('hospital.list')->with('success', 'Data rumah sakit berhasil ditambahkan!');
    }

    public function form_update($id)
    {
        $hospital = Hospital::findOrFail($id);
        return view('hospital.update', compact('hospital'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'email' => 'required',
            'telepon' => 'required',
        ]);

        $hospital = Hospital::findOrFail($id);
        $hospital->update($request->all());

        return redirect()->route('hospital.list')->with('success', 'Data rumah sakit berhasil diperbarui!');
    }
    
    public function delete($id)
    {
        $hospital = Hospital::findOrFail($id);
        $hospital->delete();

        return response()->json(['success' => true]);
    }
}
