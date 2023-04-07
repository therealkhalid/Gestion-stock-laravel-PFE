@extends('HomePrincipal')
@section('title')
    Edit Fournisseur | Laravel GSM-App
@endsection
@section('khalid')

    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card my-3 bg-light">
                    <div class="card-header bg-primary" style="opacity: 0.5;">
                        <div class="text-center text-uppercase">
                            <h3>Modifier mes informations</h3>
                        </div>
                    </div>
                    <form action="{{ route('profile_fournisseur.update', $data[0]->id) }}" method="post" class="mt-3 text-dark">
                        @csrf
                        @method('PUT')
                        <div class="row card-body">
                            <div class="col-6 form-group mb-3">
                                <label for="name">Nom & Prénom</label>
                                <input type="text" class="form-control" required value="{{ old('name', $data[0]->name) }}"
                                    name="name" id="name" >
                                @error('name')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            <div class="col-6 form-group mb-3">
                                <label for="email">Email</label>
                                <input type="text" class="form-control" required value="{{ old('email', $data[0]->email) }}"
                                    name="email" id="email" >
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                        </div>
                        <div class="row card-body">
                            <div class="col-6 form-group mb-3">
                                <label for="telephone">Téléphonne</label>
                                <input type="text" class="form-control" required value="{{ old('telephone', $data[0]->telephone) }}"
                                    name="telephone" id="telephone" >
                                @error('telephone')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                            
                            <div class="col-6 form-group mb-3">
                                <label for="adress">Adress</label>
                                <input type="text" class="form-control" required value="{{ old('adress', $data[0]->adress) }}"
                                    name="adress" id="adress" >
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
                                <select class="form-control"  name="role" id="role" required autocomplete="new-role">
                                    <option  value="2" selected>Fournisseur</option>
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
