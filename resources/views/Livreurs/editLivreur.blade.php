@extends('HomePrincipal')
@section('title')
    Update Livreur | Laravel GSM-App
@endsection
@section('khalid')
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card my-3 bg-light">
                    <div class="card-header bg-primary" style="opacity: 0.5;">
                        <div class="text-center text-uppercase">
                            <h3>Modifier un Livreur</h3>
                        </div>
                    </div>
                    <form action="{{ route('livreurs.update', $livreur->id) }}" method="post" class="mt-3 text-dark">
                        @csrf
                        @method('PUT')
                        <div class="row card-body">
                            <div class="col-6 form-group mb-3">
                                <label for="name">Nom & Prénom</label>
                                <input type="text" class="form-control" value="{{ old('name', $livreur->name) }}"
                                    name="name" id="name" placeholder="Your Name">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6 form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" value="{{ old('email', $livreur->email) }}"
                                    name="email" id="email" placeholder="email">
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row card-body">
                            <div class="col-6 form-group mb-3">
                                <label for="telephone">Téléphonne</label>
                                <input type="text" class="form-control"
                                    value="{{ old('telephone', $livreur->telephone) }}" name="telephone" id="telephone"
                                    placeholder="telephone">
                                @error('telephone')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="col-6 form-group mb-3">
                                <label for="adress">Adress</label>
                                <input type="text" class="form-control" value="{{ old('adress', $livreur->adress) }}"
                                    name="adress" id="adress" placeholder="adress">
                                @error('adress')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>


                        <div class="row card-body">
                            <div class="col-12 form-group mb-3">
                                <label for="role">Role</label>
                                <select class="form-control" name="role" id="role" required autocomplete="new-role">
                                    <option value="0">Admin</option>
                                    <option value="1">Client</option>
                                    <option value="2">Fournisseur</option>
                                    <option value="3" selected>Livreur</option>
                                </select>
                                @error('role')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row card-body">

                            <div class="col-12 form-group mb-3">
                                <button type="submit" class="btn btn-primary w-100">Modifier</button>
                            </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
@endsection
