@extends('HomePrincipal')
@section('plugins.Datatables', true)


@section('khalid')
        <div class="row">
            <div class="col-12">
                <div class="card my-3 bg-light ">
                    <div class="card-header bg-primary" style="opacity: 0.5;">
                        <div class="text-center">
                            <h3>L'historique des Commandes</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <table id="mytable" class="table table-bordered table-striped">
                            <thead>
                                <tr class="text-center">
                                    <th>ID Commande</th>
                                    <th>Nom & Prénom</th>
                                    <th>Quantité Commandeé</th>
                                    <th>Prix Commnde</th>
                                    <th>Date Commande</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                <tr class="text-center">
                                    <td data-label="Id Commande">{{ $item->id_commande }}</td>
                                    <td data-label="Nom & Prénom">{{ $item->name }}</td>
                                    <td data-label="Quantité Commandée">{{ $item->quantite }} KG</td>
                                    <td data-label="Prix Commande">{{ $item->prix_commande }} DH</td>
                                    <td data-label="Date Commande">{{ $item->date_commande }}</td>
                                    {{-- <td data-label="Action" id="a1" class="d-flex justify-content-center">
                                        <a href="{{ route('commande.edit', $item->id_commande) }}" class="btn btn-sm btn-warning mx-2" >
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="{{ $item->id_commande }}" action="{{ route('commande.destroy', $item->id_commande) }}"
                                            method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <button type="submit" onclick="deleteForm({{ $item->id_commande }})"
                                            class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td> --}}
            
                                </tr>
                                @endforeach
                            </tbody>

                        </table>
                    </div>
                </div>


            </div>
        </div>

@endsection
@section('js')

    <script>
        $(document).ready(function(){
        $('#mytable').DataTable({
            dom:'Bfrtip',
            buttons:['copy','excel','csv','pdf','print','colvis'],
            "pageLength": 4,

            "language": {
        "sEmptyTable":    "Aucun enregistrements correspondants trouvés",
        "sInfo":          "Affichage de _START_ à _END_ sur _TOTAL_ entrées ",
        "sSearch":        "Chercher:",
        "oPaginate": {
            
            "sNext":    "Suivant",
            "sPrevious": "Précedent"
        },
       
    }
        })
    })
    function deleteForm(id){
            const swalWithBootstrapButtons = Swal.mixin({
                customClass: {confirmButton: 'btn btn-success m-2',cancelButton: 'btn btn-danger m-2'},buttonsStyling: false})
                swalWithBootstrapButtons.fire({
                title: 'Es-tu sûr?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'OUI, supprimer !',
                cancelButtonText: 'NON, cancel!',
                reverseButtons: true
                }).then((result) => {
                    $
                if (result.isConfirmed) {
                    document.getElementById(id).submit()
                } else if (

                    result.dismiss === Swal.DismissReason.cancel
                ) {
                    swalWithBootstrapButtons.fire(
                    'Cancelled',
                    'Your imaginary file is safe :)',
                    'error'
                    )
                }
        })
    }

</script>
@if (session()->has('sucess'))
<script>
    Swal.fire({
  position: 'top-end',
  icon: 'success',
  title: "{{session()->get('sucess')}}",
  showConfirmButton: false,
  timer: 1500
})
</script>
@endif
    
@endsection
