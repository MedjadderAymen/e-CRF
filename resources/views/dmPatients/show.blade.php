@extends('layouts.app')

@section('content')

    <header class="mb-3">
        <a href="#" class="burger-btn d-block d-xl-none">
            <i class="bi bi-justify fs-3"></i>
        </a>
    </header>

    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="{{route("dmPatients.index")}}">List DMs</a></li>
                        <li class="breadcrumb-item active" aria-current="page">DM Patient</li>
                    </ol>
                </nav>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#"
                                                       onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i
                                    class="bi bi-plug me-50"></i>Se déconnecter</a></li>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                            @csrf
                        </form>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <div class="page-content">
        <div class="col-xl-12 col-md-12 col-sm-12">
            <div class="card">
                <div class="card-body">
                    <ul class="nav nav-tabs" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <a class="nav-link active" id="consent-tab" data-bs-toggle="tab" href="#consent"
                               role="tab" aria-controls="consent" aria-selected="true">Consentement éclairé</a>
                        </li>
                        @if($dmPatient->consent->consent_state && isset($dmPatient->consent->crf))
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="crf-tab" data-bs-toggle="tab" href="#crf"
                                   role="tab" aria-controls="crf" aria-selected="false">Cahier d'observation</a>
                            </li>
                        @endif
                        @if($dmPatient->consent->consent_state && isset($dmPatient->consent->inclusion_exclusion))
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="inclusion_exclusion-tab" data-bs-toggle="tab"
                                   href="#inclusion_exclusion"
                                   role="tab" aria-controls="inclusion_exclusion" aria-selected="false">Critères
                                    Inclusion/Exclusion</a>
                            </li>
                        @endif
                        @if($dmPatient->consent->consent_state && isset($dmPatient->consent->deviceLog))
                            <li class="nav-item" role="presentation">
                                <a class="nav-link " id="device_log-tab" data-bs-toggle="tab"
                                   href="#device_log"
                                   role="tab" aria-controls="device_log" aria-selected="false">Lecteur de glycémie et
                                    bandelettes - Log</a>
                            </li>
                        @endif
                    </ul>
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="consent" role="tabpanel"
                             aria-labelledby="home-tab">
                            <form action="{{route('dmPatients.update',['dmPatient'=>$dmPatient])}}" method="POST"
                                  enctype="multipart/form-data">
                                @csrf
                                @method("PUT")
                                <hr>
                                <div class="row text-center">
                                    <div class="col-lg-12">
                                        <h6 style="font-style: italic">
                                            Dr.{{$dmPatient->doctor->user->name}}, étude de performance de vital check
                                        </h6>
                                    </div>
                                </div>
                                <hr>
                                <br>
                                <div class="row">
                                    <div class="col-lg-6 mb-1">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="initial">Initials du patient</span>
                                            <input type="text" class="form-control" placeholder="..."
                                                   value="{{$dmPatient->initial}}"
                                                   aria-label="initial" aria-describedby="initial" required
                                                   name="initial">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-1">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="identification">identification</span>
                                            <input type="text" class="form-control" placeholder="..."
                                                   value="{{$dmPatient->identification}}"
                                                   aria-label="identification" aria-describedby="identification"
                                                   required
                                                   name="identification">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-1">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="signature_date">Date de signature</span>
                                            <input type="date" class="form-control" placeholder="..."
                                                   value="{{\Carbon\Carbon::parse($dmPatient->consent->signature_date)->toDateString()}}"
                                                   aria-label="signature_date" aria-describedby="signature_date"
                                                   required
                                                   name="signature_date">
                                        </div>
                                    </div>
                                    <div class="col-lg-6 mb-1">
                                        <div class="input-group mb-3">
                                            <span class="input-group-text" id="signature_hour">Heure</span>
                                            <input type="time" class="form-control" placeholder="..."
                                                   value="{{\Carbon\Carbon::parse($dmPatient->consent->signature_hour)->toTimeString()}}"
                                                   aria-label="signature_hour" aria-describedby="signature_hour"
                                                   required
                                                   name="signature_hour">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-lg-6 mb-1">
                                        <h5>
                                            Consentement éclairé
                                        </h5>
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="consent_state"
                                                   id="consent_state1" value="oui"
                                                   @if($dmPatient->consent->consent_state) checked
                                                   @endif onclick="acceptConsent()">
                                            <label class="form-check-label" for="consent_state1">
                                                Accepté
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="consent_state"
                                                   id="consent_state2" value="non"
                                                   @if(!$dmPatient->consent->consent_state) checked
                                                   @endif onclick="refuseConsent()">
                                            <label class="form-check-label" for="consent_state2">
                                                Refusé
                                            </label>
                                        </div>
                                    </div>
                                </div>
                                <div id="consent_accepted"
                                     @if($dmPatient->consent->consent_state) style="display: block"
                                     @else style="display: none" @endif >
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6 mb-1">
                                            <h6>
                                                Le formulaire de consentement et les documents d'étude ont été
                                                soigneusement revus avec le patient participant.
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q1"
                                                       @if($dmPatient->consent->q1 == "oui") checked @endif
                                                       id="q11" value="oui">
                                                <label class="form-check-label" for="q11">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q1"
                                                       @if($dmPatient->consent->q1 == "non") checked @endif
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
                                                Le sujet a eu suffisamment de temps pour examiner les documents et poser
                                                des questions.
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q2"
                                                       @if($dmPatient->consent->q2 == "oui") checked @endif
                                                       id="q21" value="oui">
                                                <label class="form-check-label" for="q21">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q2"
                                                       @if($dmPatient->consent->q2 == "non") checked @endif
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
                                                Autorisation du comité d’ethique.
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q3"
                                                       @if($dmPatient->consent->q3 == "oui") checked @endif
                                                       id="q31" value="oui">
                                                <label class="form-check-label" for="q31">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q3"
                                                       @if($dmPatient->consent->q3 == "non") checked @endif
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
                                                Une copie des documents signés a été remise au patient participant.
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q4"
                                                       @if($dmPatient->consent->q4 == "oui") checked @endif
                                                       id="q41" value="oui">
                                                <label class="form-check-label" for="q41">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q4"
                                                       @if($dmPatient->consent->q4 == "non") checked @endif
                                                       id="q42" value="non">
                                                <label class="form-check-label" for="q42">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="consent_person_name">Nom de la personne qui a obtenu le consentement:</span>
                                                <input type="text" class="form-control" placeholder="..."
                                                       value="{{$dmPatient->consent->consent_person_name}}"
                                                       aria-label="consent_person_name"
                                                       aria-describedby="consent_person_name"
                                                       name="consent_person_name">
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div id="consent_refused"
                                     @if(!$dmPatient->consent->consent_state) style="display: block"
                                     @else style="display: none" @endif>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-lg-12 mb-1">
                                        <div class="form-group with-title mb-3">
                                        <textarea class="form-control" id="comment" name="comment"
                                                  rows="3"> {{$dmPatient->consent->comment}} </textarea>
                                            <label for="comment">Commentaires:</label>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-sm-12 d-flex justify-content-end">
                                    @can("crf_create")
                                        @if($dmPatient->consent->consent_state && !isset($dmPatient->consent->crf))
                                            <a href="{{route('crfs.create',["dmPatient"=>$dmPatient])}}"
                                               class="btn me-1 mb-1 text-white" style="background-color: #20a49a">accéeder
                                                au Cahier D’observation</a>
                                        @endif
                                    @endcan
                                    <button type="submit"
                                            class="btn btn-primary me-1 mb-1" style="background-color: #0d4c92">Modifier
                                        les informations
                                    </button>
                                </div>
                                <hr>
                                <div class="row text-center">
                                    <div class="col-lg-12">
                                        <h6 style="font-style: italic">
                                            Ce formulaire doit être rempli pour chaque processus de consentement éclairé
                                        </h6>
                                    </div>
                                </div>
                                <hr>
                            </form>
                        </div>
                        @if($dmPatient->consent->crf != null)
                            <div class="tab-pane fade " id="crf" role="tabpanel"
                                 aria-labelledby="crf-tab">
                                <form action="{{route('crfs.update',['crf'=>$dmPatient->consent->crf])}}" method="POST"
                                      enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                Critères d’inclusion
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6 mb-1">
                                            <h6>
                                                Age > 19 ans
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q1"
                                                       @if($dmPatient->consent->crf->q1 == "oui") checked @endif
                                                       id="q11" value="oui">
                                                <label class="form-check-label" for="q11">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q1"
                                                       @if($dmPatient->consent->crf->q1 == "non") checked @endif
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
                                                       @if($dmPatient->consent->crf->q2 == "oui") checked @endif
                                                       id="q21" value="oui">
                                                <label class="form-check-label" for="q21">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q2"
                                                       @if($dmPatient->consent->crf->q2 == "non") checked @endif
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
                                                       @if($dmPatient->consent->crf->q3 == "oui") checked @endif
                                                       id="q31" value="oui">
                                                <label class="form-check-label" for="q31">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q3"
                                                       @if($dmPatient->consent->crf->q3 == "non") checked @endif
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
                                                       @if($dmPatient->consent->crf->q4 == "oui") checked @endif
                                                       id="q41" value="oui">
                                                <label class="form-check-label" for="q41">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q4"
                                                       @if($dmPatient->consent->crf->q4 == "non") checked @endif
                                                       id="q42" value="non">
                                                <label class="form-check-label" for="q42">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                Critères de non inclusion
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6 mb-1">
                                            <h6>
                                                Pathologies associées graves : Cancer ou toute autre pathologie mettant
                                                en jeu
                                                le pronostic vital du patient (Syndrome coronarien, AVC/AIT)
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q5"
                                                       @if($dmPatient->consent->crf->q5 == "oui") checked @endif
                                                       id="q51" value="oui">
                                                <label class="form-check-label" for="q51">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q5"
                                                       @if($dmPatient->consent->crf->q5 == "non") checked @endif
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
                                                       @if($dmPatient->consent->crf->q6 == "oui") checked @endif
                                                       id="q61" value="oui">
                                                <label class="form-check-label" for="q61">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q6"
                                                       @if($dmPatient->consent->crf->q6 == "non") checked @endif
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
                                            <h6>
                                                Patient présentant un handicap physique à l’utilisation du lecteur Vital
                                                Check®
                                                (ex : maladie de parkinson)
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q7"
                                                       @if($dmPatient->consent->crf->q7 == "oui") checked @endif
                                                       id="q71" value="oui">
                                                <label class="form-check-label" for="q71">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q7"
                                                       @if($dmPatient->consent->crf->q7 == "non") checked @endif
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
                                                       @if($dmPatient->consent->crf->q8 == "oui") checked @endif
                                                       id="q81" value="oui">
                                                <label class="form-check-label" for="q81">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q8"
                                                       @if($dmPatient->consent->crf->q8 == "non") checked @endif
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
                                                       @if($dmPatient->consent->crf->q9 == "oui") checked @endif
                                                       id="q91" value="oui">
                                                <label class="form-check-label" for="q91">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q9"
                                                       @if($dmPatient->consent->crf->q9 == "non") checked @endif
                                                       id="q92" value="non">
                                                <label class="form-check-label" for="q92">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                CONSENTEMENT ECLAIRE
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6 mb-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="q10">Date de la visite :</span>
                                                <input type="date" class="form-control" placeholder="..."
                                                       value="{{\Carbon\Carbon::parse($dmPatient->consent->crf->q10)->toDateString()}}"
                                                       aria-label="q10" aria-describedby="q10" required
                                                       name="q10">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q11">Date de signature du consentement :</span>
                                                <input type="date" class="form-control" placeholder="..."
                                                       value="{{\Carbon\Carbon::parse($dmPatient->consent->crf->q11)->toDateString()}}"
                                                       aria-label="q11" aria-describedby="q11" required
                                                       name="q11">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                DEMOGRAPHIE
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6 mb-1">
                                            <h6>
                                                Sexe
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q12"
                                                       @if($dmPatient->consent->crf->q12 == "male") checked @endif
                                                       id="q121" value="male">
                                                <label class="form-check-label" for="q121">
                                                    Homme
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q12"
                                                       @if($dmPatient->consent->crf->q12 == "female") checked @endif
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
                                                <input type="date" class="form-control" placeholder="..."
                                                       value="{{\Carbon\Carbon::parse($dmPatient->consent->crf->q13)->toDateString()}}"
                                                       aria-label="q13" aria-describedby="q13" required
                                                       name="q13">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                HISTORIQUE MEDICAL
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
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
                                                       value="{{$dmPatient->consent->crf->q141}}"
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
                                                       value="{{$dmPatient->consent->crf->q142}}"
                                                       aria-label="q142" aria-describedby="q142"
                                                       name="q142">
                                            </div>
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
                                                <input class="form-check-input" type="radio" name="q15"
                                                       @if($dmPatient->consent->crf->q15 == "DT1") checked @endif
                                                       id="q151" value="DT1">
                                                <label class="form-check-label" for="q151">
                                                    DT1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q15"
                                                       @if($dmPatient->consent->crf->q15 == "DT2") checked @endif
                                                       id="q152" value="DT2">
                                                <label class="form-check-label" for="q152">
                                                    DT2
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                TRAITEMENT DU DIABETE
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6 mb-1">
                                            <h6>
                                                Traitement Oral :
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q16"
                                                       @if($dmPatient->consent->crf->q16 == "oui") checked @endif
                                                       id="q161" value="oui">
                                                <label class="form-check-label" for="q161">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q16"
                                                       @if($dmPatient->consent->crf->q16 == "non") checked @endif
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
                                                       @if($dmPatient->consent->crf->q17 == "oui") checked @endif
                                                       id="q171" value="oui">
                                                <label class="form-check-label" for="q171">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q17"
                                                       @if($dmPatient->consent->crf->q17 == "non") checked @endif
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
                                                       @if($dmPatient->consent->crf->q18 == "Insuline Lente") checked
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
                                                       @if($dmPatient->consent->crf->q18 == "Insuline Semi Lente") checked
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
                                                       @if($dmPatient->consent->crf->q18 == "Insuline rapide") checked
                                                       @endif
                                                       id="q183" value="Insuline rapide">
                                                <label class="form-check-label" for="q183">
                                                    Insuline rapide
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
                                                       @if($dmPatient->consent->crf->q19 == "1 injection") checked
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
                                                       @if($dmPatient->consent->crf->q19 == "2 injections") checked
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
                                                       @if($dmPatient->consent->crf->q19 == "3 injections") checked
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
                                                       @if($dmPatient->consent->crf->q19 == ">3 injections") checked
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
                                                       @if($dmPatient->consent->crf->q19b == "1") checked @endif
                                                       id="q19b1" value="1">
                                                <label class="form-check-label" for="q19b1">
                                                    1
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q19b"
                                                       @if($dmPatient->consent->crf->q19b == "2") checked @endif
                                                       id="q19b2" value="2">
                                                <label class="form-check-label" for="q19b2">
                                                    2
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q19b"
                                                       @if($dmPatient->consent->crf->q19b == "3") checked @endif
                                                       id="q19b3" value="3">
                                                <label class="form-check-label" for="q19b3">
                                                    3
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q19b"
                                                       @if($dmPatient->consent->crf->q19b == "4") checked @endif
                                                       id="q19b4" value="4">
                                                <label class="form-check-label" for="q19b4">
                                                    4
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-1 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q19b"
                                                       @if($dmPatient->consent->crf->q19b == ">4") checked @endif
                                                       id="q19b5" value=">4">
                                                <label class="form-check-label" for="q19b5">
                                                    >4
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                UTILISATION DU GLUCOMETRE
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-6 mb-1">
                                            <h6>
                                                Utilisation antérieure du lecteur Vital Check
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q20"
                                                       @if($dmPatient->consent->crf->q20 == "oui") checked @endif
                                                       id="q201" value="oui">
                                                <label class="form-check-label" for="q201">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q20"
                                                       @if($dmPatient->consent->crf->q20 == "non") checked @endif
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
                                                <input type="date" class="form-control" placeholder="..."
                                                       value="{{$dmPatient->consent->crf->q21}}"
                                                       aria-label="q21" aria-describedby="q21"
                                                       name="q21">
                                            </div>
                                        </div>
                                    </div>
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
                                                       @if($dmPatient->consent->crf->q21b == "oui") checked @endif
                                                       id="q21b1" value="oui">
                                                <label class="form-check-label" for="q21b1">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q21b"
                                                       @if($dmPatient->consent->crf->q21b == "non") checked @endif
                                                       id="q21b2" value="non">
                                                <label class="form-check-label" for="q21b2">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="q22">N° de lot du glucomètre remis au patient pour les besoins de l’étude :</span>
                                                <input type="number" class="form-control" placeholder="..."
                                                       value="{{$dmPatient->consent->crf->q22}}"
                                                       aria-label="q22" aria-describedby="q22"
                                                       name="q22">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text"
                                                      id="q23">N° de lot de la bandelette :</span>
                                                <input type="number" class="form-control" placeholder="..."
                                                       value="{{$dmPatient->consent->crf->q23}}"
                                                       aria-label="q23" aria-describedby="q23"
                                                       name="q23">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                MESURE DE LA GLYCEMIE
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q24">Date de prélèvement au laboratoire :</span>
                                                <input type="date" class="form-control" placeholder="..."
                                                       value="{{$dmPatient->consent->crf->q24}}"
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
                                                       @if($dmPatient->consent->crf->q25 == "oui") checked @endif
                                                       id="q251" value="oui">
                                                <label class="form-check-label" for="q251">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q25"
                                                       @if($dmPatient->consent->crf->q25 == "non") checked @endif
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
                                                <input type="time" class="form-control" placeholder="..."
                                                       value="{{\Carbon\Carbon::parse($dmPatient->consent->crf->q26)->toTimeString()}}"
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
                                                       value="{{$dmPatient->consent->crf->q27}}"
                                                       aria-label="q27" aria-describedby="q27"
                                                       name="q27">
                                                <span class="input-group-text">g/l</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6 style="font-style: initial">
                                                Echantillon du tube 01 (analyse immédiate)
                                            </h6>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q28">Heure de prélèvement capillaire  :</span>
                                                <input type="time" class="form-control" placeholder="..."
                                                       value="{{\Carbon\Carbon::parse($dmPatient->consent->crf->q28)->toTimeString()}}"
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
                                                <input type="number" class="form-control" placeholder="..."
                                                       value="{{$dmPatient->consent->crf->q29}}"
                                                       aria-label="q29" aria-describedby="q29"
                                                       name="q29">
                                                <span class="input-group-text">g/l</span>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="q30">Heure de l’analyse sur l’automate YSI 2300 : </span>
                                                <input type="time" class="form-control" placeholder="..."
                                                       value="{{\Carbon\Carbon::parse($dmPatient->consent->crf->q30)->toTimeString()}}"
                                                       aria-label="q30" aria-describedby="q30"
                                                       name="q30">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="q31">Glycémie plasmatique , après centrifugation, avec l’automate YSI : </span>
                                                <input type="number" class="form-control" placeholder="..."
                                                       value="{{$dmPatient->consent->crf->q31}}"
                                                       aria-label="q31" aria-describedby="q31"
                                                       name="q31">
                                                <span class="input-group-text">g/l</span>
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
                                                       @if($dmPatient->consent->crf->q32 == "oui") checked @endif
                                                       id="q321" value="oui">
                                                <label class="form-check-label" for="q321">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q32"
                                                       @if($dmPatient->consent->crf->q32 == "non") checked @endif
                                                       id="q322" value="non">
                                                <label class="form-check-label" for="q322">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="col-lg-6 mb-1">
                                        <h6>
                                            Si oui, merci de remplir l’une des sections suivantes :
                                        </h6>
                                    </div>
                                    <br>
                                    <ol>
                                        <li>
                                            <h6>
                                                En cas d’hypoglycémie sévère
                                            </h6>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="q33">Glycémie veineuse (sang total) lue avec lecteur <strong>VITAL CHECK® MM-1200</strong> : </span>
                                                        <input type="number" class="form-control" placeholder="..."
                                                               value="{{$dmPatient->consent->crf->q33}}"
                                                               aria-label="q33" aria-describedby="q33"
                                                               name="q33">
                                                        <span class="input-group-text">g/l</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="q34">Glycémie veineuse mesurée, après centrifugation, avec l’automate du laboratoire : </span>
                                                        <input type="number" class="form-control" placeholder="..."
                                                               value="{{$dmPatient->consent->crf->q34}}"
                                                               aria-label="q34" aria-describedby="q34"
                                                               name="q34">
                                                        <span class="input-group-text">g/l</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </li>
                                        <li>
                                            <h6>
                                                En cas d’hyperglycémie sévère
                                            </h6>
                                            <br>
                                            <div class="row">
                                                <div class="col-lg-12 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="q35">Glycémie veineuse (sang total) lue avec lecteur <strong>VITAL CHECK® MM-1200</strong> : </span>
                                                        <input type="number" class="form-control" placeholder="..."
                                                               value="{{$dmPatient->consent->crf->q35}}"
                                                               aria-label="q35" aria-describedby="q35"
                                                               name="q35">
                                                        <span class="input-group-text">g/l</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-lg-12 mb-1">
                                                    <div class="input-group mb-3">
                                                        <span class="input-group-text" id="q36">Glycémie veineuse mesurée, après centrifugation, avec l’automate du laboratoire : </span>
                                                        <input type="number" class="form-control" placeholder="..."
                                                               value="{{$dmPatient->consent->crf->q36}}"
                                                               aria-label="q36" aria-describedby="q36"
                                                               name="q36">
                                                        <span class="input-group-text">g/l</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <br>
                                        </li>
                                    </ol>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                EVALUATION DE LA TOLERANCE
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
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
                                                       @if($dmPatient->consent->crf->q37 == "oui") checked @endif
                                                       id="q371" value="oui">
                                                <label class="form-check-label" for="q371">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q37"
                                                       @if($dmPatient->consent->crf->q37 == "non") checked @endif
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
                                            <h6>
                                                Y a-t-il eu un / des effet(s) indésirable(s) lié(s) à l’utilisation du
                                                lecteur
                                                <strong>VITAL CHECK®</strong> ?
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q38"
                                                       @if($dmPatient->consent->crf->q38 == "oui") checked @endif
                                                       id="q381" value="oui">
                                                <label class="form-check-label" for="q381">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q38"
                                                       @if($dmPatient->consent->crf->q38 == "non") checked @endif
                                                       id="q382" value="non">
                                                <label class="form-check-label" for="q382">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                CONFIRMATION DE L’AUTHENTICITE DES DONNEES
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="investigator_name">Nom de l’Investigateur :</span>
                                                <input type="text" class="form-control" placeholder="..."
                                                       value="{{$dmPatient->consent->crf->investigator_name}}"
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
                                                <input type="date" class="form-control" placeholder="..."
                                                       value="{{\Carbon\Carbon::parse($dmPatient->consent->crf->signature_date)->toDateString()}}"
                                                       aria-label="signature_date" aria-describedby="signature_date"
                                                       name="signature_date">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        @can("inclusion_exclusion_core_form_create")
                                            @if($dmPatient->consent->consent_state && !isset($dmPatient->consent->inclusion_exclusion))
                                                <a href="{{route('inclusion_exclusion.create',["dmPatient"=>$dmPatient])}}"
                                                   class="btn me-1 mb-1 text-white" style="background-color: #20a49a">ajouter
                                                    Etude d'Inclusion Exlusion</a>
                                            @endif
                                        @endcan
                                        <button type="submit" class="btn btn-primary me-1 mb-1"
                                                style="background-color: #0d4c92">
                                            Modifier les informations
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif
                        @if($dmPatient->consent->inclusion_exclusion != null)
                            <div class="tab-pane fade " id="inclusion_exclusion" role="tabpanel"
                                 aria-labelledby="inclusion_exclusion-tab">
                                <form
                                    action="{{route('inclusion_exclusion.update',['inclusion_exclusion'=>$dmPatient->consent->inclusion_exclusion])}}"
                                    method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method("PUT")

                                    <hr>
                                    <div class="row text-center">
                                        <div class="col-lg-12">
                                            <h6 style="font-style: italic">
                                                Vital Check® performance
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                                <span class="input-group-text" id="visit_date">Date de visite :</span>
                                                <input type="date" class="form-control" placeholder="..."
                                                       value="{{$dmPatient->consent->inclusion_exclusion->visit_date}}"
                                                       aria-label="visit_date" aria-describedby="visit_date"
                                                       name="visit_date">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6 mb-1">
                                            <h6>
                                                Type de visite :
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="visit_type"
                                                       @if($dmPatient->consent->inclusion_exclusion->visit_type == "Screening") checked
                                                       @endif
                                                       id="visit_type1" value="Screening">
                                                <label class="form-check-label" for="visit_type1">
                                                    Screening
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="visit_type"
                                                       @if($dmPatient->consent->inclusion_exclusion->visit_type == "Baseline") checked
                                                       @endif
                                                       id="visit_type2" value="Baseline">
                                                <label class="form-check-label" for="visit_type2">
                                                    Baseline
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                Critères d’inclusion
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                Le Participant doit remplir les conditions suivantes :
                                            </h6>
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
                                                       @if($dmPatient->consent->inclusion_exclusion->q1 == "oui") checked
                                                       @endif
                                                       id="q11" value="oui">
                                                <label class="form-check-label" for="q11">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q1"
                                                       @if($dmPatient->consent->inclusion_exclusion->q1 == "non") checked
                                                       @endif
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
                                                Diabète de type 1 ou diabète de type 2
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q2"
                                                       @if($dmPatient->consent->inclusion_exclusion->q2 == "oui") checked
                                                       @endif
                                                       id="q21" value="oui">
                                                <label class="form-check-label" for="q21">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q2"
                                                       @if($dmPatient->consent->inclusion_exclusion->q2 == "non") checked
                                                       @endif
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
                                                Consentement éclairé
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q3"
                                                       @if($dmPatient->consent->inclusion_exclusion->q3 == "oui") checked
                                                       @endif
                                                       id="q31" value="oui">
                                                <label class="form-check-label" for="q31">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q3"
                                                       @if($dmPatient->consent->inclusion_exclusion->q3 == "non") checked
                                                       @endif
                                                       id="q32" value="non">
                                                <label class="form-check-label" for="q32">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                Exclusion Criteria
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                Le Participant NE doit remplir les conditions suivantes :
                                            </h6>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6 mb-1">
                                            <h6>
                                                Grossesse / Allaitement
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q4"
                                                       @if($dmPatient->consent->inclusion_exclusion->q4 == "oui") checked
                                                       @endif
                                                       id="q41" value="oui">
                                                <label class="form-check-label" for="q41">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q4"
                                                       @if($dmPatient->consent->inclusion_exclusion->q4 == "non") checked
                                                       @endif
                                                       id="q42" value="non">
                                                <label class="form-check-label" for="q42">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-6 mb-1">
                                            <h6>
                                                Pathologies associées graves
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q5"
                                                       @if($dmPatient->consent->inclusion_exclusion->q5 == "oui") checked
                                                       @endif
                                                       id="q51" value="oui">
                                                <label class="form-check-label" for="q51">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q5"
                                                       @if($dmPatient->consent->inclusion_exclusion->q5 == "non") checked
                                                       @endif
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
                                                Non perception des hypoglycémies
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q6"
                                                       @if($dmPatient->consent->inclusion_exclusion->q6 == "oui") checked
                                                       @endif
                                                       id="q61" value="oui">
                                                <label class="form-check-label" for="q61">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q6"
                                                       @if($dmPatient->consent->inclusion_exclusion->q6 == "non") checked
                                                       @endif
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
                                            <h6>
                                                Patient présentant une atteinte psychologique ou psychiatrique
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q7"
                                                       @if($dmPatient->consent->inclusion_exclusion->q7 == "oui") checked
                                                       @endif
                                                       id="q71" value="oui">
                                                <label class="form-check-label" for="q71">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q7"
                                                       @if($dmPatient->consent->inclusion_exclusion->q7 == "non") checked
                                                       @endif
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
                                                Patient illettré
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q8"
                                                       @if($dmPatient->consent->inclusion_exclusion->q8 == "oui") checked
                                                       @endif
                                                       id="q81" value="oui">
                                                <label class="form-check-label" for="q81">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q8"
                                                       @if($dmPatient->consent->inclusion_exclusion->q8 == "non") checked
                                                       @endif
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
                                                Patient ayant déjà participé à une étude de recherche bio médicale
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q9"
                                                       @if($dmPatient->consent->inclusion_exclusion->q9 == "oui") checked
                                                       @endif
                                                       id="q91" value="oui">
                                                <label class="form-check-label" for="q91">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q9"
                                                       @if($dmPatient->consent->inclusion_exclusion->q9 == "non") checked
                                                       @endif
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
                                                Le participant a-t-il rempli les conditions d'éligibilité pour cette
                                                étude
                                            </h6>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q10"
                                                       @if($dmPatient->consent->inclusion_exclusion->q10 == "oui") checked
                                                       @endif
                                                       id="q101" value="oui">
                                                <label class="form-check-label" for="q101">
                                                    Oui
                                                </label>
                                            </div>
                                        </div>
                                        <div class="col-lg-3 mb-1">
                                            <div class="form-check">
                                                <input class="form-check-input" type="radio" name="q10"
                                                       @if($dmPatient->consent->inclusion_exclusion->q10 == "non") checked
                                                       @endif
                                                       id="q102" value="non">
                                                <label class="form-check-label" for="q102">
                                                    Non
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <br>

                                    <hr>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        @can("device_log_create")
                                            @if($dmPatient->consent->consent_state && !isset($dmPatient->consent->deviceLog))
                                                <a href="{{route('device_log.create',["dmPatient"=>$dmPatient])}}"
                                                   class="btn me-1 mb-1 text-white" style="background-color: #20a49a">Lecteur
                                                    de glycémie et bandelettes Log</a>
                                            @endif
                                        @endcan
                                        <button type="submit" class="btn btn-primary me-1 mb-1"
                                                style="background-color: #0d4c92">
                                            Modifier les informations
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif
                        @if($dmPatient->consent->deviceLog != null)
                            <div class="tab-pane fade " id="device_log" role="tabpanel"
                                 aria-labelledby="inclusion_exclusion-tab">
                                <form
                                    action="{{route('device_log.update',['device_log'=>$dmPatient->consent->deviceLog])}}"
                                    method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                Réception des glucomètres
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q1">Date de reception :</span>
                                                <input type="date" class="form-control" placeholder="..."
                                                       aria-label="q1" aria-describedby="q1"
                                                       value="{{$dmPatient->consent->deviceLog->q1}}"
                                                       name="q1">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q2">Type de lecteur :</span>
                                                <input type="text" class="form-control" placeholder="..."
                                                       aria-label="q2" aria-describedby="q2"
                                                       value="{{$dmPatient->consent->deviceLog->q2}}"
                                                       name="q2">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q3">Numéro de série :</span>
                                                <input type="text" class="form-control" placeholder="..."
                                                       aria-label="q3" aria-describedby="q3"
                                                       value="{{$dmPatient->consent->deviceLog->q3}}"
                                                       name="q3">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q4">Reception par ( Initials ) :</span>
                                                <input type="text" class="form-control" placeholder="..."
                                                       aria-label="q4" aria-describedby="q4"
                                                       value="{{$dmPatient->consent->deviceLog->q4}}"
                                                       name="q4">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                Utilisation du glucométre
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q5">Date d’utilisation :</span>
                                                <input type="date" class="form-control" placeholder="..."
                                                       aria-label="q5" aria-describedby="q5"
                                                       value="{{$dmPatient->consent->deviceLog->q5}}"
                                                       name="q5">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="identification">Identité du patient participant :</span>
                                                <input type="text" class="form-control" placeholder="..."
                                                       aria-label="identification" aria-describedby="identification"
                                                       disabled value="{{$dmPatient->identification}}">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q6">Realisation de la lecture (initials) :</span>
                                                <input type="text" class="form-control" placeholder="..."
                                                       aria-label="q6" aria-describedby="q6"
                                                       value="{{$dmPatient->consent->deviceLog->q6}}"
                                                       name="q6">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <h6>
                                                Bandelettes réactives
                                            </h6>
                                        </div>
                                    </div>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q7">Date de reception des bandelettes réactives:</span>
                                                <input type="date" class="form-control" placeholder="..."
                                                       aria-label="q7" aria-describedby="q7"
                                                       value="{{$dmPatient->consent->deviceLog->q7}}"
                                                       name="q7">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q8">Numéro du lot :</span>
                                                <input type="number" class="form-control" placeholder="..."
                                                       aria-label="q8" aria-describedby="q8"
                                                       value="{{$dmPatient->consent->deviceLog->q8}}"
                                                       name="q8">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <div class="row">
                                        <div class="col-lg-12 mb-1">
                                            <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="q9">Date de péremption :</span>
                                                <input type="date" class="form-control" placeholder="..."
                                                       aria-label="q9" aria-describedby="q9"
                                                       value="{{$dmPatient->consent->deviceLog->q9}}"
                                                       name="q9">
                                            </div>
                                        </div>
                                    </div>
                                    <br>
                                    <hr>
                                    <div class="col-sm-12 d-flex justify-content-end">
                                        <button type="submit" class="btn btn-primary me-1 mb-1">
                                            Confirmer
                                        </button>
                                    </div>
                                </form>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()

@section("scripts")

    <script>

        function acceptConsent() {
            var x = document.getElementById('consent_accepted');
            var y = document.getElementById('consent_refused');

            x.style.display = 'block';
            y.style.display = 'none';

        }

        function refuseConsent() {

            var x = document.getElementById('consent_accepted');
            var y = document.getElementById('consent_refused');

            x.style.display = 'none';
            y.style.display = 'block';

        }

    </script>

@endsection
