<?php

namespace App\Http\Controllers;

use App\Models\dmPatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\View\View;

class DmPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() : View
    {
        abort_if(Gate::denies("patient_access"), 403);

        $dmPatients = dmPatient::all();

        $data=[
            "dmPatients"=>$dmPatients
        ];

        return view('dmPatients.index', $data);
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\dmPatient  $dmPatient
     * @return \Illuminate\Http\Response
     */
    public function show(dmPatient $dmPatient)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\dmPatient  $dmPatient
     * @return \Illuminate\Http\Response
     */
    public function edit(dmPatient $dmPatient)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\dmPatient  $dmPatient
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, dmPatient $dmPatient)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\dmPatient  $dmPatient
     * @return \Illuminate\Http\Response
     */
    public function destroy(dmPatient $dmPatient)
    {
        //
    }
}
