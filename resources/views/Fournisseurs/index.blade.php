
@extends('HomePrincipal')
@section('plugins.Datatables',true)


@section('khalid')
<style>
    .table{
        border-collapse: collapse;
    }
    
    
    .table th{
        background-color: darkblue;
        color:#ffffff;
    }
    
    
    
    /*responsive*/
    @media(max-width: 1100px){
        *{
            font-size: 14px;
        }
    }
    @media(max-width: 800px){
        .table thead{
            display: none;
        }
        .dt-buttons,#mytable_filter,.dataTables_info,.pagination{
            font-size: 10px;
    
        }
    
        .table, .table tbody, .table tr, .table td{
            display: block;
            /* width: 88%; */
        }
        .table tr{
            margin-bottom:20px;
        }
        .table td{
            text-align: right;
            padding-left: 50%;
            text-align: right;
            position: relative;
        }
        .table td::before{
            content: attr(data-label);
            position: absolute;
            left:0;
            width: 50%;
            padding-left:15px;
            font-size:15px;
            font-weight: bold;
            text-align: left;
        }
    }
    
        
    
    
    
    </style>

<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-3 bg-light "> 
                <div class="card-header bg-primary" style="opacity: 0.5;">
                    <div class="text-center">
                        <h3>La liste des Fournisseurs</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                {{-- <th>ID</th> --}}
                                <th>Nom & Prénom</th>
                                <th>Email</th>
                                <th>Role</th>
                                <th>Adress</th>
                                <th>Téléphonne</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($fournisseur as $item)
                                <tr class="text-center">
                                    {{-- <td>{{ $loop->iteration }}</td> --}}
                                    <td data-label="Nom & Prénom">{{ $item->name }}</td>
                                    <td data-label="Email">{{ $item->email}}</td>
                                    <td data-label="Role">Fournisseur</td>
                                    <td data-label="Adress">{{ $item->adress }}</td>
                                    <td data-label="Téléphonne">{{ $item->telephone }}</td>
                                    <td class="d-flex justify-content-center align-items-center">
                                        <a href="{{route('fournisseures.show',$item->id)}}" class="btn btn-sm btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('fournisseures.edit',$item->id)}}" class="btn btn-sm btn-warning mx-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="{{$item->id}}"  action="{{route('fournisseures.destroy',$item->id)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <button type="submit" onclick="deleteForm({{$item->id}})" class="btn btn-sm btn-danger">
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