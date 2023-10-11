@extends('layouts.layoutkal')

@section('content')

    <div class="container">

        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">{{ $personne->demande->nom }} {{ $personne->demande->prenom }}</h1>
        </div>

        {{-- <div class="cardHeader">
            <h2>Page d'inscripation</h2>
        </div> --}}

        {{-- <h4><b><u>Pour inscription</u></b> : Il faut attendre les responbles le valide pour que vous soyez bien inscrit</h4> --}}

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

        <form class="formupdateuser" method="POST" action="{{ route('personne.update', ['idper' => $personne->id, 'iddem' => $personne->id_dem]) }}">
            @csrf

            <label class="labelName">
                <b>Matricule : </b>
                <input type="text" id="matricule" name="matricule" class="inputName" placeholder="Matricule" value="{{ $personne->matricule }}" disabled/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('matricule') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <b>Nom : </b>
                <input type="text" id="nom" name="nom" class="inputName" placeholder="Nom" value="{{ $personne->demande->nom }}"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('nom') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <b>Prénom : </b>
                <input type="text" id="prenom" name="prenom" class="inputName" placeholder="Prénom" value="{{ $personne->demande->prenom }}"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('prenom') {{$message}} @enderror</b></span>
            </label>

            <label class="labelEmail">
                <b>Email : </b>
                <input type="email" id="mail" name="mail" class="inputEmail" placeholder="Email" value="{{ $personne->demande->mail }}"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('mail') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <b>Téléphone : </b>
                <input type="text" id="num_tel" name="num_tel" class="inputName" placeholder="Téléphone" value="{{ $personne->demande->num_tel }}"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('num_tel') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <b>Date de Naissance : </b>
                <input type="date" id="date_nais" name="date_nais" class="inputName" placeholder="Date De Naissance" value="{{ $personne->demande->date_nais }}"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('date_nais') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <b>CIN : </b>
                <input type="text" id="cin" name="cin" class="inputName" placeholder="CIN" value="{{ $personne->demande->cin }}"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('cin') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <b>Sexe : </b>
                <select name="sexe" id="sexe" class="inputName">
                    @if ($personne->demande->sexe == 'M')
                        <option value="M" selected>Masculin</option>
                        <option value="F">Féminin</option>
                    @else
                        <option value="M">Masculin</option>
                        <option value="F" selected>Féminin</option>
                    @endif

                </select>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('sexe') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <b>Formation : </b>
                <select name="id_for" id="id_for" class="inputName">
                    @foreach ($formations as $formation)

                    @if($formation->id == $personne->id_for)
                        <option value="{{ $formation->id }}" selected>{{ $formation->module }}</option>
                    @else
                        <option value="{{ $formation->id }}">{{ $formation->module }}</option>
                    @endif
                    @endforeach
                </select>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('sexe') {{$message}} @enderror</b></span>
            </label>

            {{-- <label class="labelName"></label>
                <input type="text" id="demande" name="demande" class="inputName" placeholder="Demande"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('demande') {{$message}} @enderror</b></span>
            </label> --}}

            <div class="btn-inline">
                <button class="blueSubmit" type="submit">Envoyer</button>
                {{-- <button class="redSubmit" type="submit">Retour</button> --}}
                <a class="redSubmit" href="{{ route('personne') }}">Retour</a>
            </div>

          </form>
    </div>

@endsection
