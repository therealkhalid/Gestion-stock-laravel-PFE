

@extends('HomePrincipal')
@section('plugins.Datatables',true)
@section('title')
    Listes des Catalogues | Laravel GSM-APP
@endsection

@section('khalid')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-3 bg-light "> 
                <div class="card-header bg-primary" style="opacity: 0.5;">
                    <div class="text-center">
                        <h3>Liste des Catalogues</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                {{-- <th>ID</th> --}}
                                <th>Nom & Prénom</th>
                                <th>Adress</th>
                                <th>Téléphonne</th>
                                <th>Titre</th>
                                <th>Description</th>
                                <th>Image</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                                <tr class="text-center">
                                    {{-- <td>{{$loop->iteration}}</td> --}}
                                    <td data-label="Nom & Prénom">{{$item->name}}</td>
                                    <td data-label="Adress">{{$item->adress}}</td>
                                    <td data-label="Téléphonne">{{$item->telephone}}</td>
                                    <td data-label="Titre">{{Str::limit($data[0]->title , 200) }}</td>
                                    <td data-label="Description">{{Str::limit($data[0]->description , 20) }}</td>
                                    <td data-label="Image"><img src="{{asset('./uploads/'.$item->image)}}" class="img img-fluid" width="100" alt=""></td>
                                    <td data-label="Actions" class="d-flex justify-content-center align-items-center">
                                        <a href="{{route('catalog.show',$item->id_catalogue)}}" class="btn btn-xxl p-3 btn-primary">
                                            <i class="fas fa-eye"></i>
                                        </a>
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
    "sEmptyTable":    " ",
    "sInfo":          "Affichage de _START_ à _END_ sur _TOTAL_ entrées ",
    "sSearch":        "Chercher:",
    "oPaginate": {
        
        "sNext":    "Suivant",
        "sPrevious": "Précedent"
    },
   
}
    })
})
</script>
@endsection
