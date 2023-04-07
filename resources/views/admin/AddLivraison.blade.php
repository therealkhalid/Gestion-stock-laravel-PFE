@extends('HomePrincipal')

@section('khalid')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border border-0 border-primary mt-4">
                <div class="card-header bg-primary" style="--bs-bg-opacity: .5;">
                    <h3 class="p-2 text-center text-white"><i class="fa fa-id-card me-5  fw-bold "></i> Ajouter une Livraison <i class="fa fa-id-card fw-bold ms-4 "></i></h3>
                </div>

                <div class="card-body bg-light">
                    <form method="POST" action="{{ route('livraison.store') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('Choisi votre Livreur') }}</label>
                            <div class="col-md-6">
                                    <select class="form-control" name="id" id="livreur" required autocomplete="new-livreur">
                                        @foreach ( $livreur as $liv )
                                            
                                        <option value={{$liv->id}}>{{$liv->name}}</option>
                                        @endforeach
                                    </select>
    
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="id" class="col-md-4 col-form-label text-md-end">{{ __('Choisi votre client') }}</label>
                            <div class="col-md-6">
                                    <select class="form-control" name="id_commande" id="client" required autocomplete="new-client">
                                        @foreach ( $client as $clt )
                                            
                                        <option value={{$clt->id_commande}}>{{"N² :".$clt->id_commande."| client : ".$clt->name}}</option>
                                        @endforeach
                                    </select>
    
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="adress" class="col-md-4 col-form-label text-md-end">{{ __('Adress') }}</label>

                            <div class="col-md-6">
                                <input id="adress" type="text" class="form-control" name="adress"  required autocomplete="adress_livraison" placeholder="Veuillez saisir l'adress du livraison" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date_livraison" class="col-md-4 col-form-label text-md-end">{{ __('Date du Livraison') }}</label>

                            <div class="col-md-6">
                                <input id="date" type="date" class="form-control" name="date_livraison"  required autocomplete="date_livraison" autofocus>
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
