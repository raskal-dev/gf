@extends('layouts.layoutkal')

@section('content')

    <div class="container">

        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Contrat de ""</h1>
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

        <form class="formupdateuser" method="POST" action="{{ route('formateur.ajouter') }}">
            @csrf

            <label class="labelName">
                <input type="text" id="nom_form" name="nom_form" class="inputName" placeholder="Nom"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('nom_form') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <input type="text" id="prenom_form" name="prenom_form" class="inputName" placeholder="Prénom"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('prenom_form') {{$message}} @enderror</b></span>
            </label>

            <label class="labelEmail">
                <input type="email" id="mail_form" name="mail_form" class="inputEmail" placeholder="Email"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('mail_form') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <input type="text" id="num_tel_form" name="num_tel_form" class="inputName" placeholder="Téléphone"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('num_tel_form') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <input type="date" id="date_nais_form" name="date_nais_form" class="inputName" placeholder="Date De Naissance"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('date_nais_form') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <input type="text" id="cin_form" name="cin_form" class="inputName" placeholder="CIN"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('cin_form') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <select name="sexe_form" id="sexe_form" class="inputName">
                    <option value=""> --- Selection votre genre --- </option>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('sexe_form') {{$message}} @enderror</b></span>
            </label>

            <div class="btn-inline">
                <button class="blueSubmit" type="submit">Envoyer</button>
                <a class="redSubmit" href="{{ route("formateur") }}">Retour</a>
            </div>

          </form>
    </div>

@endsection
