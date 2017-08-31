<?php

namespace App\Http\Controllers;

use App\patient;
use App\Turn;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Styde\Html\Facades\Alert;

class TurnController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $turns = Turn::all();
        $todayTurns = Turn::where(
            'date',
            '<=',
            \Carbon\Carbon::today()->format('Y-m-d 23:59:59')
        )->where(
            'date',
            '>=',
            \Carbon\Carbon::today()->format('Y-m-d 00:00:00')
        )->orderBy('date','asc')->get();

        $patients = patient::where('visible', true)->orderByRaw('UPPER(name) asc')->get();
        return view('turns.index', compact('turns','patients','todayTurns'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $patientId = $request->input('patientId');
        $turnDate = $request->input('turnDate');
        $comments = $request->input('comentarios');

        $patient = patient::findOrFail($patientId);

        $turn = new Turn();
        $turn->date = Carbon::createFromFormat('d/m/Y H:i:s', $turnDate);
        $turn->comments = $comments;
        $turn->patient()->associate($patient);
        $turn->save();

        Alert::success('Turno creado correctamente');

        return redirect()->route('turns.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function show(Turn $turn)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function edit(Turn $turn)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Turn $turn)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Turn  $turn
     * @return \Illuminate\Http\Response
     */
    public function destroy(Turn $turn)
    {
        //
    }
}
