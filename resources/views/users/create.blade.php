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
                        <form action="{{route('users.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <hr>
                            <br>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="name">Nom et Prénom</span>
                                        <input type="text" class="form-control" placeholder="..."
                                               aria-label="name" aria-describedby="name" required
                                               name="name">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="email">Email</span>
                                        <input type="text" class="form-control" placeholder="..."
                                               aria-label="email" aria-describedby="email" required
                                               name="email">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="password">Mot de passe</span>
                                        <input type="text" class="form-control" placeholder="..."
                                               aria-label="password" aria-describedby="password" required
                                               name="password">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="password_confirmation">Confirmer mot de passe</span>
                                        <input type="text" class="form-control" placeholder="..."
                                               aria-label="password_confirmation" aria-describedby="password_confirmation" required
                                               name="password_confirmation">
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-lg-12 mb-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text"
                                               for="inputGroupSelect01" >Role :</label>
                                        <select class="form-select" id="inputGroupSelect01" name="role">
                                            @foreach($roles as $role)
                                                <option value="{{$role}}">{{$role}}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-12 d-flex justify-content-end">
                                <button type="submit"
                                        class="btn btn-primary me-1 mb-1">Ajouter
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()


