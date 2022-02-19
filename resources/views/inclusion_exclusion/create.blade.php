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
                        <li class="breadcrumb-item"><a href="{{route("dmPatients.show",['dmPatient'=>$dmPatient])}}">DM
                                Patient</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Critères Inclusion/Exclusion
                            [N° Patient : {{$dmPatient->id}}]
                        </li>
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
                <div class="card-content">
                    <div class="card-body">
                        <form action="{{route('inclusion_exclusion.store',['dmPatient'=>$dmPatient])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
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
                                               id="visit_type1" value="Screening">
                                        <label class="form-check-label" for="visit_type1">
                                            Screening
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="visit_type"
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
                                        Diabète de type 1 ou diabète de type 2
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
                                        Consentement éclairé
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
                                <div class="col-lg-6 mb-1">
                                    <h6>
                                        Pathologies associées graves
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q5"
                                               id="q51" value="oui">
                                        <label class="form-check-label" for="q51">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q5"
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
                                               id="q61" value="oui">
                                        <label class="form-check-label" for="q61">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q6"
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
                                               id="q71" value="oui">
                                        <label class="form-check-label" for="q71">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q7"
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
                                               id="q81" value="oui">
                                        <label class="form-check-label" for="q81">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q8"
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
                                               id="q91" value="oui">
                                        <label class="form-check-label" for="q91">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q9"
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
                                        Le participant a-t-il rempli les conditions d'éligibilité pour cette étude
                                    </h6>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q10"
                                               id="q101" value="oui">
                                        <label class="form-check-label" for="q101">
                                            Oui
                                        </label>
                                    </div>
                                </div>
                                <div class="col-lg-3 mb-1">
                                    <div class="form-check">
                                        <input class="form-check-input" type="radio" name="q10"
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
                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                    Confirmer
                                </button>
                            </div>
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

        function refuseConsent() {

            var x = document.getElementById('consent_accepted');
            var y = document.getElementById('consent_refused');

            x.style.display = 'none';
            y.style.display = 'block';

        }

    </script>

@endsection
