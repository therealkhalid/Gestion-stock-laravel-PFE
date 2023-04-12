@extends('HomePrincipal')
@section('plugins.Datatables',true)


@section('khalid')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-3 bg-light "> 
                <div class="card-header bg-primary" style="opacity: 0.5;">
                    <div class="text-center">
                        <h3>L'Historique du Livraison</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>ID Commande</th>
                                <th>Adress du Laivraison</th>
                                <th>Date de Livraison</th>
                                <th>Etat</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($data as $item)
                                <tr class="text-center">
                                    <td data-label="ID Commande">{{ $item->id_commande }}</td>
                                    <td data-label="Adress du Laivraison">{{ $item->adress}}</td>
                                    <td data-label="Date de Livraison">{{ $item->date_livraison }}</td>
                                    <td data-label="Etat" class="bg-success">Livrer</td>
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
