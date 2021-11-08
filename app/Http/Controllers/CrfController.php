<?php

namespace App\Http\Controllers;

use App\Models\crf;
use App\Models\dmPatient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class CrfController extends Controller
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

        abort_if(Gate::denies("crf_create"), 403);

        $data = [
            "dmPatient" => $dmPatient
        ];

        return view('crf.create', $data);
    }

    public function store(Request $request, dmPatient $dmPatient)
    {

        abort_if(Gate::denies("crf_create"), 403);

        $request['q14'] = $request['q141'] ?? $request['q142'];

        $dmPatient->consent->crf()->create(
            $request->except(['q141','q142'])
        );

        return redirect()->route('dmPatients.show',['dmPatient'=>$dmPatient]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\crf $crf
     * @return \Illuminate\Http\Response
     */
    public function show(crf $crf)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\crf $crf
     * @return \Illuminate\Http\Response
     */
    public function edit(crf $crf)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Models\crf $crf
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, crf $crf)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\crf $crf
     * @return \Illuminate\Http\Response
     */
    public function destroy(crf $crf)
    {
        //
    }
}
