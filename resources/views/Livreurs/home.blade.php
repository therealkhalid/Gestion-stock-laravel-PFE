@extends('HomePrincipal')
@section('khalid')
    
<div class="card-body">
    <div class="row">
        
        <div class="col-4">
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3>{{$nbrLivraison}}</h3>
                    <p>Le nombre du Laivraison</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{route('livraisons.index')}}" class="small-box-footer">
                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
        <div class="col-4">
            <div class="small-box bg-gradient-orange">
                <div class="inner">
                    <h3>{{$nbrLivraison2}}</h3>
                    <p>L'Historique du Laivraison</p>
                </div>
                <div class="icon">
                    <i class="fas fa-user-plus"></i>
                </div>
                <a href="{{route('livraisons.show',auth()->user()->id)}}" class="small-box-footer">
                    Plus d'infos <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection