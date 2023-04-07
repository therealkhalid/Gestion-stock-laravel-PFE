@extends('HomePrincipal')

@section('khalid')
    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card border border-0 border-primary mt-4">
                    <div class="card-header bg-primary" style="--bs-bg-opacity: .5;">
                        <h3 class="p-2 text-center text-white"><i class="fa fa-money-bill-wave me-5  fw-bold "></i> Ajouter un
                            Paiement <i class="fa fa-money-bill-wave fw-bold ms-4 "></i></h3>
                    </div>

                    <div class="card-body bg-light">
                        <form method="POST" action="{{ route('paiement.store') }}">
                            @csrf

                            <div class="row mb-3">
                                <label for="client"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Choisi votre client') }}</label>
                                <div class="col-md-6">
                                    <select class="form-control" name="id" id="client" required
                                        autocomplete="new-client">
                                        @foreach ($client as $clt)
                                            <option value={{ $clt->id }}>{{ $clt->name }}</option>
                                        @endforeach
                                    </select>

                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="prix"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Prix en (DH)') }}</label>

                                <div class="col-md-6">
                                    <input id="prix" type="number" class="form-control" name="prix_paiement" required
                                        autocomplete="prix_paiement" placeholder="Veuillez saisir le montant d'opération"
                                        autofocus>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="date"
                                    class="col-md-4 col-form-label text-md-end">{{ __('Date du paiment') }}</label>

                                <div class="col-md-6">
                                    <input id="date" type="date" class="form-control" name="date_paiement" required
                                        autocomplete="date_paiement" autofocus>
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
