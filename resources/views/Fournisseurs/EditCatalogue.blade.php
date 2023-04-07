@extends('HomePrincipal')

@section('khalid')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            <div class="card border border-0 border-primary mt-5">
                <div class="card-header bg-primary" style="--bs-bg-opacity: .5;">
                    <h3 class="p-2 text-center text-white">Modifier le catalogue</h3>
                </div>

                <div class="card-body bg-light">
                    <form method="POST" action="{{route('catalogue.update',$data[0]->id_catalogue)}}"  enctype="multipart/form-data">
                        @csrf
                        @method('PUT')

                        <div class="row mb-3">
                            <label for="title" class="col-md-4 col-form-label text-md-end">{{ __('Title ') }}</label>

                            <div class="col-md-6">
                                <input id="title" type="text" value="{{old('title',$data[0]->title)}}" class="form-control" name="title"  required autocomplete="title" placeholder="Veuillez saisir le Titre qui du catalogue" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="description" class="col-md-4 col-form-label text-md-end">{{ __('Description') }}</label>

                            <div class="col-md-6">
                                <input id="description" type="text" value="{{old('description',$data[0]->description)}}" class="form-control" name="description"  required autocomplete="description" placeholder="Veuillez saisir la description du Catalogue" autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="date_catalogue" class="col-md-4 col-form-label text-md-end">{{ __('Date de Publication') }}</label>

                            <div class="col-md-6">
                                <input id="date_catalogue" type="date"value="{{old('date_catalogue',$data[0]->date_catalogue)}}" class="form-control" name="date_catalogue"  required autocomplete="date_catalogue"  autofocus>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <label for="image" class="col-md-4 col-form-label text-md-end">{{ __('Image') }}</label>

                            <div class="col-md-6">
                                <input id="image" type="file" value="{{old('image',$data[0]->image)}}" class="form-control" name="image"  required autocomplete="image" autofocus>
                            </div>
                        </div>
                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-outline-primary w-100">
                                    {{ __('Modifier') }}
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
