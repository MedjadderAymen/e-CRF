<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap">

    @include('layouts.headerScripts')


</head>
<body class="bg-white text-black">

<div id="app">
    <div class="page-content">
        <div class="col-xl-12 col-md-12 col-sm-12">
            <br>
            <br>
            <div class="row justify-content-end align-right">
                <div class="col-6 text-center">
                    <h5>
                        N° Patient :--
                    </h5>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h1>
                        <p>CAHIER D’OBSERVATION</p>
                        <p>e-CRF</p>
                    </h1>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <hr style="border: 1px solid black;">
            <div class="row justify-content-center align-center">
                <div class="col-6 text-center">
                    <h5>
                        Titre de l’étude :
                    </h5>
                </div>
            </div>
            <div class="row justify-content-center align-center">
                <div class="col-6 text-center">
                    <h5>
                        Évaluation de l’exactitude analytique et de la performance clinique du système de surveillance
                        de la glycémie Vital check® MM-1200 et les bandelettes MS-2 conformément aux exigences et la
                        procédure de la norme ISO 15197:2013
                    </h5>
                </div>
            </div>
            <br>
            <div class="row justify-content-center align-center">
                <div class="col-6 text-center">
                    <h5>
                        Code de l’étude : VitalCheck2021/ISO
                    </h5>
                </div>
            </div>
            <hr style="border: 1px solid black;">
            <br>
            <div class="row justify-content-center align-center">
                <div class="col-6 text-center">
                    <h5>
                        Promoteurs : <strong>Vital Care PDL</strong>
                    </h5>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th colspan="12"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">Etude Vital Check® 2021/ISO</td>
                        <td colspan="4">VISITE D’INCLUSION</td>
                        <td colspan="4">N° Patient --</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center bg-dark">
                    <h4 class="text-black">
                        Critères d’inclusion
                    </h4>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Age > 19 ans
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1"
                               @if($dmPatient->consent->crf->q1 == "oui")  @endif
                               id="q11" value="oui">
                        <label class="form-check-label" for="q11">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q1"
                               @if($dmPatient->consent->crf->q1 == "non")  @endif
                               id="q12" value="non">
                        <label class="form-check-label" for="q12">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Patient diabétique type 1 ou 2
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2"
                               @if($dmPatient->consent->crf->q2 == "oui")  @endif
                               id="q21" value="oui">
                        <label class="form-check-label" for="q21">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q2"
                               @if($dmPatient->consent->crf->q2 == "non")  @endif
                               id="q22" value="non">
                        <label class="form-check-label" for="q22">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Patient suivi pour son diabète dans le secteur public (consultations au
                        niveau
                        des CHU ou des maisons de diabétiques)
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3"
                               @if($dmPatient->consent->crf->q3 == "oui")  @endif
                               id="q31" value="oui">
                        <label class="form-check-label" for="q31">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q3"
                               @if($dmPatient->consent->crf->q3 == "non")  @endif
                               id="q32" value="non">
                        <label class="form-check-label" for="q32">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Patient ayant signé son consentement pour participer à l’étude
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4"
                               @if($dmPatient->consent->crf->q4 == "oui")  @endif
                               id="q41" value="oui">
                        <label class="form-check-label" for="q41">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q4"
                               @if($dmPatient->consent->crf->q4 == "non")  @endif
                               id="q42" value="non">
                        <label class="form-check-label" for="q42">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center bg-dark">
                    <h4 class="text-black">
                        Critères de non inclusion
                    </h4>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Pathologies associées graves : Cancer ou toute autre pathologie mettant
                        en jeu
                        le pronostic vital du patient (Syndrome coronarien, Accident Vasculaire Cérébral/ Accident Ischémique Transitoire)
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5"
                               @if($dmPatient->consent->crf->q5 == "oui")  @endif
                               id="q51" value="oui">
                        <label class="form-check-label" for="q51">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q5"
                               @if($dmPatient->consent->crf->q5 == "non")  @endif
                               id="q52" value="non">
                        <label class="form-check-label" for="q52">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Grossesse : recherchée à l’interrogatoire
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6"
                               @if($dmPatient->consent->crf->q6 == "oui")  @endif
                               id="q61" value="oui">
                        <label class="form-check-label" for="q61">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q6"
                               @if($dmPatient->consent->crf->q6 == "non")  @endif
                               id="q62" value="non">
                        <label class="form-check-label" for="q62">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <p class="text-gray-600">
                        <strong>NB: </strong>Un seul « NON » pour les critères d’inclusion ou un seul « OUI » pour les critères de non inclusion exclut le volontaire
                    </p>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th colspan="12"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">Etude Vital Check® 2021/ISO</td>
                        <td colspan="4">VISITE D’INCLUSION</td>
                        <td colspan="4">N° Patient --</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Patient présentant un handicap physique à l’utilisation d'un lecteur
                        glycémique
                        (ex : maladie de parkinson)
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7"
                               @if($dmPatient->consent->crf->q7 == "oui")  @endif
                               id="q71" value="oui">
                        <label class="form-check-label" for="q71">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q7"
                               @if($dmPatient->consent->crf->q7 == "non")  @endif
                               id="q72" value="non">
                        <label class="form-check-label" for="q72">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Patient présentant une atteinte psychologique ou psychiatrique
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q8"
                               @if($dmPatient->consent->crf->q8 == "oui")  @endif
                               id="q81" value="oui">
                        <label class="form-check-label" for="q81">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q8"
                               @if($dmPatient->consent->crf->q8 == "non")  @endif
                               id="q82" value="non">
                        <label class="form-check-label" for="q82">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Patient illettré
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9"
                               @if($dmPatient->consent->crf->q9 == "oui")  @endif
                               id="q91" value="oui">
                        <label class="form-check-label" for="q91">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9"
                               @if($dmPatient->consent->crf->q9 == "non")  @endif
                               id="q92" value="non">
                        <label class="form-check-label" for="q92">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Patient ayant déjà participé ou participant  à une étude de recherche bio médicale
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9"
                               @if($dmPatient->consent->crf->q9 == "oui")  @endif
                               id="q91" value="oui">
                        <label class="form-check-label" for="q91">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9"
                               @if($dmPatient->consent->crf->q9 == "non")  @endif
                               id="q92" value="non">
                        <label class="form-check-label" for="q92">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Patient ayant reçu dans les 48 heures avant le prélèvement capillaire de la vitamine C ou acide ascorbique, ibuprofène et acétaminophène
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9"
                               @if($dmPatient->consent->crf->q9 == "oui")  @endif
                               id="q91" value="oui">
                        <label class="form-check-label" for="q91">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q9"
                               @if($dmPatient->consent->crf->q9 == "non")  @endif
                               id="q92" value="non">
                        <label class="form-check-label" for="q92">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <p class="text-gray-600">
                        <strong>NB: </strong>Un seul « NON » pour les critères d’inclusion ou un seul « OUI » pour les critères de non inclusion exclut le volontaire
                    </p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center bg-dark">
                    <h4 class="text-black">
                        CONSENTEMENT ECLAIRE
                    </h4>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="q10">Date de la visite :</span>
                        <input type="text" class="form-control" placeholder="..."
                               value="--/--/----"
                               aria-label="q10" aria-describedby="q10" required
                               name="q10">
                    </div>
                </div>
                <div class="col-lg-6 mb-1">
                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q11">Date de signature du consentement :</span>
                        <input type="text" class="form-control" placeholder="..."
                               value="--/--/----"
                               aria-label="q11" aria-describedby="q11" required
                               name="q11">
                    </div>
                </div>
            </div>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th colspan="12"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">Etude Vital Check® 2021/ISO</td>
                        <td colspan="4">VISITE D’INCLUSION</td>
                        <td colspan="4">N° Patient --</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center bg-dark">
                    <h4 class="text-black">
                        DEMOGRAPHIE
                    </h4>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Sexe
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q12"
                               @if($dmPatient->consent->crf->q12 == "male")  @endif
                               id="q121" value="male">
                        <label class="form-check-label" for="q121">
                            Homme
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q12"
                               @if($dmPatient->consent->crf->q12 == "female")  @endif
                               id="q122" value="female">
                        <label class="form-check-label" for="q122">
                            Femme
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="q13">Date de naissance :</span>
                        <input type="text" class="form-control" placeholder="..."
                               value="--/--/----"
                               aria-label="q13" aria-describedby="q13" required
                               name="q13">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center bg-dark">
                    <h4 class="text-black">
                        HISTORIQUE MEDICAL
                    </h4>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-5 mb-1">
                    <h6>
                        Ancienneté du diabète :
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="q141">Ans :</span>
                        <input type="number" class="form-control" placeholder="..."
                               value=""
                               aria-label="q141" aria-describedby="q141"
                               name="q141">
                    </div>
                </div>
                <div class="col-lg-1 mb-1">
                    <h6>
                        Ou
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="q142">Mois :</span>
                        <input type="number" class="form-control" placeholder="..."
                               value=""
                               aria-label="q142" aria-describedby="q142"
                               name="q142">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Type de diabète
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q15"
                               @if($dmPatient->consent->crf->q15 == "DT1")  @endif
                               id="q151" value="DT1">
                        <label class="form-check-label" for="q151">
                            DT1
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q15"
                               @if($dmPatient->consent->crf->q15 == "DT2")  @endif
                               id="q152" value="DT2">
                        <label class="form-check-label" for="q152">
                            DT2
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q151">HbA1c :</span>
                        <input type="number" step="0.1" class="form-control" placeholder="..."
                               aria-label="q151" aria-describedby="q151" required
                               value=""
                               name="q151">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q152">Hématocrite :</span>
                        <input type="number" class="form-control" placeholder="..."
                               aria-label="q152" aria-describedby="q152" required
                               value=""
                               name="q152">
                        <span class="input-group-text">%</span>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q153">Triglycérides :</span>
                        <input type="number" class="form-control" placeholder="..."
                               aria-label="q153" aria-describedby="q153" required
                               value=""
                               name="q153">
                        <span class="input-group-text">mg/dL</span>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th colspan="12"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">Etude Vital Check® 2021/ISO</td>
                        <td colspan="4">VISITE D’INCLUSION</td>
                        <td colspan="4">N° Patient --</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center bg-dark">
                    <h4 class="text-black">
                        TRAITEMENT DU DIABETE
                    </h4>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Traitement Oral :
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q16"
                               @if($dmPatient->consent->crf->q16 == "oui")  @endif
                               id="q161" value="oui">
                        <label class="form-check-label" for="q161">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q16"
                               @if($dmPatient->consent->crf->q16 == "non")  @endif
                               id="q162" value="non">
                        <label class="form-check-label" for="q162">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Insulinothérapie :
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q17"
                               @if($dmPatient->consent->crf->q17 == "oui")  @endif
                               id="q171" value="oui">
                        <label class="form-check-label" for="q171">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q17"
                               @if($dmPatient->consent->crf->q17 == "non")  @endif
                               id="q172" value="non">
                        <label class="form-check-label" for="q172">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <h6>
                Si oui,
            </h6>
            <div class="row">
                <div class="col-lg-4 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q18"
                               @if($dmPatient->consent->crf->q18 == "Insuline Lente")
                               @endif
                               id="q181" value="Insuline Lente">
                        <label class="form-check-label" for="q181">
                            Insuline Lente
                        </label>
                    </div>
                </div>
                <div class="col-lg-4 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q18"
                               @if($dmPatient->consent->crf->q18 == "Insuline Semi Lente")
                               @endif
                               id="q182" value="Insuline Semi Lente">
                        <label class="form-check-label" for="q182">
                            Insuline Semi Lente
                        </label>
                    </div>
                </div>
                <div class="col-lg-4 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q18"
                               @if($dmPatient->consent->crf->q18 == "Insuline rapide")
                               @endif
                               id="q183" value="Insuline rapide">
                        <label class="form-check-label" for="q183">
                            Insuline rapide
                        </label>
                    </div>
                </div>
                <div class="col-lg-4 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q18"
                               @if($dmPatient->consent->crf->q18 == "Insuline pré mélangée ")
                               @endif
                               id="q183" value="Insuline pré mélangée ">
                        <label class="form-check-label" for="q183">
                            Insuline pré mélangée
                        </label>
                    </div>
                </div>
            </div>
            <h6>
                Si oui, nombre d’injection d’insuline par jour :
            </h6>
            <div class="row">
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q19"
                               @if($dmPatient->consent->crf->q19 == "1 injection")
                               @endif
                               id="q191" value="1 injection">
                        <label class="form-check-label" for="q191">
                            1 injection
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q19"
                               @if($dmPatient->consent->crf->q19 == "2 injections")
                               @endif
                               id="q192" value="2 injections">
                        <label class="form-check-label" for="q192">
                            2 injections
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q19"
                               @if($dmPatient->consent->crf->q19 == "3 injections")
                               @endif
                               id="q193" value="3 injections">
                        <label class="form-check-label" for="q193">
                            3 injections
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q19"
                               @if($dmPatient->consent->crf->q19 == ">3 injections")
                               @endif
                               id="q194" value=">3 injections">
                        <label class="form-check-label" for="q194">
                            >3 injections
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Nombre de points de surveillance glycémqiue :
                    </h6>
                </div>
                <div class="col-lg-1 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q19b"
                               @if($dmPatient->consent->crf->q19b == "1")  @endif
                               id="q19b1" value="1">
                        <label class="form-check-label" for="q19b1">
                            1
                        </label>
                    </div>
                </div>
                <div class="col-lg-1 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q19b"
                               @if($dmPatient->consent->crf->q19b == "2")  @endif
                               id="q19b2" value="2">
                        <label class="form-check-label" for="q19b2">
                            2
                        </label>
                    </div>
                </div>
                <div class="col-lg-1 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q19b"
                               @if($dmPatient->consent->crf->q19b == "3")  @endif
                               id="q19b3" value="3">
                        <label class="form-check-label" for="q19b3">
                            3
                        </label>
                    </div>
                </div>
                <div class="col-lg-1 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q19b"
                               @if($dmPatient->consent->crf->q19b == "4")  @endif
                               id="q19b4" value="4">
                        <label class="form-check-label" for="q19b4">
                            4
                        </label>
                    </div>
                </div>
                <div class="col-lg-1 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q19b"
                               @if($dmPatient->consent->crf->q19b == ">4")  @endif
                               id="q19b5" value=">4">
                        <label class="form-check-label" for="q19b5">
                            >4
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th colspan="12"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">Etude Vital Check® 2021/ISO</td>
                        <td colspan="4">VISITE D’INCLUSION</td>
                        <td colspan="4">N° Patient --</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center bg-dark">
                    <h4 class="text-black">
                        UTILISATION DU GLUCOMETRE
                    </h4>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Utilisation antérieure du lecteur Vital Check
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q20"
                               @if($dmPatient->consent->crf->q20 == "oui")  @endif
                               id="q201" value="oui">
                        <label class="form-check-label" for="q201">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q20"
                               @if($dmPatient->consent->crf->q20 == "non")  @endif
                               id="q202" value="non">
                        <label class="form-check-label" for="q202">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q21">Si oui, date de début d’utilisation :</span>
                        <input type="text" class="form-control" placeholder="..."
                               value="--/--/----"
                               aria-label="q21" aria-describedby="q21"
                               name="q21">
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Utilisation d’une autre lecteur glycémique
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q21b"
                               @if($dmPatient->consent->crf->q21b == "oui")  @endif
                               id="q21b1" value="oui">
                        <label class="form-check-label" for="q21b1">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q21b"
                               @if($dmPatient->consent->crf->q21b == "non")  @endif
                               id="q21b2" value="non">
                        <label class="form-check-label" for="q21b2">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center bg-dark">
                    <h4 class="text-black">
                        MESURE DE LA GLYCEMIE
                    </h4>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q24">Date de prélèvement au centre d'investigation :</span>
                        <input type="text" class="form-control" placeholder="..."
                               value="--/--/----"
                               aria-label="q24" aria-describedby="q24"
                               name="q24">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Le patient a-t-il suivi une période de jeûne entre 8 à 12h ?
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q25"
                               @if($dmPatient->consent->crf->q25 == "oui")  @endif
                               id="q251" value="oui">
                        <label class="form-check-label" for="q251">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q25"
                               @if($dmPatient->consent->crf->q25 == "non")  @endif
                               id="q252" value="non">
                        <label class="form-check-label" for="q252">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <h6 style="font-style: initial">
                        Prélèvement capillaire
                    </h6>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="q26">Heure de prélèvement capillaire :</span>
                        <input type="text" class="form-control" placeholder="..."
                               value="--:--"
                               aria-label="q26" aria-describedby="q26"
                               name="q26">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q27">Glycémie capillaire lue avec lecteur <strong> VITAL CHECK® MM-1200</strong> : </span>
                        <input type="number" class="form-control" placeholder="..."
                               value=""
                               aria-label="q27" aria-describedby="q27"
                               name="q27">
                        <span class="input-group-text">mg/dL</span>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <br>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th colspan="12"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">Etude Vital Check® 2021/ISO</td>
                        <td colspan="4">VISITE D’INCLUSION</td>
                        <td colspan="4">N° Patient --</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <h6 style="font-style: initial">
                        Echantillon du tube 01 (La centrifugation doit se faire dans un délai de
                        30 minutes après prélèvement capillaire pour l'analyse immédiate)
                    </h6>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q28">Heure de Centrifugation :</span>
                        <input type="text" class="form-control" placeholder="..."
                               value="--/--/----"
                               aria-label="q28" aria-describedby="q28"
                               name="q28">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q29">Glycémie capillaire lue avec lecteur <strong> VITAL CHECK® MM-1200</strong> : </span>
                        <input type="text" class="form-control" placeholder="..."
                               value="--/--/----"
                               aria-label="q29" aria-describedby="q29"
                               name="q29">
                        <span class="input-group-text">mg/dL</span>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="q30">Heure de l’analyse sur l’automate YSI 2500 : </span>
                        <input type="text" class="form-control" placeholder="..."
                               value="--/--/----"
                               aria-label="q30" aria-describedby="q30"
                               name="q30">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="q31">Glycémie plasmatique , après centrifugation, avec l’automate YSI 2500 : </span>
                        <input type="number" class="form-control" placeholder="..."
                               value=""
                               aria-label="q31" aria-describedby="q31"
                               name="q31">
                        <span class="input-group-text">mg/dL</span>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <h6 style="font-style: initial">
                        Echantillon du tube 02 (analyse différée pour les hypoglycémies ou
                        hyperglycémies sévères)
                    </h6>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        L’échantillon du tube 02 a-t-il été analysé ?
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q32"
                               @if($dmPatient->consent->crf->q32 == "oui")  @endif
                               id="q321" value="oui">
                        <label class="form-check-label" for="q321">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q32"
                               @if($dmPatient->consent->crf->q32 == "non")  @endif
                               id="q322" value="non">
                        <label class="form-check-label" for="q322">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12">
                    <h6 style="font-style: initial">
                        Les analyses en duplicata
                    </h6>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q28">Date du prélèvement :</span>
                        <input type="text" class="form-control" placeholder="..."
                               value="--/--/----"
                               aria-label="q28" aria-describedby="q28"
                               name="q28">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="signature_date">Date de centrifugation :</span>
                        <input type="text" class="form-control" placeholder="20/02/2020" value="--/--/----"
                               aria-label="signature_date" aria-describedby="signature_date"
                               name="signature_date">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="q31">Glycémie capillaire  lue avec lecteur VITAL CHECK® MM-1200 : </span>
                        <input type="number" class="form-control" placeholder="..."
                               aria-label="q31" aria-describedby="q31"
                               name="q31">
                        <span class="input-group-text">mg/dL</span>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="q31">Glycémie capillaire lue avec YSI 2500 : </span>
                        <input type="number" class="form-control" placeholder="..."
                               aria-label="q31" aria-describedby="q31"
                               name="q31">
                        <span class="input-group-text">mg/dL</span>
                    </div>
                </div>
            </div>
            <br>
            <br>
            <div class="table-responsive">
                <table class="table table-hover">
                    <thead>
                    <tr>
                        <th colspan="12"></th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td colspan="4">Etude Vital Check® 2021/ISO</td>
                        <td colspan="4">VISITE D’INCLUSION</td>
                        <td colspan="4">N° Patient --</td>
                    </tr>
                    </tbody>
                </table>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center bg-dark">
                    <h4 class="text-black">
                        EVALUATION DE LA TOLERANCE
                    </h4>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Y a-t-il eu un / des effet(s) indésirable(s) lié(s) à l’utilisation de
                        la
                        bandelette réactive MS-2 ?
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q37"
                               @if($dmPatient->consent->crf->q37 == "oui")  @endif
                               id="q371" value="oui">
                        <label class="form-check-label" for="q371">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q37"
                               @if($dmPatient->consent->crf->q37 == "non")  @endif
                               id="q372" value="non">
                        <label class="form-check-label" for="q372">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <p class="text-gray-600">
                        <strong>NB: </strong>si oui renseigner la fiche réactovigilance/matériovigilance
                    </p>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-6 mb-1">
                    <h6>
                        Y a-t-il eu un / des effet(s) indésirable(s) lié(s) à l’utilisation du
                        lecteur
                        <strong>VITAL CHECK®</strong> ?
                    </h6>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q38"
                               @if($dmPatient->consent->crf->q38 == "oui")  @endif
                               id="q381" value="oui">
                        <label class="form-check-label" for="q381">
                            Oui
                        </label>
                    </div>
                </div>
                <div class="col-lg-3 mb-1">
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="q38"
                               @if($dmPatient->consent->crf->q38 == "non")  @endif
                               id="q382" value="non">
                        <label class="form-check-label" for="q382">
                            Non
                        </label>
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-center bg-dark">
                    <h4 class="text-black">
                        CONFIRMATION DE L’AUTHENTICITE DES DONNEES
                    </h4>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="investigator_name">Nom de l’Investigateur :</span>
                        <input type="text" class="form-control" placeholder="..."
                               value=""
                               aria-label="investigator_name"
                               aria-describedby="investigator_name"
                               name="investigator_name">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 mb-1">
                    <div class="input-group mb-3">
                        <span class="input-group-text" id="signature_date">Date :</span>
                        <input type="text" class="form-control" placeholder="..."
                               value="--/--/----"
                               aria-label="signature_date" aria-describedby="signature_date"
                               name="signature_date">
                    </div>
                </div>
            </div>
            <br>
            <div class="row">
                <div class="col-lg-12 text-end bg-dark">
                    <p class="text-black">
                        Signature : .............................
                    </p>
                </div>
            </div>
            <br>
            <hr>
        </div>
    </div>
</div>

<script type="text/javascript">
    window.addEventListener("load", window.print());
</script>

</body>
</html>
