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
                         style="height: 150px; object-fit: cover;" class="card-img-top img-fluid"
                         alt="vitalcare">
                    <div class="card-body">
                        <h5 class="card-title">List des DM patients</h5>
                        <br>
                        <!-- table hover -->
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                <tr>
                                    <th>Initials du patient</th>
                                    <th>Identification</th>
                                    @if(auth()->user()->hasRole(['Admin', 'Super Admin']))
                                        <th>Docteur</th>
                                    @endcan
                                    <th>Consentement éclairé</th>
                                    <th>Date</th>
                                    <th>heure</th>
                                    <th></th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                @if(count($dmPatients) > 0)
                                    @foreach($dmPatients as $dmPatient)
                                        <tr>
                                            <td class="text-bold-500">{{$dmPatient->initial}}</td>
                                            <td>{{$dmPatient->identification}}</td>
                                            @if(auth()->user()->hasRole(['Admin', 'Super Admin']))
                                                <td class="text-bold-500">{{$dmPatient->doctor->user->name}}</td>
                                            @endcan
                                            <td class="text-bold-500">{{$dmPatient->consent->consent_state ? "oui" : "non"}}</td>
                                            <td>{{\Carbon\Carbon::parse($dmPatient->consent->signature_date)->toDateString()}}</td>
                                            <td>{{\Carbon\Carbon::parse($dmPatient->consent->signature_hour)->toTimeString()}}</td>
                                            <td><a href="{{route('dmPatients.show',['dmPatient'=>$dmPatient])}}"><i
                                                        class="fa fa-database "></i>voir</a></td>

                                            @if($dmPatient->consent->consent_state && isset($dmPatient->consent->crf))
                                                <td><a href="{{route('crfs.print',["dmPatient"=>$dmPatient])}}"><i
                                                            class="bi bi-printer"></i></a></td>
                                            @endif
                                        </tr>
                                    @endforeach
                                @else

                                @endif
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection()
