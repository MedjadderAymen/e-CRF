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
                                        <h3>Dropdown</h3>
                                        <p class="text-subtitle text-muted">A carousel without slide control</p>
                                    </div>
                                    <div class="col-12 col-md-6 order-md-2 order-first">
                                        <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                                            <div class="btn-group mb-1">
                                                                                        <div class="dropdown">
                                                                                            <button class="btn btn-primary dropdown-toggle me-1" type="button"
                                                                                                id="dropdownMenuButtonIcon" data-bs-toggle="dropdown"
                                                                                                aria-haspopup="true" aria-expanded="false">
                                                                                                <i class="bi bi-error-circle me-50"></i> Icon Left
                                                                                            </button>
                                                                                            <div class="dropdown-menu" aria-labelledby="dropdownMenuButtonIcon">
                                                                                                <a class="dropdown-item" href="#"><i
                                                                                                        class="bi bi-bar-chart-alt-2 me-50"></i>
                                                                                                    Option
                                                                                                    1</a>
                                                                                                <a class="dropdown-item" href="#"><i class="bi bi-bell me-50"></i>
                                                                                                    Option 2</a>
                                                                                                <a class="dropdown-item" href="#"><i class="bi bi-time me-50"></i>
                                                                                                    Option 3</a>
                                                                                            </div>
                                                                                        </div>
                                                                                    </div>
                                        </nav>
                                    </div>
                                </div>
                            </div>
            <div class="page-content">

            </div>

@endsection()
