<div class="container mt-5">
    
    <div class="row pt-3">
        <div class="col-9"><h2>Liste des nationalites</h2></div>
        <div class="col-3"><a href="index.php?uc=nationalites&action=add" class='btn btn-success'><i class="fas fa-plus-circle"></i> Créer un nationalite</a> </div>
    </div>
</div>

<table class="table table-hover table-striped">
    <thead>
        <tr class="d-flex">
        <th scope="col" class="col-md-2">Numéro</th>
        <th scope="col" class="col-md-8">Libellé</th>
        <th scope="col" class="col-md-2">Actions</th>
        </tr>
    </thead>
    <tbody>
    <?php
    foreach($lesnationalites as $nationalite){
        echo "<tr class='d-flex'>";
        echo "<td class='col-md-2'>".$nationalite->getNum()."</td>";
        echo "<td class='col-md-8'>".$nationalite->getLibelle()."</td>";
        echo "<td class='col-md-2'>
            <a href='index.php?uc=nationalites&action=update&num=".$nationalite->getNum()."' class='btn btn-primary'><i class='fas fa-pen'></i></a>
            <a href='#modalSuppression' data-toggle='modal' data-message='Voulez vous supprimer ce nationalite ?' data-suppression='index.php?uc=nationalites&action=delete&num=".$nationalite->getNum()."' class='btn btn-danger'><i class='far fa-trash-alt'></i></a>
        </td>";
        echo "</tr>";
    }

    ?>
        
    </tbody>
    </table>
</div>