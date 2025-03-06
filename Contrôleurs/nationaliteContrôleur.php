<?php

    $action=$_GET['action'];
    
    switch($action)
    {
        case 'list' :
            $lesnationalites=nationalite::findAll();
            include('Vues/Listenationalites.php');
        break;

        case 'add' :
            $mode="Ajouter";
            include('Vues/formnationalite.php');
        break;

        case 'update' :
            $mode="Modifier";
            $nationalite=nationalite::findById($_GET['num']);
            include('Vues/formnationalite.php');
        break;

        case 'delete' :
            $nationalite=nationalite::findById($_GET['num']);
            $nb=nationalite::delete($nationalite);

            if($nb==1)
            {
                $_SESSION['message']=["success"=>"Le nationalite a bien été supprimé"];
            }

            else
            {
                $_SESSION['message']=["danger"=>"Le nationalite n'a pas été supprimé"];
            }

            header('location: index.php?uc=nationalites&action=list');
            exit();
        break;

        case 'valideForm' :
            $nationalite=new nationalite();

            if(empty($_POST['num']))    // Cas d'une création
            {
                $nationalite->setLibelle($_POST['libelle']);
                $nb=nationalite::add($nationalite);
                $message="ajouté";
            }

            else    // Cas d'une modif'
            {
                $nationalite->setNum($_POST['num']);
                $nationalite->setLibelle($_POST['libelle']);
                $nb=nationalite::update($nationalite);
                $message="modifié";
            }

            if($nb==1)
            {
                $_SESSION['message']=["success"=>"Le nationalite a bien été $message"];
            }

            else
            {
                $_SESSION['message']=["danger"=>"Le nationalite a bien été $message"];
            }
            header('location: index.php?uc=nationalites&action=list');

        break;
    }

?>