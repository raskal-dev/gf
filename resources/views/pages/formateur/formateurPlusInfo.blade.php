@extends('layouts.layoutkal')

@section('content')

    <div class="container">

        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Formateur : "{{ $formateur->nom_form }} {{ $formateur->prenom_form }}"</h1>
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
        <a class="blueSubmit" href="{{ route('formateur.contrat', ['id_form' => $formateur->id]) }}">Contrat</a>
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
