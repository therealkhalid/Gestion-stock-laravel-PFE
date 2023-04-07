
@extends('HomePrincipal')
@section('title')
    Show Clients | Laravel GSM-App
@endsection
@section('khalid')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card my-3">
                    <div class="card-header bg-primary" style="opacity: 0.5;">
                        <div class="text-center text-uppercase">
                            <h3>{{ $client->name }}</h3>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label>ID</label>
                            <input  class="form-control" value="{{ $client->id }}" readonly>
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label >Nom & Prénom</label>
                            <input  class="form-control" value="{{ $client->name }}"  readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label >Email</label>
                            <input  class="form-control" value="{{ $client->email }}"readonly>
                        </div>
                        <div class=" col-6 form-group mb-3">
                            <label >Role</label>
                            <input  class="form-control" value="{{ $client->role }}" readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label >Adress</label>
                            <input  class="form-control" value="{{ $client->adress }}" readonly>
                        </div>
                        <div class=" col-6 form-group mb-3">
                            <label>Téléphonne</label>
                            <input  class="form-control" value="{{ $client->telephone }}"readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-12 form-group mb-3">
                            <a class="btn btn-primary w-100" href="{{route('client.index')}}">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
