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

        $dmPatient->consent->crf()->create(
            $request->all()
        );

        if ($request['q1'] == "non" || $request['q2'] == "non" || $request['q3'] == "non" || $request['q4'] == "non") {
            $dmPatient->eligible = false;
            $dmPatient->save();

            $dmPatient->consent->crf->q5 = null;
            $dmPatient->consent->crf->q6 = null;
            $dmPatient->consent->crf->q7 = null;
            $dmPatient->consent->crf->q8 = null;
            $dmPatient->consent->crf->q9 = null;
            $dmPatient->consent->crf->q39 = null;
            $dmPatient->consent->crf->q40 = null;
            $dmPatient->consent->crf->save();

        }

        if ($request['q5'] == "oui" || $request['q6'] == "oui" || $request['q7'] == "oui" || $request['q9'] == "oui" || $request['q39'] == "oui" || $request['q40'] == "oui") {
            $dmPatient->eligible = false;
            $dmPatient->save();
        }

        if ($request['q18'] != null) {
            foreach ($request['q18'] as $key => $value) {

                $dmPatient->consent->crf->insulines()->create([
                    'tag' => $value
                ]);

            }
        }

        return redirect()->route('dmPatients.show', ['dmPatient' => $dmPatient]);
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\crf $crf
     * @return \Illuminate\Http\Response
     */
    public function show(crf $crf): View
    {

    }

    /**
     * Display the specified resource.
     *
     * @param dmPatient $dmPatient
     * @return View
     */
    public function print(dmPatient $dmPatient): View
    {
        abort_if(Gate::denies("crf_show"), 403);

        $date = [
            "dmPatient" => $dmPatient
        ];

        return view('crf.print', $date);
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
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, crf $crf)
    {
        abort_if(Gate::denies("crf_edit"), 403);

        $request['consent_id'] = $crf->consent_id;

        $crf->updateOrFail($request->all());
        $crf->save();

        $crf->insulines()->delete();

        if ($request['q18'] != null) {
            foreach ($request['q18'] as $key => $value) {

                $crf->insulines()->create([
                    'tag' => $value
                ]);

            }
        }

        return redirect()->route('dmPatients.show', ['dmPatient' => $crf->consent->dmPatient]);

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
