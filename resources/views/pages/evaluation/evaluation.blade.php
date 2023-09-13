@extends('layouts.layoutkal')

@section('content')

    <div class="container">
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">{{ $personne->demande->nom }} {{ $personne->demande->prenom }}</h1>
        </div>

        <div class="row">
            <div class="col-xl-12">
                <section>
                    @if(session()->has("success"))
                        <div class="alert alert-success">
                            <h3>{{ session()->get('success') }}</h3>
                        </div>
                    @elseif (session()->has("errordelete"))
                        <div class="alert alert-danger">
                            <h4>{{ session()->get('errordelete') }}</h4>
                        </div>
                    @elseif (session()->has("error"))
                        <div class="alert alert-danger">
                            <h4>{{ session()->get('error') }}</h4>
                        </div>
                    @endif
                </section>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="product-box position-relative">
                    <div class="icons">
                        {{-- <a href="{{ route('formation.liste.personnes', ['id_for' => $formation->id_for]) }}" class="redSubmit text-decoration-none text-dark">Retour</a> --}}
                        <a href="#" class="text-decoration-none text-dark"></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <a class="blueSubmit" href="{{ route("formation.create") }}">Ajouter</a> --}}

        {{-- petit fontion (debut) --}}

        @php
            $datedebut = \Carbon\Carbon::parse($formation->date_debut);
            $datedebutFormat = $datedebut->format('d/m/Y');

            $datefin = \Carbon\Carbon::parse($formation->date_fin);
            $datefinFormat = $datefin->format('d/m/Y');

            $dateNais = \Carbon\Carbon::parse($personne->demande->date_nais);
            $dateNaisFormat = $dateNais->format('d/m/Y');

        @endphp

        {{-- petit fontion (fin) --}}

        <br><br>
        <div class="row">
            <div class="col-xl-5">
                <span class="fw-bold text-primary"><u>Info sur formation :</u></span><br>
                <span class="fw-bold">Référance :</span><br>
                <span class="m-3"></span><span>{{ $formation->ref }}</span><br>
                <span class="fw-bold">Foramtion :</span><br>
                <span class="m-3"></span><span>{{ $formation->module }}</span><br>
                <span class="fw-bold">Durer de la formation :</span><br>
                <span class="m-3"></span><span>{{ $datedebutFormat }} à {{ $datefinFormat }}</span><br>
            </div>
            <div class="col-xl-5">
                <span class="fw-bold text-primary"><u>Info sur la personne :</u></span><br>
                <span class="fw-bold">Matricule :</span><br>
                <span class="m-3"></span><span>{{ $personne->matricule }}</span><br>
                <span class="fw-bold">CIN :</span><br>
                <span class="m-3"></span><span>{{ $personne->demande->cin }}</span><br>
                <span class="fw-bold">Genre :</span><br>
                <span class="m-3"></span><span>
                    @if ($personne->demande->sexe == 'M')
                        Mascullin

                    @else
                        Féminin
                    @endif
                </span><br>
                <span class="fw-bold">Date de naissance :</span><br>
                <span class="m-3"></span><span>{{ $dateNaisFormat }}</span><br>
                <span class="fw-bold">Téléphone :</span><br>
                <span class="m-3"></span><span>{{ $personne->demande->num_tel }}</span><br>
                <span class="fw-bold">Email :</span><br>
                <span class="m-3"></span><span>{{ $personne->demande->mail }}</span><br>
            </div>
        </div>
        <div class="row m-3">
            <a href="{{ route('evaluation.note.ajouter', ['id_ev' => $evaluation->id, 'id_pers' => $personne->id, 'id_for' => $formation->id]) }}" class="redSubmit text-decoration-none text-dark"><i class="fa-solid fa-file-circle-plus"></i> Note</a>

        </div>
        <div class="row m-4">
            <div class="col-xl-12">

                <div class="table-responsive">
                    <table class="table table-hover table-bordered">
                        <thead class="bg-black text-white">
                            <tr>
                                <th scope="col">Label</th>
                                <th scope="col">Note</th>
                                <th scope="col">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($notesevs as $notesev)
                                <tr class="">
                                    <td scope="row">{{ $notesev->label }}</td>
                                    <td>{{ $notesev->note }}</td>
                                    <td>R1C3</td>
                                </tr>
                            @endforeach
                            </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="text-primary fs-4">
                <span class="fw-bold">Moyenne : </span><span>{{ $moyentype }}/20</span>
            </div>
        </div>
    </div>

@endsection
