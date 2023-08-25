@extends('layouts.layoutkal')

@section('content')

    <div class="container">

        <div class="cardHeader">
            <h2>Page d'inscripation</h2>
        </div>

        <h4><b><u>Pour inscription</u></b> : Il faut attendre les responbles le valide pour que vous soyez bien inscrit</h4>

        <br>
            @if(session()->has('success'))
                <div class="messagealert">
                    <p class="contentalert">
                        <b>{{ session()->get('success') }}</b>
                    </p>
                </div>
            @endif
        <br>

        <form class="formupdateuser" method="POST" action="{{ route('demande.ajouter') }}">
            @csrf

            <label class="labelName">
                <input type="text" id="nom" name="nom" class="inputName" placeholder="Nom"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('nom') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <input type="text" id="prenom" name="prenom" class="inputName" placeholder="Prénom"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('prenom') {{$message}} @enderror</b></span>
            </label>

            <label class="labelEmail">
                <input type="email" id="mail" name="mail" class="inputEmail" placeholder="Email"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('mail') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <input type="text" id="num_tel" name="num_tel" class="inputName" placeholder="Téléphone"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('num_tel') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <input type="date" id="date_nais" name="date_nais" class="inputName" placeholder="Date De Naissance"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('date_nais') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <input type="text" id="cin" name="cin" class="inputName" placeholder="CIN"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('cin') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <select name="sexe" id="sexe" class="inputName">
                    <option value=""> --- Selection votre genre --- </option>
                    <option value="M">Masculin</option>
                    <option value="F">Féminin</option>
                </select>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('sexe') {{$message}} @enderror</b></span>
            </label>

            <div class="btn-inline">
                <button class="blueSubmit" type="submit">Envoyer</button>
                <button class="redSubmit" type="submit">Retour</button>
            </div>

          </form>
    </div>

@endsection
