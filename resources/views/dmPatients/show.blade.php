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
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                   role="tab" aria-controls="profile" aria-selected="false">Cahier d'observation</a>
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
                                            <a href="{{route('crfs.create',["dmPatient"=>$dmPatient])}}" class="btn me-1 mb-1 text-white" style="background-color: #20a49a">accéeder au Cahier D’observation</a>
                                        @endif
                                    @endcan
                                    <button type="submit"
                                            class="btn btn-primary me-1 mb-1" style="background-color: #0d4c92">Modifier les informations
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
                            <div class="tab-pane fade" id="profile" role="tabpanel"
                                 aria-labelledby="profile-tab">
                                Integer interdum diam eleifend metus lacinia, quis gravida eros mollis.
                                Fusce non sapien
                                sit amet magna dapibus
                                ultrices. Morbi tincidunt magna ex, eget faucibus sapien bibendum non. Duis
                                a mauris ex.
                                Ut finibus risus sed massa
                                mattis porta. Aliquam sagittis massa et purus efficitur ultricies. Integer
                                pretium dolor
                                at sapien laoreet ultricies.
                                Fusce congue et lorem id convallis. Nulla volutpat tellus nec molestie
                                finibus. In nec
                                odio tincidunt eros finibus
                                ullamcorper. Ut sodales, dui nec posuere finibus, nisl sem aliquam metus, eu
                                accumsan
                                lacus felis at odio. Sed lacus
                                quam, convallis quis condimentum ut, accumsan congue massa. Pellentesque et
                                quam vel
                                massa pretium ullamcorper vitae eu
                                tortor.
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
