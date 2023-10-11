@extends('layouts.layoutkal')

@section('content')

    <div class="container">

        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Demandes</h1>
        </div>

        {{-- <div class="cardHeader">
            <h2>Liste des demandes</h2>
        </div> --}}

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
        <a class="blueSubmit" href="{{ route('demande.form') }}">Demande</a>
        <br><br>
        <div class="row">

            @foreach ($demandes as $demande)

                <div class="col-lg-5 col-xl-4" style="height: 400px;">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary fw-bold m-0">{{ $demande->nom }} {{ $demande->prenom }}</h6>

                            <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                    class="fas fa-ellipsis-v text-gray-400"></i></button>
                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                <p class="text-center dropdown-header">Action :</p><a
                                    class="dropdown-item" href="{{ route('demande.form.accepte', ['id_demande' => $demande->id]) }}">&nbsp;Accepter</a><a class="dropdown-item"
                                    href="#">&nbsp;Refuser</a>
                            </div>
                            </div>

                        </div>
                        <div class="card-body">
                            <div class="chart-area">

                                <ul>
                                    <li>
                                        <b>Date de Naissance : </b>
                                        @php
                                            $dateNais = \Carbon\Carbon::parse($demande->date_nais);
                                            $dateNaisFormat = $dateNais->format('d/m/Y');
                                        @endphp

                                        {{ $dateNaisFormat }}
                                    </li>
                                    <li><b>CIN : </b>{{ $demande->cin }}</li>
                                    <li>
                                        <b>Sexe : </b>
                                        @if ($demande->sexe == 'M')
                                            Mascullin

                                        @else
                                            Féminin
                                        @endif
                                    </li>
                                    <li><b>Téléphone : </b>{{ $demande->num_tel }}</li>
                                    <li><b>Email : </b>{{ $demande->mail }}</li>
                                </ul>
                            </div>

                        </div>
                        <div class="card-header d-flex justify-content-between align-items-center" style="height: 100px;">
                            <h6 class="text fw-bold m-0">{{ $demande->demande }}</h6>

                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </div>

@endsection
