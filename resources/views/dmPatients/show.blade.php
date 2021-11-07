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
                <div class="card-header">
                    <h5 class="card-title">Horizontal Navs</h5>
                </div>
                @if($dmPatient->consent->consent_state)
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="consent-tab" data-bs-toggle="tab" href="#consent"
                                   role="tab" aria-controls="consent" aria-selected="true">Home</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="profile-tab" data-bs-toggle="tab" href="#profile"
                                   role="tab" aria-controls="profile" aria-selected="false">Profile</a>
                            </li>
                            <li class="nav-item" role="presentation">
                                <a class="nav-link" id="contact-tab" data-bs-toggle="tab" href="#contact"
                                   role="tab" aria-controls="contact" aria-selected="false">Contact</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="consent" role="tabpanel"
                                 aria-labelledby="home-tab">
                                <p class='my-2'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Nulla ut nulla
                                    neque. Ut hendrerit nulla a euismod pretium.
                                    Fusce venenatis sagittis ex efficitur suscipit. In tempor mattis
                                    fringilla. Sed id
                                    tincidunt orci, et volutpat ligula.
                                    Aliquam sollicitudin sagittis ex, a rhoncus nisl feugiat quis. Lorem
                                    ipsum dolor sit
                                    amet, consectetur adipiscing elit.
                                    Nunc ultricies ligula a tempor vulputate. Suspendisse pretium mollis
                                    ultrices.</p>
                            </div>
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
                            <div class="tab-pane fade" id="contact" role="tabpanel"
                                 aria-labelledby="contact-tab">
                                <p class="mt-2">Duis ultrices purus non eros fermentum hendrerit. Aenean
                                    ornare interdum
                                    viverra. Sed ut odio velit. Aenean eu diam
                                    dictum nibh rhoncus mattis quis ac risus. Vivamus eu congue ipsum.
                                    Maecenas id
                                    sollicitudin ex. Cras in ex vestibulum,
                                    posuere orci at, sollicitudin purus. Morbi mollis elementum enim, in
                                    cursus sem
                                    placerat ut.</p>
                            </div>
                        </div>
                    </div>
                @else
                    <div class="card-body">
                        <ul class="nav nav-tabs" id="myTab" role="tablist">
                            <li class="nav-item" role="presentation">
                                <a class="nav-link active" id="consent-tab" data-bs-toggle="tab" href="#consent"
                                   role="tab" aria-controls="consent" aria-selected="true">Home</a>
                            </li>
                        </ul>
                        <div class="tab-content" id="myTabContent">
                            <div class="tab-pane fade show active" id="consent" role="tabpanel"
                                 aria-labelledby="home-tab">
                                <p class='my-2'>Lorem ipsum dolor sit amet, consectetur adipiscing elit.
                                    Nulla ut nulla
                                    neque. Ut hendrerit nulla a euismod pretium.
                                    Fusce venenatis sagittis ex efficitur suscipit. In tempor mattis
                                    fringilla. Sed id
                                    tincidunt orci, et volutpat ligula.
                                    Aliquam sollicitudin sagittis ex, a rhoncus nisl feugiat quis. Lorem
                                    ipsum dolor sit
                                    amet, consectetur adipiscing elit.
                                    Nunc ultricies ligula a tempor vulputate. Suspendisse pretium mollis
                                    ultrices.</p>
                            </div>
                        </div>
                    </div>
                @endif
            </div>
        </div>
    </div>

@endsection()
