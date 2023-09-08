@extends('layouts.layoutkal')

@section('content')

    <div class="container">

        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Formateur</h1>
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

        <a class="blueSubmit" href="{{ route('formateur.create') }}">Ajout</a><br>

        <div class="m-4">
            <div class="row">
            @foreach ($formateurs as $formateur)
            <div class="col-md-6 col-xl-4 mb-4">
                <div class="card shadow border-start-primary py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-primary fw-bold text-xs h3 mb-1"><span>{{ $formateur->nom_form }} {{ $formateur->prenom_form }}</span></div>
                                <hr class="hr">
                                <div class="text-dark h5 mb-0">
                                    <span class="fw-blod"><u>Info #{{ $formateur->id }}</u></span><br>
                                    <span class="fw-bold">CIN : </span><span>{{ $formateur->cin_form }}</span><br><br>
                                    <span class="fw-bold">Date de naissace :
                                        @php
                                            $dateNais = \Carbon\Carbon::parse($formateur->date_nais_form);
                                            $dateNaisFormat = $dateNais->format('d/m/Y');
                                        @endphp


                                    </span><br>
                                    <span>{{ $dateNaisFormat }}</span><br><br>
                                    <span class="fw-bold">Genre : </span><br>
                                    <span>
                                        @if ($formateur->sexe_form == 'M')
                                            Mascullin

                                        @else
                                            Féminin
                                        @endif
                                    </span><br><br>
                                    <span class="fw-bold">Téléphone : </span><br><span>{{ $formateur->num_tel_form }}</span><br><br>
                                    <span class="fw-bold">Email : </span><br><span>{{ $formateur->mail_form }}</span>

                                    <hr class="hr">
                                    <span class="fw-blode">Action</span><br>
                                    <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Modifier"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <span class="p-2"></span>

                                    <span class="text-danger">
                                        <a href="{{ route('formateur.info', ['id_form' => $formateur->id]) }}" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Plus d'info"><i class="fa-solid fa-file-lines"></i></a>
                                    </span>
                                    <span class="p-2"></span>

                                    <span class="text-danger">
                                        <a href="#" data-bs-toggle="tooltip" data-bs-placement="bottom" title="Supprimer"><i class="text-danger fa-solid fa-trash-can" onclick="if(confirm('Vous-voulez vraiment supprimer cette cite ?')){document.getElementById('form-1').submit() }"></i></a>
                                    </span>
                                    <form id="form-1" action="#" method="post">
                                        @csrf
                                        <input type="hidden" name="_method" value="delete">
                                    </form>
                                </div>
                            </div>
                            {{-- <div class="col-auto"><a href="#"><i class="fas fa-clipboard-list fa-2x text-gray-300"></i></a></div> --}}
                        </div>
                    </div>
                </div>
            </div>
            @endforeach
        </div>
        </div>

    </div>

@endsection
