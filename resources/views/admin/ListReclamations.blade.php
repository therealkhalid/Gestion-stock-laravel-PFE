

@extends('HomePrincipal')
@section('plugins.Datatables',true)
@section('title')
    Show Reclamation| Laravel GSM-APP
@endsection

@section('khalid')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-3 bg-light "> 
                <div class="card-header bg-primary" style="opacity: 0.5;">
                    <div class="text-center">
                        <h3>Liste des Réclamations</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Nom & Prénom</th>
                                <th>Adress</th>
                                <th>Téléphonne</th>
                                <th>Message</th>
                                <th>Date de Réclamation</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $dta)
                                <tr class="text-center">
                                    <td data-label="Nom & Prénom">{{$dta->name}}</td>
                                    <td data-label="Adress">{{$dta->adress}}</td>
                                    <td data-label="Téléphonne">{{$dta->telephone}}</td>
                                    <td data-label="Message" >{{Str::limit($data[0]->message , 10) }}</td>
                                    <td data-label="Date de Réclamation">{{$dta->date_reclamation}}</td>
                                    <td data-label="Action" class="d-flex justify-content-center align-items-center">
                                        <a href="{{route('claim.show',$dta->id_reclamation)}}" class="btn btn-sm btn-primary">
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
</script>

@endsection
