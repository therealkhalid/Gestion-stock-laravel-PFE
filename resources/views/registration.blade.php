@extends('HomePrincipal')

@section('khalid')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border border-0 border-primary mt-3">
                <div class="card-header bg-primary" style="--bs-bg-opacity: .5;">
                    <h3 class="p-2 text-center text-white"><i class="fa fa-id-card me-5  fw-bold "></i> Ajouter un utilisateur <i class="fa fa-id-card fw-bold ms-4 "></i></h3>
                </div>

                <div class="card-body bg-light">
                    <form method="POST" action="{{ route('admins.store') }}">
                        @csrf
                        
                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">{{ __('Nom & Prénom') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Veuillez saisir votre nom & prénom" required autocomplete="name" autofocus>

                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Veuillez saisir votre email" required autocomplete="email">

                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="role" class="col-md-4 col-form-label text-md-end">{{ __('Role') }}</label>

                            <div class="col-md-6">
                                <select class="form-control" name="role" id="role" required  autocomplete="new-role">
                                    <option value="0">Admin</option>
                                    <option value="1">Client</option>
                                    <option value="2">Fournisseur</option>
                                    <option value="3">Livreur</option>
                                </select>

                                @error('role')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="adress" class="col-md-4 col-form-label text-md-end">{{ __('Adress') }}</label>

                            <div class="col-md-6">
                                <input id="adress" type="text" class="form-control" name="adress" placeholder="Veuillez saisir votre adress" required autocomplete="new-adress">

                                @error('adress')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="telephone" class="col-md-4 col-form-label text-md-end">{{ __('Téléphonne') }}</label>

                            <div class="col-md-6">
                                <input id="telephone" type="text" class="form-control" name="telephone" placeholder="Veuillez saisir votre numéro de téléphonne" required autocomplete="new-telephone">

                                @error('telephone')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="password" class="col-md-4 col-form-label text-md-end">{{ __('Mot de passe') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control"placeholder="Veuillez saisir votre mot de passe" name="password" required autocomplete="new-password">

                                @error('password')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
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
