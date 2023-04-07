@extends('HomePrincipal')
@section('title')
    Dashbord Client | GSM-APP
@endsection
@section('khalid')
    
<div class="card-body">
    <div class="row">
        
        <div class="col-4">
            <div class="small-box bg-gradient-orange">
                <div class="inner">
                    <h3>{{$nbrCommande}}</h3>
                    <p>Nombre du Commande</p>
                </div>
                <div class="icon">
                    <i class="fas fa-shopping-cart"></i>
                </div>
                <a href="{{route('commande.index')}}" class="small-box-footer">
                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-4">
            <div class="small-box bg-gradient-danger">
                <div class="inner">
                    <h3>{{$nbrReclamation}}</h3>
                    <p>Nombre du Réclamation</p>
                </div>
                <div class="icon">
                    <i class="fas fa-exclamation-circle"></i>
                </div>
                <a href="{{route('reclamation.index')}}" class="small-box-footer">
                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection