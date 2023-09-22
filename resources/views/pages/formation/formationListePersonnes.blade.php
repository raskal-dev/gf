@extends('layouts.layoutkal')

@section('content')

    <div class="container">
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">{{ $formation->module }}</h1>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="product-box position-relative">
                    <div class="icons">
                        <a href="{{ route('formation') }}" class="redSubmit text-decoration-none text-dark">Retour</a>
                        <a href="{{ route('formation.liste.admis', ['id_for' => $formation->id]) }}" class="blueSubmit text-decoration-none text-dark">Liste des admis</a>
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
                    @foreach ($personnesFormations as $pf)
                    <tr>
                        <td>{{ $pf->matricule }}</td>
                        <td>{{ $pf->demande->nom }} {{ $pf->demande->prenom }}</td>
                        <td>
                            <a href="{{ route('evaluation', ['id_pers' => $pf->id, 'id_for' => $formation->id]) }}" class="btn btn-primary rounded-pill" title="Evaluer">Evaluer <i class="fa-solid fa-circle-chevron-right"></i></a>
                            <span class="m-1"></span>
                            <a href="{{ route('note.pdf', ['id_pers' => $pf->id, 'id_for' => $formation->id]) }}" class="btn btn-warning rounded-pill" title="Exporter Relever"><i class="fa-solid fa-file-export"></i></a>
                            <span class="m-1"></span>
                            {{-- <a href="{{ route('certificat', ['id_pers' => $pf->id, 'id_for' => $formation->id]) }}" class="btn btn-info rounded-pill" title="Certificat"><i class="fa-solid fa-award"></i></a> --}}
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>



        </div>
    </div>

@endsection
