<?php

namespace App\Http\Controllers;

use App\Models\controlSolution;
use App\Models\dmPatient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class ControlSolutionController extends Controller
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

        abort_if(Gate::denies("control_solution_create"), 403);

        $data = [
            "dmPatient" => $dmPatient
        ];

        return view('control_solution.create', $data);
    }

    public function store(Request $request, dmPatient $dmPatient)
    {

        abort_if(Gate::denies("control_solution_create"), 403);

        $dmPatient->consent->controlSolution()->create(
            $request->all()
        );

        return redirect()->route('dmPatients.show', ['dmPatient' => $dmPatient]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\controlSolution  $controlSolution
     * @return \Illuminate\Http\Response
     */
    public function show(controlSolution $controlSolution)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\controlSolution  $controlSolution
     * @return \Illuminate\Http\Response
     */
    public function edit(controlSolution $controlSolution)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\RedirectResponse|\Illuminate\Http\Response
     */
    public function update(Request $request, controlSolution $controlSolution)
    {
        abort_if(Gate::denies("control_solution_edit"), 403);

        $request['consent_id'] = $controlSolution->consent_id;

        $controlSolution->updateOrFail($request->all());
        $controlSolution->save();

        return redirect()->route('dmPatients.show', ['dmPatient' => $controlSolution->consent->dmPatient]);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\controlSolution  $controlSolution
     * @return \Illuminate\Http\Response
     */
    public function destroy(controlSolution $controlSolution)
    {
        //
    }
}
