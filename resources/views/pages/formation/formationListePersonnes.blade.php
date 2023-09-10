@extends('layouts.layoutkal')

@section('content')

    <div class="container">
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">{{ $formation->module }}</h1>
        </div>

        {{-- <div class="row">
            <h2>Les Formations</h2>
        </div> --}}

        <div class="row">
            <div class="col-md-3">
                <div class="product-box position-relative">
                    <div class="icons">
                        <a href="{{ route('formation') }}" class="redSubmit text-decoration-none text-dark">Retour</a>
                        <a href="#" class="text-decoration-none text-dark"></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <a class="blueSubmit" href="{{ route("formation.create") }}">Ajouter</a> --}}

        <br><br>
        <div class="row">

            <table style="border: 1px" class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th style="width: 30%px">Matricule</th>
                        <th style="width: 50%px">Nom et Prénom</th>
                        <th style="width: 20%px">Signature</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($personnesFormations as $pf)
                    <tr>
                        <td>{{ $pf->matricule }}</td>
                        <td>{{ $pf->demande->nom }} {{ $pf->demande->prenom }}</td>
                        <td></td>
                    </tr>
                    @endforeach
                </tbody>
            </table>



        </div>
    </div>

@endsection
