@extends('layouts.layoutkal')

@section('content')

    <div class="container">
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">{{ $formation->module }}</h1>
        </div>

        <div class="head m-auto content-center">
            <h2>Liste des personnes admis</h2>
        </div>
        <br>

        <div class="row">
            <div class="col-md-5">
                <div class="product-box position-relative">
                    <div class="icons">
                        <a href="{{ route('formation.liste.personnes', ['id_for' => $formation->id]) }}" class="redSubmit text-decoration-none text-dark">Retour</a>
                        <a href="{{ route('formation.certificats', ['id_for' => $formation->id]) }}" class="blueSubmit text-decoration-none text-dark">Exporter tous les certificats <i class="fa-solid fa-award"></i></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <a class="blueSubmit" href="{{ route("formation.create") }}">Ajouter</a> --}}

        <br><br>
        <div class="row">

            <table style="border: 1px" class="table table-hover table-bordered">
                <thead class="bg-black text-white">
                    <tr>
                        <th style="width: 30%px">Matricule</th>
                        <th style="width: 50%px">Nom et Prénom</th>
                        <th style="width: 20%px">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personnes as $personne)
                    @if($personne->moyenne >=10)
                    <tr>
                        <td>{{ $personne->matricule }}</td>
                        <td>{{ $personne->demande->nom }} {{ $personne->demande->prenom }}</td>
                        <td>
                            <a href="{{ route('evaluation', ['id_pers' => $personne->id, 'id_for' => $formation->id]) }}" class="btn btn-primary rounded-pill" title="Evaluer">Evaluer <i class="fa-solid fa-circle-chevron-right"></i></a>
                            <span class="m-1"></span>
                            <a href="{{ route('note.pdf', ['id_pers' => $personne->id, 'id_for' => $formation->id]) }}" class="btn btn-warning rounded-pill" title="Exporter Relever"><i class="fa-solid fa-file-export"></i></a>
                            <span class="m-1"></span>
                            <a href="{{ route('certificat', ['id_pers' => $personne->id, 'id_for' => $formation->id]) }}" class="btn btn-info rounded-pill" title="Certificat"><i class="fa-solid fa-award"></i></a>
                        </td>
                    </tr>
                    @endif

                    @endforeach
                </tbody>
            </table>



        </div>
    </div>

@endsection
