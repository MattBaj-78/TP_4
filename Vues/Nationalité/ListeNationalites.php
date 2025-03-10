<div class="container mt-5">
    <div class="row pt-3">
        <div class="col-9"> <h2>Liste des Nationalités</h2> </div>
        <div class="col-3"> <a href="index.php?uc=nationalites&action=add" class="btn btn-success">Créer une nationalité</a> </div> 
    </div>

    <table class="table table-striped">
        <thead>
            <tr>
                <th scope="col">Numéro</th>
                <th scope="col">Libellé</th>
                <th scope="col">Actions</th>
            </tr>
        </thead>

        <tbody>
        <?php 
            foreach($lesnationalites as $nationalite)
            {
                echo "<tr>";
                    echo "<td>$nationalite->num</td>";
                    echo "<td>$nationalite->libelle</td>";
                    echo "<td>1</td>";
                echo "</tr>";
            }
        ?>
        </tbody>
    </table>
</div>

<?php include "Vues/footer.php";

?>