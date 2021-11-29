<?php

namespace App\Http\Controllers;

use App\Http\Requests\GlucoseRequest;
use App\Models\dmPatient;
use App\Models\Glucose;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class GlucoseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @param dmPatient $dmPatient
     * @return View
     */
    public function create(dmPatient $dmPatient): View
    {
        abort_if(Gate::denies("glucose_create"), 403);

        $stripes=["Lot 1", "Lot 2", "Lot 3"];
        $glucometers=["Gluco A", "Gluco B"];
        $ysi_ones=["Lot 1 - Gluco A", "Lot 1 - Gluco B","Lot 2 - Gluco A", "Lot 2 - Gluco B","Lot 3 - Gluco A", "Lot 3 - Gluco B" ];

        $data = [
            "dmPatient" => $dmPatient,
            "stripes"=>$stripes,
            "glucometers"=>$glucometers,
            "ysi_ones"=>$ysi_ones,

        ];

        return view('glucose.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param dmPatient $dmPatient
     * @return \Illuminate\Http\RedirectResponse
     */
    public function store(GlucoseRequest $request, dmPatient $dmPatient)
    {
        abort_if(Gate::denies("glucose_create"), 403);

        $dmPatient->consent->glucose()->create(
            $request->validated()
        );

        return redirect()->route('dmPatients.show', ['dmPatient' => $dmPatient]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Glucose  $glucose
     * @return \Illuminate\Http\Response
     */
    public function show(Glucose $glucose)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Glucose  $glucose
     * @return \Illuminate\Http\Response
     */
    public function edit(Glucose $glucose)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Glucose  $glucose
     * @return \Illuminate\Http\RedirectResponse
     */
    public function update(GlucoseRequest $request, Glucose $glucose)
    {
        abort_if(Gate::denies("device_log_edit"), 403);

        $request['consent_id'] = $glucose->consent_id;

        $glucose->update($request->validated());
        $glucose->save();

        return redirect()->route('dmPatients.show', ['dmPatient' => $glucose->consent->dmPatient]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Glucose  $glucose
     * @return \Illuminate\Http\Response
     */
    public function destroy(Glucose $glucose)
    {
        //
    }
}
