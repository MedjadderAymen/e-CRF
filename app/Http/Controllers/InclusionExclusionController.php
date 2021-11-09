<?php

namespace App\Http\Controllers;

use App\Models\dmPatient;
use App\Models\InclusionExclusion;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Gate;

class InclusionExclusionController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function create(dmPatient $dmPatient): View
    {
        abort_if(Gate::denies("inclusion_exclusion_core_form_create"), 403);

        $data = [
            "dmPatient" => $dmPatient
        ];

        return view('inclusion_exclusion.create', $data);
    }

    public function store(Request $request, dmPatient $dmPatient)
    {
        abort_if(Gate::denies("inclusion_exclusion_core_form_create"), 403);


        $dmPatient->consent->inclusion_exclusion()->create(
            $request->all()
        );

        return redirect()->route('dmPatients.show', ['dmPatient' => $dmPatient]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\InclusionExclusion $inclusionExclusion
     * @return \Illuminate\Http\Response
     */
    public function show(InclusionExclusion $inclusionExclusion)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\InclusionExclusion $inclusionExclusion
     * @return \Illuminate\Http\Response
     */
    public function edit(InclusionExclusion $inclusionExclusion)
    {
        //
    }


    public function update(Request $request, InclusionExclusion $inclusionExclusion)
    {
        abort_if(Gate::denies("inclusion_exclusion_core_form_edit"), 403);

        $request['consent_id'] = $inclusionExclusion->consent_id;

        $inclusionExclusion->updateOrFail($request->all());
        $inclusionExclusion->save();

        return redirect()->route('dmPatients.show', ['dmPatient' => $inclusionExclusion->consent->dmPatient]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\InclusionExclusion $inclusionExclusion
     * @return \Illuminate\Http\Response
     */
    public function destroy(InclusionExclusion $inclusionExclusion)
    {
        //
    }
}
