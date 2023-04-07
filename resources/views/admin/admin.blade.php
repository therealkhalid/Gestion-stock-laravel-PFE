@extends('HomePrincipal')
@section('title')
    Dashbord | Admin GSM-APP
@endsection
@section('khalid')
    
<div class="card-body">
    <div class="row">
        <div class="col-4">
            <div class="small-box bg-gradient-primary">
                <div class="inner">
                    <h3>{{$nbrClients}}</h3>
                    <p>Clients Registrations</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{route('client.index')}}" class="small-box-footer">
                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-4">
            <div class="small-box bg-gradient-success">
                <div class="inner">
                    <h3>{{$nbrFournisseur}}</h3>
                    <p>Fournisseurs Registrations</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{route('fournisseures.index')}}" class="small-box-footer">
                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-4">
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3>{{$nbrLivreur}}</h3>
                    <p>Livreur Registrations</p>
                </div>
                <div class="icon">
                    <i class="fas fa-users"></i>
                </div>
                <a href="{{route('livreurs.index')}}" class="small-box-footer">
                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
    <div class="row mt-3">
        <div class="col-4">
            <div class="small-box bg-gradient-secondary">
                <div class="inner">
                    <h3>{{$nbrCommande}}</h3>
                    <p>Total des Commandes</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i> 
                </div>
                <a href="{{route('commandes.index')}}" class="small-box-footer">
                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-4">
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h3>{{$nbrReclamation}}</h3>
                    <p>Total des Réclamations</p>
                </div>
                <div class="icon">
                    <i class="fas fa-angry"></i>
                </div>
                <a href="{{route('claim.index')}}" class="small-box-footer">
                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                    
                </a>
            </div>
        </div>
        <div class="col-4">
            <div class="small-box bg-gradient-dark">
                <div class="inner">
                    <h3>{{$nbrCatalogue}}</h3>
                    <p>Total des Catalogues </p>
                </div>
                <div class="icon">
                    <i class="fas fa-archive"></i>
                </div>
                <a href="{{route('catalog.index')}}" class="small-box-footer">
                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection