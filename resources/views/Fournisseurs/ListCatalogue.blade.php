
@extends('HomePrincipal')
@section('plugins.Datatables',true)


@section('khalid')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-3 bg-light "> 
                <div class="card-header bg-primary" style="opacity: 0.5;">
                    <div class="text-center">
                        <h3>La liste des Catalogues</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ID</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Date Publication</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                                <tr class="text-center">
                                    <td data-label="ID">{{$loop->iteration}}</td>
                                    <td data-label="Titre">{{Str::limit($item->title, 20)}}</td>
                                    <td data-label="Description"> {{Str::limit($item->description, 20)}}</td>
                                    <td data-label="Date Publication">{{$item->date_catalogue}}</td>
                                    <td data-label="Image"><img src="{{asset('./uploads/'.$item->image)}}" class="img img-fluid" style="width: 6rem" alt=""></td>
                                    <td data-label="Actions" class="d-flex justify-content-center align-items-center">
                                        <a href="{{route('catalogue.show',$item->id_catalogue)}}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('catalogue.edit',$item->id_catalogue)}}" class="btn btn-sm btn-warning mx-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="{{$item->id_catalogue}}"  action="{{route('catalogue.destroy',$item->id_catalogue)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <button type="submit" onclick="deleteForm({{$item->id_catalogue}})" class="btn btn-sm btn-danger">
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
        "pageLength": 3,

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