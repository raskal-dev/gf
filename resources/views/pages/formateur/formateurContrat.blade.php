@extends('layouts.layoutkal')

@section('content')

    <div class="container">

        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Contrat de "{{ $formateur->nom_form }} {{ $formateur->prenom_form }}"</h1>
        </div>

        {{-- <div class="cardHeader">
            <h2>Page d'inscripation</h2>
        </div> --}}

        <h4><b><u>Nouvel Formateur</u></b> : L'insertion est instantanné.</h4>

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

        <form class="formupdateuser" method="POST" action="{{ route('former.ajouter') }}">
            @csrf

            <label class="labelName">
                <input type="hidden" id="id_form" name="id_form" class="inputName" value="{{ $formateur->id }}"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('id_form') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <select name="id_for" id="id_for" class="inputName">
                    <option value=""> --- Selection une formation --- </option>
                    @foreach ($formations as $formation)
                        <option value="{{ $formation->id }}">{{ $formation->module }}</option>

                    @endforeach
                </select>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('id_for') {{$message}} @enderror</b></span>
            </label>

            <div class="btn-inline">
                <button class="blueSubmit" type="submit">Envoyer</button>
                <a class="redSubmit" href="{{ route("formateur.info", ['id_form' => $formateur->id]) }}">Retour</a>
            </div>

          </form>
    </div>

@endsection
