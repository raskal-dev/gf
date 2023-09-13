@extends('layouts.layoutkal')

@section('content')

    <div class="container">

        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Note de {{ $evaluation->personne->demande->nom }} {{ $evaluation->personne->demande->prenom }}</h1>
        </div>

        <br>
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
        <br>
        <div class="row">
            <span><b><u>Formation : </u></b></span><span>{{ $evaluation->formation->module }}</span>
        </div>
        <br>

        <form class="formupdateuser" method="POST" action="{{ route('note.ajouter', ['id_ev' => $evaluation->id, 'id_pers' => $personne->id, 'id_for' => $formation->id]) }}">
            @csrf

            <label class="labelName">
                <input type="text" id="label" name="label" class="inputName" placeholder="Label"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('label') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <input type="number" id="note" name="note" class="inputName" placeholder="Note"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('note') {{$message}} @enderror</b></span>
            </label>

            <div class="btn-inline">
                <button class="blueSubmit" type="submit">Envoyer</button>
                {{-- <button class="redSubmit" type="submit">Retour</button> --}}
                <a class="redSubmit" href="{{ url()->previous() }}">Retour</a>
            </div>

          </form>
    </div>

@endsection
