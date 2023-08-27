@extends('layouts.layoutkal')

@section('content')

    <div class="container">
        <div class="recentOrders">
            <div class="cardHeader">
                <h2>Page d'inscripation</h2>
            </div>

            <h4><b><u>Formation</u></b> : Insertion de la formation</h4>

            <br>
                @if(Session::has('message'))
                    <div class="alert alert-success">
                        <p>
                            <b>{{ session()->get('message') }}</b>
                        </p>
                    </div>
                @endif
            <br>

            <form class="formupdateuser" method="POST" action="{{ route('formation.ajout') }}">
                @csrf

                <label class="labelName">
                    <input type="text" id="module" name="module" class="inputName" placeholder="Module"/>
                    <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('module') {{$message}} @enderror</b></span>
                </label>

                <label class="labelName">
                    <input type="text" id="description" name="description" class="inputName" placeholder="Déscription"/>
                    <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('description') {{$message}} @enderror</b></span>
                </label>

                <label class="labelName">
                    <input type="date" id="date_debut" name="date_debut" class="inputName" placeholder="Date du début"/>
                    <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('date_debut') {{$message}} @enderror</b></span>
                </label>

                <label class="labelName">
                    <input type="date" id="date_fin" name="date_fin" class="inputName" placeholder="Date Fin"/>
                    <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('date_fin') {{$message}} @enderror</b></span>
                </label>

                <div class="btn-inline">
                    <button class="blueSubmit" type="submit">Envoyer</button>
                    <button class="redSubmit"><a class="asubmit" href="{{ route("formation") }}">Retour</a></button>
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


