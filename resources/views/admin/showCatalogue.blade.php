@extends('HomePrincipal')
@section('title')
    Show Catalogue | Laravel
@endsection
@section('khalid')
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card my-3 bg-light">
                    <div class="card-header">
                        <div class="text-center text-uppercase text-dark">
                            <h3>Afficher les détails</h3>
                        </div>
                    </div>
                    <div class="card-body mx-auto">

                        <div class="card mb-1 text-dark">
                            <div class="row g-0">
                                <div class="col-md-6 my-auto ">
                                    <img src="{{ asset('./uploads/' . $data[0]->image) }}" class="img-fluid rounded-start mx-auto"
                                        alt="...">
                                </div>
                                <div class="col-md-6">
                                    <div class=" row card-body">
                                        <div class=" col-6 form-group mb-3">
                                            <label>Nom & Prénom</label>
                                            <input class="form-control" value="{{ $data[0]->name }}" readonly>
                                        </div>
                                        <div class=" col-6 form-group mb-3">
                                            <label>Adress</label>
                                            <input class="form-control" value="{{ $data[0]->adress }}" readonly>
                                        </div>

                                    </div>
                                    <div class=" row card-body">
                                        <div class=" col-6 form-group mb-0">
                                            <label>Téléphnone</label>
                                            <input class="form-control" value="{{ $data[0]->telephone }}" readonly>
                                        </div>
                                        <div class=" col-6 form-group mb-0">
                                            <label>Date de Publication</label>
                                            <input class="form-control" value="{{ $data[0]->date_catalogue }}" readonly>
                                        </div>

                                    </div>
                                    <div class=" row card-body">
                                        <div class=" col-6 form-group mb-3">
                                            <label>Description</label>
                                            <textarea class="form-control" readonly>{{ $data[0]->description }}</textarea>
                                        </div>
                                        <div class=" col-6 form-group mb-3">
                                            <label>Titre</label>
                                            <textarea class="form-control" readonly>{{ $data[0]->title }}</textarea>

                                        </div>

                                    </div>
                                    <div class="row card-body">
                                        <div class="col-12 form-group mb-0">
                                            <a class="btn btn-primary w-100" href="{{ route('catalog.index') }}">Retour</a>
                                        </div>
                                    </div>


                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
