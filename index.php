<?php ob_start();

    session_start();

    include "Vues/header.php";
    include "Modèles/nationalite.php";
    include "Modèles/connexionPDO.php";
    include "messagesFlash.php";

    $uc=empty($_GET['uc']) ? "accueil" : $_GET['uc'];

    switch($uc)
    {
        case 'accueil' :
            include ('Vues/accueil.php');
        break;

        case 'nationalites' :
            include('Contrôleurs/nationaliteContrôleur.php');
        break;

        case 'continents' :
            include('Contrôleurs/continentContrôleur.php');
        break;
    }

    include "Vues/footer.php";

?>