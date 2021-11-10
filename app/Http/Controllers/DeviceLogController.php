<?php

namespace App\Http\Controllers;

use App\Models\deviceLog;
use App\Models\dmPatient;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;

class DeviceLogController extends Controller
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
        abort_if(Gate::denies("device_log_create"), 403);

        $data = [
            "dmPatient" => $dmPatient
        ];

        return view('deviceLog.create', $data);
    }


    public function store(Request $request, dmPatient $dmPatient)
    {
        abort_if(Gate::denies("device_log_create"), 403);


        $dmPatient->consent->deviceLog()->create(
            $request->all()
        );

        return redirect()->route('dmPatients.show', ['dmPatient' => $dmPatient]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\deviceLog  $deviceLog
     * @return \Illuminate\Http\Response
     */
    public function show(deviceLog $deviceLog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\deviceLog  $deviceLog
     * @return \Illuminate\Http\Response
     */
    public function edit(deviceLog $deviceLog)
    {
        //
    }


    public function update(Request $request, deviceLog $deviceLog)
    {
        abort_if(Gate::denies("device_log_edit"), 403);

        $request['consent_id'] = $deviceLog->consent_id;

        $deviceLog->updateOrFail($request->all());
        $deviceLog->save();

        return redirect()->route('dmPatients.show', ['dmPatient' => $deviceLog->consent->dmPatient]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\deviceLog  $deviceLog
     * @return \Illuminate\Http\Response
     */
    public function destroy(deviceLog $deviceLog)
    {
        //
    }
}
