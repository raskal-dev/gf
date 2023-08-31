@extends('layouts.layoutkal')

@section('content')

    <div class="container">

        <div class="cardHeader">
            <h2>Liste des demandes</h2>
        </div>

        {{-- <h4><b><u>Pour inscription</u></b> : Il faut attendre les responbles le valide pour que vous soyez bien inscrit</h4> --}}

        <br>
            @if(session()->has('success'))
                <div class="messagealert">
                    <p class="contentalert">
                        <b>{{ session()->get('success') }}</b>
                    </p>
                </div>
            @endif
        <br>

        <div class="row">

            <div class="col-lg-5 col-xl-4">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Formation</h6>
                        <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                    class="fas fa-ellipsis-v text-gray-400"></i></button>
                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                <p class="text-center dropdown-header">dropdown header:</p><a
                                    class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item"
                                    href="#">&nbsp;Another action</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item"
                                    href="#">&nbsp;Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="height: 400px;">
                        <div class="chart-area">

                            <ul>
                                <li>kalvin</li>
                                <li>rasamy</li>
                                <li>zo</li>
                                <li>2342342</li>
                                <li>324KSDF234</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-xl-4">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Formation</h6>
                        <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                    class="fas fa-ellipsis-v text-gray-400"></i></button>
                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                <p class="text-center dropdown-header">dropdown header:</p><a
                                    class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item"
                                    href="#">&nbsp;Another action</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item"
                                    href="#">&nbsp;Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="height: 400px;">
                        <div class="chart-area">

                            <ul>
                                <li>kalvin</li>
                                <li>rasamy</li>
                                <li>zo</li>
                                <li>2342342</li>
                                <li>324KSDF234</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-xl-4">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Formation</h6>
                        <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                    class="fas fa-ellipsis-v text-gray-400"></i></button>
                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                <p class="text-center dropdown-header">dropdown header:</p><a
                                    class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item"
                                    href="#">&nbsp;Another action</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item"
                                    href="#">&nbsp;Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="height: 400px;">
                        <div class="chart-area">

                            <ul>
                                <li>kalvin</li>
                                <li>rasamy</li>
                                <li>zo</li>
                                <li>2342342</li>
                                <li>324KSDF234</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

            <div class="col-lg-5 col-xl-4">
                <div class="card shadow mb-4">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h6 class="text-primary fw-bold m-0">Formation</h6>
                        <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                    class="fas fa-ellipsis-v text-gray-400"></i></button>
                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                <p class="text-center dropdown-header">dropdown header:</p><a
                                    class="dropdown-item" href="#">&nbsp;Action</a><a class="dropdown-item"
                                    href="#">&nbsp;Another action</a>
                                <div class="dropdown-divider"></div><a class="dropdown-item"
                                    href="#">&nbsp;Something else here</a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body" style="height: 400px;">
                        <div class="chart-area">

                            <ul>
                                <li>kalvin</li>
                                <li>rasamy</li>
                                <li>zo</li>
                                <li>2342342</li>
                                <li>324KSDF234</li>
                            </ul>
                        </div>

                    </div>
                </div>
            </div>

        </div>

    </div>

@endsection
