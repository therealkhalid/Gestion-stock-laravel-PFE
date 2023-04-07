@extends('HomePrincipal')
@section('title')
    Show Admin | Laravel GSM-App
@endsection
@section('khalid')
{{-- <style>
 
    .main-sidebar,.main-header{
        background: #3C3B3F;  
background: -webkit-linear-gradient(to left, #605C3C, #3C3B3F); 
background: linear-gradient(to left, #605C3C, #3C3B3F); 

    }
    .nav-link,.nav-item{color: white !important;}
    .content-wrapper{background: #ADA996; 
} 
</style> --}}
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card my-3">
                    <div class="card-header bg-primary" style="opacity: 0.5;">
                        <div class="text-center text-uppercase">
                            <h3>{{ $admin->name }}</h3>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label>ID</label>
                            <input  class="form-control" value="{{ $admin->id }}" readonly>
                        </div>
                        <div class="col-6 form-group mb-3">
                            <label >Nom & Prénom</label>
                            <input  class="form-control" value="{{ $admin->name }}"  readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label >Email</label>
                            <input  class="form-control" value="{{ $admin->email }}"readonly>
                        </div>
                        <div class=" col-6 form-group mb-3">
                            <label >Role</label>
                            <input  class="form-control" value="{{ $admin->role }}" readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-6 form-group mb-3">
                            <label >Adress</label>
                            <input  class="form-control" value="{{ $admin->adress }}" readonly>
                        </div>
                        <div class=" col-6 form-group mb-3">
                            <label>Téléphonne</label>
                            <input  class="form-control" value="{{ $admin->telephone }}"readonly>
                        </div>
                    </div>
                    <div class="row card-body">
                        <div class="col-12 form-group mb-3">
                            <a class="btn btn-primary w-100" href="{{route('admins.index')}}">Retour</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
