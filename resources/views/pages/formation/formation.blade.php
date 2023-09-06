@extends('layouts.layoutkal')

@section('content')

    <div class="container">
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Formations</h1>
        </div>

        {{-- <div class="row">
            <h2>Les Formations</h2>
        </div> --}}

        <div class="row">
            <div class="col-md-3">
                <div class="product-box position-relative">
                    <div class="icons">
                        <a href="#" class="text-decoration-none text-dark"></a>
                        <a href="#" class="text-decoration-none text-dark"></a>
                    </div>
                </div>
            </div>
        </div>
        <a class="blueSubmit" href="{{ route("formation.create") }}">Ajouter</a>
    </div>

@endsection
