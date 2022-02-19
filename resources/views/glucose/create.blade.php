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
                        <li class="breadcrumb-item active" aria-current="page">Analyses Glycémie [N° Patient : {{$dmPatient->id}}]
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
                                <div class="col-lg-12">
                                    <h6>
                                        YSI 1
                                    </h6>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01">Valeur YSI 1:</label>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="text" aria-describedby="ysi_one_value"
                                               name="ysi_one_value">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01" >Lot A - Gluco A :</label>
                                        <input type="number" class="form-control" placeholder="N° Bandelette" min="1" max="11"
                                               aria-label="text" aria-describedby="ysi_one_value_lot_a_gluco_a_bandelette"
                                               name="ysi_one_value_lot_a_gluco_a_bandelette">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01">Résultat :</label>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="text" aria-describedby="ysi_one_value_lot_a_gluco_a_bandelette_result"
                                               name="ysi_one_value_lot_a_gluco_a_bandelette_result">
                                        <span class="input-group-text">mg/dL</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01" >Lot A - Gluco B :</label>
                                        <input type="number" class="form-control" placeholder="N° Bandelette" min="1" max="11"
                                               aria-label="text" aria-describedby="ysi_one_value_lot_a_gluco_b_bandelette"
                                               name="ysi_one_value_lot_a_gluco_b_bandelette">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01">Résultat :</label>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="text" aria-describedby="ysi_one_value_lot_a_gluco_b_bandelette_result"
                                               name="ysi_one_value_lot_a_gluco_b_bandelette_result">
                                        <span class="input-group-text">mg/dL</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>
                                        YSI 2
                                    </h6>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01">Valeur YSI 2:</label>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="text" aria-describedby="ysi_two_value"
                                               name="ysi_two_value">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01" >Lot B - Gluco A :</label>
                                        <input type="number" class="form-control" placeholder="N° Bandelette" min="1" max="11"
                                               aria-label="text" aria-describedby="ysi_two_value_lot_b_gluco_a_bandelette"
                                               name="ysi_two_value_lot_b_gluco_a_bandelette">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01">Résultat :</label>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="text" aria-describedby="ysi_two_value_lot_b_gluco_a_bandelette_result"
                                               name="ysi_two_value_lot_b_gluco_a_bandelette_result">
                                        <span class="input-group-text">mg/dL</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01" >Lot B - Gluco B :</label>
                                        <input type="number" class="form-control" placeholder="N° Bandelette" min="1" max="11"
                                               aria-label="text" aria-describedby="ysi_two_value_lot_b_gluco_b_bandelette"
                                               name="ysi_two_value_lot_b_gluco_b_bandelette">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01">Résultat :</label>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="text" aria-describedby="ysi_two_value_lot_b_gluco_b_bandelette_result"
                                               name="ysi_two_value_lot_b_gluco_b_bandelette_result">
                                        <span class="input-group-text">mg/dL</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <hr>
                            <div class="row">
                                <div class="col-lg-12">
                                    <h6>
                                        YSI 3
                                    </h6>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01">Valeur YSI 3:</label>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="text" aria-describedby="ysi_three_value"
                                               name="ysi_three_value">
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01" >Lot C - Gluco A :</label>
                                        <input type="number" class="form-control" placeholder="N° Bandelette" min="1" max="11"
                                               aria-label="text" aria-describedby="ysi_three_value_lot_c_gluco_a_bandelette"
                                               name="ysi_three_value_lot_c_gluco_a_bandelette">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01">Résultat :</label>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="text" aria-describedby="ysi_three_value_lot_c_gluco_a_bandelette_result"
                                               name="ysi_three_value_lot_c_gluco_a_bandelette_result">
                                        <span class="input-group-text">mg/dL</span>
                                    </div>
                                </div>
                            </div>
                            <br>
                            <div class="row">
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01" >Lot C - Gluco B :</label>
                                        <input type="number" class="form-control" placeholder="N° Bandelette" min="1" max="11"
                                               aria-label="text" aria-describedby="ysi_three_value_lot_c_gluco_b_bandelette"
                                               name="ysi_three_value_lot_c_gluco_b_bandelette">
                                    </div>
                                </div>
                                <div class="col-lg-6 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01">Résultat :</label>
                                        <input type="number" class="form-control" placeholder="..."
                                               aria-label="text" aria-describedby="ysi_three_value_lot_c_gluco_b_bandelette_result"
                                               name="ysi_three_value_lot_c_gluco_b_bandelette_result">
                                        <span class="input-group-text">mg/dL</span>
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
