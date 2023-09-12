@extends('layouts.layoutkal')

@section('content')

    <div class="container">
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">{{ $personne->demande->nom }} {{ $personne->demande->prenom }}</h1>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="product-box position-relative">
                    <div class="icons">
                        <a href="{{ route('retour') }}" class="redSubmit text-decoration-none text-dark">Retour</a>
                        <a href="#" class="text-decoration-none text-dark"></a>
                    </div>
                </div>
            </div>
        </div>
        {{-- <a class="blueSubmit" href="{{ route("formation.create") }}">Ajouter</a> --}}

        <br><br>
        <div class="row">
            <div class="col-xl-5">
                <span class="fw-bold">Foramtion :</span><br>
                <span class="m-3"></span><span>{{ $formation->module }}</span>
            </div>
            <div class="col-xl-5">
                <span class="fw-bold">Foramtion :</span><br>
                <span class="m-3"></span><span>{{ $formation->module }}</span>
            </div>
        </div>
        <div class="col-xl-6">





        </div>
    </div>

@endsection
