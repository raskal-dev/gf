@extends('layouts.layoutkal')

@section('content')

    <div class="container">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Ajouter un Formation</h2>
            </div>

            <h4><b><u>Formation</u></b> : Insertion de la formation</h4>

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

            <form class="formupdateuser" method="POST" action="{{ route('formation.ajout') }}">
                @csrf

                <label class="labelName">
                    <b>Module :</b>
                    <input type="text" id="module" name="module" class="inputName" placeholder="Module"/>
                    <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('module') {{$message}} @enderror</b></span>
                </label>

                <label class="labelName">
                    <b>Déscription :</b>
                    <input type="text" id="description" name="description" class="inputName" placeholder="Déscription"/>
                    <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('description') {{$message}} @enderror</b></span>
                </label>

                <label class="labelName">
                    <b>Date du Début :</b>
                    <input type="date" id="date_debut" name="date_debut" class="inputName" placeholder="Date du début"/>
                    <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('date_debut') {{$message}} @enderror</b></span>
                </label>

                <label class="labelName">
                    <b>Date de la fin :</b>
                    <input type="date" id="date_fin" name="date_fin" class="inputName" placeholder="Date Fin"/>
                    <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('date_fin') {{$message}} @enderror</b></span>
                </label>

                <div class="btn-inline">
                    <button class="blueSubmit" type="submit">Envoyer</button>
                    <a class="redSubmit" href="{{ route("formation") }}">Retour</a>
                </div>

              </form>

        </div>
    </div>

@endsection
{{--

@if(Session::has('success'))
<script>
    toastr.success("{{ Session::get('success') }}");
    console.log('mande iz zao')
</script>
@endif --}}


