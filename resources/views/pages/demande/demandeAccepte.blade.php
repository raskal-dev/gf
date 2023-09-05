@extends('layouts.layoutkal')

@section('content')

    <div class="container">

        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Demande | {{ $demande->nom }} {{ $demande->prenom }}</h1>
        </div>

        {{-- <div class="cardHeader">
            <h2>Page d'inscripation</h2>
        </div> --}}

        <h4><b><u>Pour accepter</u></b> : Il faut selectionner une formation qui n'est pas encore terminé.</h4>

        <br>
            @if(session()->has('success'))
                <div class="messagealert">
                    <p class="contentalert">
                        <b>{{ session()->get('success') }}</b>
                    </p>
                </div>
            @endif
        <br>

        <form class="formupdateuser" method="POST" action="{{ route('personne.ajout') }}">
            @csrf

            <label class="labelName">
                <input type="hidden" id="id_dem" name="id_dem" class="inputName" placeholder="Id de Demande" value="{{ $demandeid }}"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('id_dem') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <select name="id_for" id="id_for" class="inputName">
                    <option value=""> --- Selection une formation --- </option>
                    @foreach ($formations as $formation)

                        <option value="{{ $formation->id }}">{{ $formation->module }}</option>

                    @endforeach
                </select>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('sexe') {{$message}} @enderror</b></span>
            </label>

            <div class="btn-inline">
                <button class="blueSubmit" type="submit">Accepter</button>
                <button class="redSubmit" type="submit">Retour</button>


          </form>
    </div>

@endsection
