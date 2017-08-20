<?php

namespace App\Http\Controllers;

use App\patient;
use App\PatientMeasure;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = patient::where('visible', true)->get();

        return view('patients.index', compact('patients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('patients.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'height' => 'required',
            'weight' => 'required'
        ]);

        $patient = new patient();
        $patient->name = $request->input('name');
        $patient->age = $request->input('age');
        $patient->phone = $request->input('phone');
        $patient->email = $request->input('email');

        $height = new PatientMeasure();
        $height->measure = 'height';
        $height->value = $request->input('height');

        $weight = new PatientMeasure();
        $weight->measure = 'weight';
        $weight->value = $request->input('weight');

        $patient->save();
        $patient->measures()->saveMany([$height,$weight]);

        return redirect()->route('patient.edit', $patient);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $patient = patient::findOrFail($id);
        $weightHistory = $patient->getWeights();

        return view('patients.edit', compact('patient','weightHistory'));
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
        $this->validate($request, [
            'name' => 'required',
            'height' => 'required',
            'weight' => 'required'
        ]);

        $patient = patient::findOrFail($id);
        $patient->name = $request->input('name');
        $patient->age = $request->input('age');
        $patient->phone = $request->input('phone');
        $patient->email = $request->input('email');

        $patient->save();

        $newHeight = $request->input('height');
        if ($patient->getHeight() != $newHeight){
            $height = new PatientMeasure();
            $height->measure = 'height';
            $height->value = $newHeight;
            $patient->measures()->save($height);
        }

        $newWeight = $request->input('weight');
        if ($patient->getWeight() != $newWeight) {
            $weight = new PatientMeasure();
            $weight->measure = 'weight';
            $weight->value = $newWeight;
            $patient->measures()->save($weight);
        }

        return redirect()->route('patient.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
        $patient = patient::findOrFail($id);
        $patient->visible = false;
        $patient->save();

        $request->session()->flash('alert-success', "El paciente $patient->name fue eliminado correctamente" );

        return redirect()->route('patient.index');
    }

    public function measuresDestroy(Request $request, $id)
    {
        $measure = PatientMeasure::findOrFail($id);
        $measure->delete();

        $request->session()->flash('alert-success', "El registro fue eliminado correctamente" );

        return redirect()->route('patient.edit',$measure->patient);
    }

}
