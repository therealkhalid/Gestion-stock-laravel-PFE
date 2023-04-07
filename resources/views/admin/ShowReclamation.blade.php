@extends('HomePrincipal')
@section('title')
    Show Réclamation | Laravel GSM-App
@endsection
@section('khalid')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card my-3">
                    <div class="card-header bg-primary" style="opacity: 0.5;">
                        <div class="text-center text-uppercase">
                            <h3>{{ $data[0]->name }}</h3>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label>ID</label>
                            <input  class="form-control" value="{{ $data[0]->id_reclamation }}" readonly>
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label>Nom & Prénom</label>
                            <input  class="form-control" value="{{ $data[0]->name }}"  readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label >Adress</label>
                            <input  class="form-control" value="{{ $data[0]->adress }}" readonly>
                        </div>
                        <div class=" col-6 form-group mb-3">
                            <label>Téléphonne</label>
                            <input  class="form-control" value="{{ $data[0]->telephone }}"readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label >Message</label>
                            <textarea readonly cols="30" class="form-control" rows="5">{{$data[0]->message}}</textarea>
                        </div>
                        <div class=" col-6 form-group mb-3">
                            <label>Date Réclamation</label>
                            <input  class="form-control" value="{{ $data[0]->date_reclamation }}"readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-12 form-group mb-3">
                            <a class="btn btn-primary w-100" href="{{route('claim.index')}}">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
