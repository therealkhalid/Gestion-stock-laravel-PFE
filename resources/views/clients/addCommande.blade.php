@extends('HomePrincipal')
@section('title')
    Add Commande | GSM-APP
@endsection
@section('khalid')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border border-0 border-primary mt-5">
                <div class="card-header bg-primary" style="--bs-bg-opacity: .5;">
                    <h3 class="p-2 text-center text-white">Ajouter une Commande</h3>
                </div>

                <div class="card-body bg-light">
                    <form method="POST" action="{{ route('commande.store') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="qte" class="col-md-4 col-form-label text-md-end">{{ __('Quantité en (KG)') }}</label>

                            <div class="col-md-6">
                                <input id="qte" type="number" class="form-control" name="quantite"  required autocomplete="quantite" placeholder="Veuillez saisir la quantité qui vous voulez commander" autofocus>
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
