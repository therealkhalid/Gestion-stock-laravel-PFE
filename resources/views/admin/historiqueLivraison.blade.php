@extends('HomePrincipal')
@section('plugins.Datatables',true)
@section('title')
    Dashbord Admin | GSM-APP
@endsection

@section('khalid')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-3 bg-light "> 
                <div class="card-header bg-primary" style="opacity: 0.5;">
                    <div class="text-center">
                        <h3>Historique des Livraisons</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                {{-- <th>ID Livraison</th> --}}
                                <th>ID Commande</th>
                                <th>Nom & Prénom</th>
                                <th>Adress</th>
                                <th>Date de livraison</th>
                                <th>Etat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dta)
                                <tr class="text-center">
                                    {{-- <td>{{$dta->id_livraison}}</td> --}}
                                    <td data-label="ID Commande">{{$dta->id_commande}}</td>
                                    <td data-label="Nom & Prénom">{{$dta->name}}</td>
                                    <td data-label="Adress">{{$dta->adress}}</td>
                                    <td data-label="Date de livraison">{{$dta->date_livraison}}</td>
                                    <td data-label="Etat" class="{{$dta->etat==0 ? 'bg-warning':'bg-success'}}">{{$dta->etat==0?'En cours':'Livrer'}}</td>
                                    <td data-label="Action">
                                        <form id="{{$dta->id_livraison}}"  action="{{route('livraison.destroy',$dta->id_livraison)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <button type="submit" onclick="deleteForm({{$dta->id_livraison}})" class="btn btn-sm btn-danger">
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