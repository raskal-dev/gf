@extends('layouts.layoutkal')

@section('content')

    <div class="container">

        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">{{ $noteone->label }}</h1>
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

        <form class="formupdateuser" method="POST" action="{{ route('note.update', ['note' => $noteone->id, 'id_ev' => $evaluation->id, 'id_pers' => $personne->id, 'id_for' => $formation->id]) }}">
            @csrf

            <input type="hidden" name="_method" value="put">
            <label class="labelName">
                <input type="text" id="label" name="label" class="inputName" placeholder="Label" value="{{ $noteone->label }}"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('label') {{$message}} @enderror</b></span>
            </label>

            <label class="labelName">
                <input type="text" id="note" name="note" class="inputName" placeholder="Note" value="{{ $noteone->note }}"/>
                <span style="color: red; margin-top: -10px;margin-left: 20px"><b>@error('note') {{$message}} @enderror</b></span>
            </label>

            <div class="btn-inline">
                <button class="blueSubmit" type="submit">Valider</button>
                {{-- <button class="redSubmit" type="submit">Retour</button> --}}
                <a class="redSubmit" href="{{ url()->previous() }}">Retour</a>
            </div>

          </form>
    </div>

@endsection
