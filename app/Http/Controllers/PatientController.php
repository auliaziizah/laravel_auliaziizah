<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Patient;
use App\Models\Hospital;

class PatientController extends Controller
{
    public function index()
    {
        $hospitals = Hospital::all();
        $patients = Patient::with('hospital')->get();
        return view('patient.list', compact('patients', 'hospitals'));
    }

    public function form_create()
    {
        $hospitals = Hospital::all();
        return view('patient.create', compact('hospitals'));
    }

    public function create(Request $request)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'id_rumah_sakit' => 'required',
        ]);
        Patient::create($request->all());

        return redirect()->route('patient.list')->with('success', 'Data rumah sakit berhasil ditambahkan!');
    }

    public function form_update($id)
    {
        $hospitals = Hospital::all();
        $patient = Patient::findOrFail($id);
        return view('patient.update', compact('patient', 'hospitals'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'nama' => 'required',
            'alamat' => 'required',
            'no_telepon' => 'required',
            'id_rumah_sakit' => 'required',
        ]);

        $patient = Patient::findOrFail($id);
        $patient->update($request->all());

        return redirect()->route('patient.list')->with('success', 'Data rumah sakit berhasil diperbarui!');
    }
    
    public function delete($id)
    {
        $patient = Patient::findOrFail($id);
        $patient->delete();

        return response()->json(['success' => true]);
    }

    public function filter(Request $request)
    {
        $hospitalId = $request->hospital_id;

        $patients = Patient::with('hospital')
            ->when($hospitalId, function($query, $hospitalId) {
                return $query->where('id_rumah_sakit', $hospitalId);
            })
            ->get();

        // Render baris <tr> saja untuk mengganti isi <tbody>
        $html = '';
        foreach ($patients as $index => $patient) {
            $html .= '
                <tr id="patient-'.$patient->id.'">
                    <td>'.($index+1).'</td>
                    <td>'.$patient->nama.'</td>
                    <td>'.$patient->alamat.'</td>
                    <td>'.$patient->no_telepon.'</td>
                    <td>'.($patient->hospital->nama ?? '-').'</td>
                    <td>
                        <div class="d-flex gap-1">
                            <a href="'.route('patient.form.update', $patient->id).'" class="btn btn-primary btn-sm">Update</a>
                            <button class="btn btn-danger btn-sm delete-patient" data-id="'.$patient->id.'">Delete</button>
                        </div>
                    </td>
                </tr>
            ';
        }

        return response($html);
    }
}
