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
                <div class="card-content">
                    <img src="{{asset("../theme/dist/assets/images/samples/cover.jpg")}}"
                         style="height: 150px; object-fit: cover;" class="card-img-top img-fluid" alt="vitalcare">
                    <div class="card-body">
                        <form action="{{route('dmPatients.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <hr>
                            <div class="row text-center">
                                <div class="col-lg-12">
                                    <h6 style="font-style: italic">
                                        Dr.{{\Illuminate\Support\Facades\Auth::user()->name}}, étude de performance de vital check
                                    </h6>
                                </div>
                            </div>
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="initial">Initials du patient</span>
                                        <input type="text" class="form-control" placeholder="..."
                                               aria-label="initial" aria-describedby="initial" required
                                               name="initial">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="signature_date">Date de signature</span>
                                        <input type="date" class="form-control" placeholder="..."
                                               aria-label="signature_date" aria-describedby="signature_date"  required
                                               name="signature_date">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="signature_hour">Heure</span>
                                        <input type="time" class="form-control" placeholder="..."
                                               aria-label="signature_hour" aria-describedby="signature_hour" required
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
                                               id="consent_state1" value="oui" checked onclick="acceptConsent()">
                                        <label class="form-check-label" for="consent_state1">
                                            Accepté
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="consent_state"
                                               id="consent_state2" value="non" onclick="refuseConsent()">
                                        <label class="form-check-label" for="consent_state2">
                                            Refusé
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div id="consent_accepted" style="display: block">
                                <hr>
                                <div class="row">
                                    <div class="col-lg-6 mb-1">
                                        <h6>
                                            Le formulaire de consentement et les documents d'étude ont été soigneusement revus avec le patient participant.
                                        </h6>
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q1"
                                                   id="q11" value="oui">
                                            <label class="form-check-label" for="q11">
                                                Oui
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q1"
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
                                            Le sujet a eu suffisamment de temps pour examiner les documents et poser des questions.
                                        </h6>
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q2"
                                                   id="q21" value="oui">
                                            <label class="form-check-label" for="q21">
                                                Oui
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q2"
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
                                                   id="q31" value="oui">
                                            <label class="form-check-label" for="q31">
                                                Oui
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q3"
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
                                                   id="q41" value="oui">
                                            <label class="form-check-label" for="q41">
                                                Oui
                                            </label>
                                        </div>
                                    </div>
                                    <div class="col-lg-3 mb-1">
                                        <div class="form-check">
                                            <input class="form-check-input" type="radio" name="q4"
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
                                                   aria-label="consent_person_name" aria-describedby="consent_person_name"
                                                   name="consent_person_name">
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div id="consent_refused" style="display: none">
                            </div>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="form-group with-title mb-3">
                                        <textarea class="form-control" id="comment" name="comment"
                                                  rows="3"></textarea>
                                        <label for="comment">Commentaires:</label>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit"
                                        class="btn btn-primary me-1 mb-1">Submit
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

        function refuseConsent(){

            var x = document.getElementById('consent_accepted');
            var y = document.getElementById('consent_refused');

            x.style.display = 'none';
            y.style.display = 'block';

        }

    </script>

@endsection
