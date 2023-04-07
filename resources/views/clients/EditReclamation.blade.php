
@extends('HomePrincipal')
@section('title')
    Edit Reclamation | Laravel GSM-App
@endsection
@section('khalid')
   
    <div class="container">
        <div class="row">
            <div class="col-md-10 mx-auto">
                <div class="card my-3 bg-light">
                    <div class="card-header bg-primary" style="opacity: 0.5;">
                        <div class="text-center text-uppercase">
                            <h3>Modifier la Reclamation</h3>
                        </div>
                    </div>
                    <form action="{{ route('reclamation.update',$data[0]->id_reclamation) }}" method="post"
                        class="mt-3 text-dark">
                        @csrf
                        @method('PUT')
                        <div class="row card-body">
                            <div class="col-12 form-group mb-3">
                                <label for="claim"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Votre Probleme') }}</label>
                                <textarea id="claim" type="text" class="form-control" name="message"  required
                                    autocomplete="claim_text">
                                    {{$data[0]->message}}
                                </textarea>
                                @error('message')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
                        <div class="row card-body">
                            <div class="col-12 form-group mb-3">
                                <label for="date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Date de Reclamation') }}</label>
                                <input id="date" type="date" class="form-control" name="date_reclamation"
                                    value="{{ old('date_reclamation', $data[0]->date_reclamation) }}" required
                                    autocomplete="date_reclamation" autofocus>

                                @error('date_reclamation')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row card-body">
                            <div class="col-12 form-group mb-3 mx-auto">
                                <button type="submit" class="btn btn-primary w-100">Modifier</button>
                            </div>
                    </form>
                </div>



            </div>
        </div>
    </div>
@endsection
