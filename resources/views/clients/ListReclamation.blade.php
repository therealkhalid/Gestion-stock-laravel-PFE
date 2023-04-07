
@extends('HomePrincipal')
@section('plugins.Datatables',true)

@section('title')
Liste des Réclamations | GSM-APP
@endsection
@section('khalid')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-3 bg-light "> 
                <div class="card-header bg-primary" style="opacity: 0.5;">
                    <div class="text-center">
                        <h3>La liste des Réclamations</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ID Reclamation</th>
                                <th>Message</th>
                                <th>Date de Réclamation</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dta)
                                <tr class="text-center">
                                    <td data-label="ID Reclamation">{{$dta->id_reclamation}}</td>
                                    <td data-label="Message">{{Str::limit($dta->message,10)}}</td>
                                    <td data-label="Date de Réclamation">{{$dta->date_reclamation}}</td>
                                    <td data-label="Actions" class="d-flex justify-content-center align-items-center ">
                                        <a href="{{route('reclamation.show', $dta->id_reclamation)}}" class="btn btn-sm btn-primary mx-2">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <a href="{{route('reclamation.edit',$dta->id_reclamation)}}" class="btn btn-sm btn-warning mx-2">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <form id="{{$dta->id_reclamation}}"  action="{{route('reclamation.destroy',$dta->id_reclamation)}}" method="POST">
                                            @method('DELETE')
                                            @csrf
                                        </form>
                                        <button type="submit" onclick="deleteForm({{$dta->id_reclamation}})" class="btn btn-sm btn-danger">
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
