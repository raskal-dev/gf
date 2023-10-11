@extends('layouts.layoutkal')

@section('content')
    <div class="main1">
        {{-- <div class="topbar">
            <div class="toggle">
                <ion-icon name="menu-outline"></ion-icon>
            </div>

            <div class="search">
                <label>
                    <input type="text" placeholder="Search here">
                    <ion-icon name="search-outline"></ion-icon>
                </label>
            </div>

            <div class="user">
                <img src="{{ asset('build/assets/images/customer01.jpg') }}" alt="">
            </div>
        </div> --}}

        <div class="details1">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Profil d'information</h2>
                    {{-- <a href="#" class="btn1">View All</a> --}}
                </div>

                <h4>Mettez à jour les informations de profil et l'adresse e-mail de votre compte</h4>

                <form class="formupdateuser" method="POST" action="{{route('update.profile', ['user' => $data->id])}}">
                    @csrf

                    <input type="hidden" name="_method" value="put">

                    <input type="hidden" name="id" value="{{ $data -> id }}">

                    <label class="labelName">
                        <input type="text" id="inputText" name="name" class="inputName" value="{{ $data -> name }}" placeholder="Votre nom"/>
                        <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('name') {{$message}} @enderror</b></span>
                    </label>

                    <label class="labelEmail">
                        <input type="email" id="inputText" name="email" class="inputEmail" value="{{ $data -> email }}" placeholder="Votre email"/>
                        <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('email') {{$message}} @enderror</b></span>
                    </label>

                    <button class="redSubmit" type="submit">Enregistrer</button>

                  </form>

            </div>
        </div>

        <div class="details1">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Mettre à jour le mot de passe</h2>
                    {{-- <a href="#" class="btn1">View All</a> --}}
                </div>

                <h4>Assurez-vous que votre compte utilise un mot de passe long et aléatoire pour rester en sécurité.</h4>
                <div>
                    <h4>
                        @if (Session::has('success'))
                            {{ Session()->get('success'); }}
                        @endif
                    </h4>
                </div>
                <form class="formupdateuser" method="POST" action="{{route('password.Update', ['user' => $data->id])}}">
                    @csrf
                    <input type="hidden" name="_method" value="put">

                    <input type="hidden" name="id" value="{{ $data -> id }}">

                    <label class="labelName">
                        <input type="password" id="inputText" name="current_password" class="inputName" value="{{ old('current_password') }}" placeholder="Mot de passe actuel"/>
                        <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('current_password') {{$message}} @enderror</b></span>
                        <span style="color: red; margin-top: -10px;margin-left: 20px"><b>
                            @if (Session::has('fail'))
                                {{ Session()->get('fail'); }}
                            @endif
                        </b></span>
                    </label>

                    <label class="labelEmail">
                      <input type="password" id="inputText" name="password" class="inputEmail" value="{{ old('password') }}" placeholder="Nouveau mot de passe"/>
                      <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('password') {{$message}} @enderror</b></span>
                    </label>

                    <label class="labelEmail">
                        <input type="password" id="inputText" name="password_confirmation" value="{{ old('password_confirmation') }}" class="inputEmail" placeholder="Confirmez le mot de passe"/>
                        <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('password_confirmation') {{$message}} @enderror</b></span>
                    </label>

                    <button class="redSubmit" type="submit">Enregistrer</button>

                  </form>

            </div>
        </div>

        <div class="details1">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Supprimer le compte</h2>
                    {{-- <a href="#" class="btn1">View All</a> --}}
                </div>

                <h4>Une fois votre compte supprimé, toutes ses ressources et données seront définitivement supprimées.
                    Avant de supprimer votre compte, veuillez télécharger toutes les données ou informations que vous souhaitez conserver.</h4>

                <form action="{{route('user.delete', ['user' => $data -> id])}}" method="POST">
                    @csrf
                    <input type="hidden" name="_method" value="delete">

                    <button class="btnsub" type="submit">
                        <span></span>
                        <span></span>
                        <span></span>
                        <span></span>
                        <b>Supprimer</b>
                    </button>
                </form>
            </div>
        </div>
        <br><br><br>
        <div class="details1">
            <div class="recentOrders">
                <div class="cardHeader">
                    <h2>Créer un compte</h2>
                    {{-- <a href="#" class="btn1">View All</a> --}}
                </div>

                <h4>Créez un compte pour un autre utilisateur.</h4>
<br><br>
                <a class="blueSubmit" href="{{ route('user.register') }}">Créer un utilisateur</a>
<br><br>
            </div>
        </div>
    </div>
@endsection
