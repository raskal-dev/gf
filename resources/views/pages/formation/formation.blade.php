@extends('layouts.layoutkal')

@section('content')

    <div class="container">
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Formations</h1>
        </div>

        {{-- <div class="row">
            <h2>Les Formations</h2>
        </div> --}}

        <div class="row">
            <div class="col-md-3">
                <div class="product-box position-relative">
                    <div class="icons">
                        <a href="#" class="text-decoration-none text-dark"></a>
                        <a href="#" class="text-decoration-none text-dark"></a>
                    </div>
                </div>
            </div>
        </div>
        <a class="blueSubmit" href="{{ route("formation.create") }}">Ajouter</a>

        <br><br>
        <div class="row">

            @foreach ($formations as $formation)

                <div class="col-lg-5 col-xl-12">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary fw-bold m-0">{{ $formation->module }}</h6>



                        </div>
                        <div class="card-body">
                            <div class="chart-area">

                                <ul>
                                    <li>
                                        <b>Référence : </b>
                                        {{-- @php
                                            $dateNais = \Carbon\Carbon::parse($demande->date_nais);
                                            $dateNaisFormat = $dateNais->format('d/m/Y');
                                        @endphp
--}}
                                        {{ $formation->ref }}
                                    </li>
                                    {{-- <li><b>CIN : </b>{{ $demande->cin }}</li> --}}
                                    <li>
                                        <b>Déscription : </b>
                                        {{-- @if ($demande->sexe == 'M')
                                            Mascullin

                                        @else
                                            Féminin
                                        @endif --}}
                                        {{ $formation->description }}
                                    </li>
                                    {{-- <li><b>Téléphone : </b>{{ $demande->num_tel }}</li>
                                    <li><b>Email : </b>{{ $demande->mail }}</li> --}}
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            @endforeach

        </div>
    </div>

@endsection
