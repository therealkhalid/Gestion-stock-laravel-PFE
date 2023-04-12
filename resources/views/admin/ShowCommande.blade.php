
@extends('HomePrincipal')
@section('plugins.Datatables',true)


@section('khalid')
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card my-3 bg-light "> 
                <div class="card-header bg-primary" style="opacity: 0.5;">
                    <div class="text-center">
                        <h3>La liste des Commandes</h3>
                    </div>
                </div>
                <div class="card-body" style="overflow-x:auto;">
                    <table id="mytable" class="table table-bordered table-striped">
                        <thead>
                            <tr class="text-center">
                                <th>Id Commande</th>
                                <th>Nom & Prénom</th>
                                <th>Adress</th>
                                <th>Téléphonne</th>
                                <th>Quantité En (KG)</th>
                                <th>Prix En (DH)</th>
                                <th>Date du Commande</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($commandes as $commande )
                                
                            <tr class="text-center">
                                <td data-label="Id Commande">{{$commande->id_commande}}</td>
                                <td data-label="Nom & Prénom">{{$commande->name}}</td>
                                <td data-label="Adress">{{$commande->adress}}</td>
                                <td data-label="Téléphonne">{{$commande->telephone}}</td>
                                <td data-label="Quantité En (KG)">{{$commande->quantite}}</td>
                                <td data-label="Prix En (DH)">{{$commande->prix_commande}}</td>
                                <td data-label="Date du Commande">{{$commande->date_commande}}</td>
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
