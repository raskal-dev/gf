@extends('layouts.layoutkal')

@section('content')

    <div class="main1">

        <div class="container">
            <div class="row">
                <h2>Les Formations</h2>
            </div>
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
        </div>








        <a class="asubmit" href="{{ route("formation.create") }}"><button class="blueSubmit">Ajouter</button></a>
    </div>

@endsection
