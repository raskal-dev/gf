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

            @foreach ($demandes as $demande)

                <div class="col-lg-5 col-xl-4">
                    <div class="card shadow mb-4">
                        <div class="card-header d-flex justify-content-between align-items-center">
                            <h6 class="text-primary fw-bold m-0">{{ $demande->nom }} {{ $demande->prenom }}</h6>

                        </div>
                        <div class="card-body">
                            <div class="chart-area">

                                <ul>
                                    <li><b>Date de Naissance : </b>{{ $demande->date_nais }}</li>
                                    <li><b>CIN : </b>{{ $demande->cin }}</li>
                                    <li><b>Sexe : </b>{{ $demande->sexe }}</li>
                                    <li><b>Téléphone : </b>{{ $demande->num_tel }}</li>
                                    <li><b>Email : </b>{{ $demande->mail }}</li>
                                </ul>
                            </div>

                        </div>
                    </div>
                </div>

            @endforeach

        </div>

    </div>

@endsection
