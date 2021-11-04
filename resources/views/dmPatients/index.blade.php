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
                <h3>DM Patients</h3>
                <p class="text-subtitle text-muted">list des patients</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#" onclick="event.preventDefault(); document.getElementById('logout-form').submit();"><i class="bi bi-plug me-50"></i>Se déconnecter</a></li>
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
                    <img src="{{asset("../theme/dist/assets/images/samples/cover.jpg")}}" style="height: 150px; object-fit: cover;" class="card-img-top img-fluid"
                         alt="vitalcare">
                    <div class="card-body">
                        <h5 class="card-title">Be Single Minded</h5>
                        <p class="card-text">
                            Chocolate sesame snaps apple pie danish cupcake sweet roll jujubes
                            tiramisu.Gummies
                            bonbon apple pie fruitcake icing biscuit apple pie jelly-o sweet roll.
                        </p>
                    </div>
                </div>
                <ul class="list-group list-group-flush">
                    <li class="list-group-item">Cras justo odio</li>
                    <li class="list-group-item">Dapibus ac facilisis in</li>
                    <li class="list-group-item">Vestibulum at eros</li>
                </ul>
            </div>
        </div>
    </div>

@endsection()
