@extends('HomePrincipal')
@section('title')
    Add Réclamation | GSM-APP
@endsection
@section('khalid')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border border-0 border-primary mt-5">
                <div class="card-header bg-primary" style="--bs-bg-opacity: .5;">
                    <h3 class="p-2 text-center text-white">Ajouter une Réclamation</h3>
                </div>

                <div class="card-body bg-light">
                    <form method="POST" action="{{ route('reclamation.store') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="claim" class="col-md-4 col-form-label text-md-end">{{ __('Votre Probleme') }}</label>

                            <div class="col-md-6">
                                <textarea id="claim" type="text" class="form-control" name="message" maxlength="100"  required autocomplete="claim_text"
                                 placeholder="Veuillez Taper Votre Probleme" autofocus></textarea>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date" class="col-md-4 col-form-label text-md-end">{{ __('Date de Reclamation') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date_reclamation"  required autocomplete="date_reclamation" autofocus>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary w-100">
                                    {{ __('Ajouter') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
