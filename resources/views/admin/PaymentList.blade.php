

@extends('HomePrincipal')
@section('plugins.Datatables',true)


@section('khalid')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-3 bg-light "> 
                <div class="card-header bg-primary" style="opacity: 0.5;">
                    <div class="text-center">
                        <h3>Liste des Paiements</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Nom & Prénom</th>
                                <th>Adress</th>
                                <th>Téléphonne</th>
                                <th>Montant Total</th>
                                <th>Mantant payé</th>
                                <th>Le Rest</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $dta )
                                <tr class="text-center">
                                    <td data-label="Nom & Prénom">{{$dta->name}}</td>
                                    <td data-label="Adress">{{$dta->adress}}</td>
                                    <td data-label="Téléphonne">{{$dta->telephone}}</td>
                                    <td data-label="Mantant Total">{{$dta->prixCommande}}</td>
                                    <td data-label="Mantant payé">{{$dta->prixPaiement}}</td>
                                    <td data-label="Le Rest" class="{{$dta->prixCommande-$dta->prixPaiement==0 ?'bg-success':'bg-danger'}}">{{$dta->prixCommande-$dta->prixPaiement}}</td>
                                    <td data-label="Actions">
                                        <form id="{{$dta->id}}"  action="{{route('paiement.destroy',$dta->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <button type="submit" onclick="deleteForm({{$dta->id}})" class="btn btn-sm btn-danger">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </td>
                                </tr>
                            @endforeach
                        </tbody>
                        
                    </table>
                </div>
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
            "pageLength": 5,

            "language": {
        "sEmptyTable":    "",
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
