@extends('HomePrincipal')

@section('khalid')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10 mt-5">
            <div class="card border border-0 border-primary">
                <div class="card-header bg-primary" style="--bs-bg-opacity: .5;">
                    <h3 class="p-2 text-center text-white"> Ajouter un Catalogue </h3>
                </div>

                <div class="card-body bg-light">
                    <form method="POST" action="{{ route('catalogue.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title ') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" class="form-control" name="title"  required autocomplete="title" placeholder="Veuillez saisir le Titre qui du catalogue" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" class="form-control" name="description"  required autocomplete="description" placeholder="Veuillez saisir la description du Catalogue" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date_catalogue" class="col-md-4 col-form-label text-md-end">{{ __('Date de Publication') }}</label>

                            <div class="col-md-6">
                                <input id="date_catalogue" type="date" class="form-control" name="date_catalogue"  required autocomplete="date_catalogue"  autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" class="form-control" name="image"  required autocomplete="image" autofocus>
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
