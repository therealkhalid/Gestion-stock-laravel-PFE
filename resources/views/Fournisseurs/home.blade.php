@extends('HomePrincipal')
@section('khalid')
    
<div class="card-body">
    <div class="row">
        
        <div class="col-4">
            <div class="small-box bg-gradient-warning">
                <div class="inner">
                    <h3>{{$nbrCatalogue}}</h3>
                    <p>Le nombre des Catalogues</p>
                </div>
                <div class="icon">
                    <i class="fas  fa-boxes"></i>
                </div>
                <a href="{{route('catalogue.index')}}" class="small-box-footer">
                    More info <i class="fas fa-arrow-circle-right"></i>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection