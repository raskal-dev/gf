@extends('layouts.layoutkal')

@section('content')

    <div class="container">

        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Formateur : "{{ $formateur->nom_form }} {{ $formateur->prenom_form }}"</h1>
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
        <a class="blueSubmit" href="{{ route('formateur.contrat', ['id_form' => $formateur->id]) }}">Contrat</a>
        <br><br>
        <div class="col-lg-5 col-xl-12">

            @foreach ($formations as $formation)

            <div class="row d-flex justify-content-between align-items-center">
                <div class="col-lg-5 col-xl-12">
                    <div class="card shadow mb-4">
                        <div class="card-header  d-flex justify-content-between align-items-center">
                            <h6 class="text-primary fw-bold m-0">{{ $formation->module }}</h6>

                            <div class="dropdown no-arrow"><button class="btn btn-link btn-sm dropdown-toggle"
                                aria-expanded="false" data-bs-toggle="dropdown" type="button"><i
                                    class="fas fa-ellipsis-v text-gray-400"></i></button>
                            <div class="dropdown-menu shadow dropdown-menu-end animated--fade-in">
                                <p class="text-center dropdown-header">Action :</p><a
                                    class="dropdown-item" href="#">&nbsp;Supprimer</a>
                            </div>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="col-xl-6">
                                <div class="chart-area">
                                    <ul>
                                        <li>
                                            <b>Référence : </b>
                                            {{ $formation->ref }}
                                        </li>
                                        <li>
                                            <b>Déscription : </b>
                                            {{ $formation->description }}
                                        </li>
                                    </ul>
                                </div>
                            </div>


                        </div>
                    </div>
                </div>
            </div>


            @endforeach

        </div>

    </div>

@endsection
