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
        if ($request->ajax()) {
            $turn->date = $request->input('turnNewDate');
            $turn->save();
            return response()->json(['success'=>'true']);
        } else {
            $turnDate = $request->input('turnDate');
            $comments = $request->input('comentarios');

            $turn->date = Carbon::createFromFormat('Y-m-d H:i:s', $turnDate);
            $turn->comments = $comments;
            $turn->save();
            Alert::success('Turno modificado correctamente');
        }
    }

    public function update2(Request $request)
    {
        $turnId = $request->input('turnId');
        $turn = Turn::findOrFail($turnId);
        $this->update($request, $turn );

        return redirect()->back();
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

    /**
     * @param Turn $turn
     * @return \Illuminate\Http\Response
     */
    public function getTurn(Turn $turn)
    {
        return response()->json(['success'=>'true','data' => $turn->toJson() ]);
    }
}
