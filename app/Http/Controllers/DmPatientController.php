<?php

namespace App\Http\Controllers;

use App\Models\dmPatient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Validator;

class DmPatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(): View
    {
        abort_if(Gate::denies("patient_access"), 403);

        $dmPatients = dmPatient::all();

        $data = [
            "dmPatients" => $dmPatients
        ];

        return view('dmPatients.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() : View
    {
        abort_if(Gate::denies("patient_create"), 403);



        return view('dmPatients.create');
    }


    public function store(Request $request)
    {

        abort_if(Gate::denies("patient_show"), 403);

        $data = Validator::make($request->all(), [
            'initial' => ['string', 'required', 'max:255'],
            'identification' => ['string', 'required', 'max:255'],
            'consent_state' => ['string', 'required', 'max:255'],
            'signature_date' => ['string', 'required', 'max:255'],
            'signature_hour' => ['string', 'required', 'max:255'],
        ]);

        if ($data->fails()) {
            Session::flash("error", $data->errors());
            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $dm_patient = dmPatient::create([
                "doctor_id" => Auth::user()->doctor->id,
                "initial" => $request["initial"],
                "identification" => $request["identification"],
            ]);

            switch ($request['consent_state']) {
                case "oui":
                    {
                        $dm_patient->consent()->create([
                            'consent_state' => 1,
                            'signature_date' => $request['signature_date'],
                            'signature_hour' => $request['signature_hour'],
                            'comment' => $request['comment'],
                            'q1' => $request['q1'],
                            'q2' => $request['q2'],
                            'q3' => $request['q3'],
                            'q4' => $request['q4'],
                            'consent_person_name' => $request['consent_person_name'],
                        ]);
                    }
                    break;

                case 'non':
                    {
                        $dm_patient->consent()->create([
                            'consent_state' => 0,
                            'signature_date' => $request['signature_date'],
                            'signature_hour' => $request['signature_hour'],
                            'comment' => $request['comment'],
                        ]);
                    }
                    break;
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash("error", $e->getMessage());
            return redirect()->back();
        }

        DB::commit();
        return redirect()->route("dmPatients.index");
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Models\dmPatient $dmPatient
     * @return \Illuminate\Http\Response
     */
    public function show(dmPatient $dmPatient): View
    {

        abort_if(Gate::denies("patient_show"), 403);

        $data = [
            "dmPatient" => $dmPatient
        ];

        return view('dmPatients.show', $data);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Models\dmPatient $dmPatient
     * @return \Illuminate\Http\Response
     */
    public function edit(dmPatient $dmPatient)
    {
        //
    }


    public function update(Request $request, dmPatient $dmPatient)
    {
        abort_if(Gate::denies("patient_edit"), 403);

        $data = Validator::make($request->all(), [
            'initial' => ['string', 'required', 'max:255'],
            'identification' => ['string', 'required', 'max:255'],
            'consent_state' => ['string', 'required', 'max:255'],
            'signature_date' => ['string', 'required', 'max:255'],
            'signature_hour' => ['string', 'required', 'max:255'],
        ]);

        if ($data->fails()) {
            Session::flash("error", $data->errors());
            return redirect()->back();
        }

        DB::beginTransaction();

        try {

            $dmPatient->doctor_id = Auth::user()->doctor->id;
            $dmPatient->initial = $request["initial"];
            $dmPatient->identification = $request["identification"];

            $dmPatient->save();

            switch ($request['consent_state']) {
                case "oui":
                    {
                        $dmPatient->consent->consent_state = 1;
                        $dmPatient->consent->signature_date = $request['signature_date'];
                        $dmPatient->consent->signature_hour = $request['signature_hour'];
                        $dmPatient->consent->comment = $request['comment'];
                        $dmPatient->consent->q1 = $request['q1'];
                        $dmPatient->consent->q2 = $request['q2'];
                        $dmPatient->consent->q3 = $request['q3'];
                        $dmPatient->consent->q4 = $request['q4'];
                        $dmPatient->consent->consent_person_name = $request['consent_person_name'];
                        $dmPatient->consent->save();

                    }
                    break;

                case 'non':
                    {
                        $dmPatient->consent->consent_state = 0;
                        $dmPatient->consent->signature_date = $request['signature_date'];
                        $dmPatient->consent->signature_hour = $request['signature_hour'];
                        $dmPatient->consent->comment = $request['comment'];

                        $dmPatient->consent->q1 = null;
                        $dmPatient->consent->q2 = null;
                        $dmPatient->consent->q3 = null;
                        $dmPatient->consent->q4 = null;
                        $dmPatient->consent->consent_person_name = null;
                        $dmPatient->consent->save();

                        if (isset($dmPatient->consent->crf)){

                        }
                    }
                    break;
            }

        } catch (\Exception $e) {
            DB::rollBack();
            Session::flash("error", $e->getMessage());
            return redirect()->back();
        }

        DB::commit();
        return redirect()->route("dmPatients.show", ['dmPatient'=>$dmPatient]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Models\dmPatient $dmPatient
     * @return \Illuminate\Http\Response
     */
    public function destroy(dmPatient $dmPatient)
    {
        //
    }
}
