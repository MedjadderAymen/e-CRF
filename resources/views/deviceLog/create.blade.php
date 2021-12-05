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
                        <li class="breadcrumb-item active" aria-current="page">Lecteur de glycémie et bandelettes - Log
                            [{{$dmPatient->identification}}]
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
                        <form action="{{route('device_log.store',['dmPatient'=>$dmPatient])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
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
                                               aria-label="identification" aria-describedby="identification" disabled value="{{$dmPatient->identification}}">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="q6">Realisation de la lecture :</label>
                                        <select class="form-select" id="q6" name="q6">
                                            @foreach($doctors as $doctor)
                                                <option value="{{$doctor->user->name}}">{{$doctor->user->name}}</option>
                                            @endforeach
                                        </select>
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
