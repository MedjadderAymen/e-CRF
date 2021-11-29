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
                        <li class="breadcrumb-item active" aria-current="page">Analyses Glycémie [{{$dmPatient->identification}}]
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
                        <form action="{{route('glucose.store',['dmPatient'=>$dmPatient])}}" method="POST"
                              enctype="multipart/form-data">
                            @csrf
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text"
                                              id="date">Date de l'analyse :</span>
                                        <input type="date" class="form-control" placeholder="..."
                                               aria-label="analyse_date" aria-describedby="analyse_date" required
                                               name="analyse_date">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01" >Bandelettes :</label>
                                        <select class="form-select" id="inputGroupSelect01" name="strips">
                                            @foreach($stripes as $stripe)
                                                <option value="{{$stripe}}">{{$stripe}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01" >Glucomètre :</label>
                                        <select class="form-select" id="inputGroupSelect01" name="glucometer">
                                            @foreach($glucometers as $glucometer)
                                                <option value="{{$glucometer}}">{{$glucometer}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01">Solution Contrôle A :</label>
                                        <input type="text" class="form-control" placeholder="..."
                                               aria-label="solution_control_a" aria-describedby="solution_control_a" required
                                               name="solution_control_a">
                                        <span class="input-group-text">mg/dL</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01">Solution Contrôle B :</label>
                                        <input type="text" class="form-control" placeholder="..."
                                               aria-label="solution_control_b" aria-describedby="solution_control_b" required
                                               name="solution_control_b">
                                        <span class="input-group-text">mg/dL</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01" >Valeur YSI 1 :</label>
                                        <select class="form-select" id="inputGroupSelect01" name="ysi_one_value">
                                            @foreach($ysi_ones as $ysi_one)
                                                <option value="{{$ysi_one}}">{{$ysi_one}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01">Valeur YSI 2 ( control de stabilité) :</label>
                                        <input type="text" class="form-control" placeholder="..."
                                               aria-label="date" aria-describedby="ysi_two_value" required
                                               name="ysi_two_value">
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
