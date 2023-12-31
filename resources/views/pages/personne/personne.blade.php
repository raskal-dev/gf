@extends('layouts.layoutkal')

@section('content')

    <div class="container">
        <div class="head shadow-lg p-3 mb-5 bg-body-tertiary rounded titrehead">
            <h1 class="text-center text text-info">Personnes</h1>
        </div>
        <h1>Personne</h1>
        <p>Listes des personnes qui est acceptée dans un formation.</p>
        <br><br>
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

        <div class="m-4">
            <div class="row">
            @foreach ($personnes as $personne)
            <div class="col-md-6 col-xl-4 mb-4">
                <div class="card shadow border-start-primary py-2">
                    <div class="card-body">
                        <div class="row align-items-center no-gutters">
                            <div class="col me-2">
                                <div class="text-uppercase text-primary fw-bold text-xs h3 mb-1" style="height: 80px;"><span>{{ $personne->demande->nom }} {{ $personne->demande->prenom }}</span></div>
                                <hr class="hr">
                                <div class="text-dark h5 mb-0">
                                    <span class="fw-blod"><u>Info #{{ $personne->id }}</u></span><br>
                                    <span class="fw-bold">Matricule : </span><span>{{ $personne->matricule }}</span><br><br>
                                    <span class="fw-bold">Formation : </span><br><span>{{ $personne->formation->module }}</span><br><br>
                                    <span class="fw-bold">CIN : </span><br><span>
                                            {{-- @if($personne->formation->cin == "" || $personne->age <= 1)
                                                {{ $personne->age }} an
                                            @else
                                                {{ $personne->age }} ans
                                            @endif --}}
                                            {{ $personne->demande->cin }}
                                        </span><br><br>
                                    <span class="fw-bold">Date de naissace :
                                        @php
                                            $dateNais = \Carbon\Carbon::parse($personne->demande->date_nais);
                                            $dateNaisFormat = $dateNais->format('d/m/Y');
                                        @endphp

                                    </span><br>
                                    <span>{{ $dateNaisFormat }}</span><br><br>
                                    <span class="fw-bold">Genre : </span><br>
                                    <span>
                                        @if ($personne->demande->sexe == 'M')
                                            Mascullin

                                        @else
                                            Féminin
                                        @endif
                                    </span><br><br>
                                    <span class="fw-bold">Téléphone : </span><br><span>{{ $personne->demande->num_tel }}</span><br><br>
                                    <span class="fw-bold">Email : </span><br><span>{{ $personne->demande->mail }}</span>

                                    <hr class="hr">
                                    <span class="fw-blode">Action</span><br>
                                    <a href="{{ route('personne.show', ['personne' => $personne->id]) }}"><i class="fa-regular fa-pen-to-square"></i></a>
                                    <span class="p-2"></span>
                                    <span class="text-danger">
                                        <a href="#"><i class="text-danger fa-solid fa-trash-can" onclick="if(confirm('Vous-voulez vraiment supprimer cette personne ?')){document.getElementById('form-{{ $personne->id }}').submit() }"></i></a>
                                    </span>
                                    <form id="form-{{ $personne->id }}" action="{{ route('personne.delete', ['personne' => $personne->id]) }}" method="post">
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
