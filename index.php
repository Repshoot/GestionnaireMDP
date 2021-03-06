<?php
session_start();
    require('controller/controller.php');

    if (isset ($_GET['disconnect'])){
        session_unset();
        session_destroy();
    }

    if (isset ($_SESSION['connected'])){

        if (isset ($_GET["idDelete"])){
                $idDelete = $_GET['idDelete'];
                deletePsw($idDelete);
        }
        else if (isset ($_GET["deleteaccount"])){
            deleteAccount();
            
        }
        else if (isset ($_GET["newPsw1"]) && isset ($_GET["newPsw2"])){

            if($_GET["newPsw1"] != $_GET["newPsw2"]){
                header('location: http://localhost/GestionnaireMDP/index.php/?page=managepsw&pswmatcherror=1 ');
            }
            else {
                $idModify = htmlspecialchars($_GET["idModify"]);
                $newPsw = htmlspecialchars($_GET["newPsw1"]);
                modifyPsw($idModify, $newPsw);
            }
        }

        if (isset ($_GET['page'])){

            if ($_GET['page'] == 'addpsw'){
                
                require('view/addPasswordsView.php');
            }
             else if ($_GET['page'] == 'viewpsw'){
                getPasswords();
             }
             else if ($_GET['page'] == 'managepsw'){
                managePasswords();
             }
             
             else if ($_GET['page'] == 'myaccount'){
                require('view/myAccountView.php');
             }
             else if ($_GET['page'] == 'errorView'){
                require('view/errorView.php');
             }
             
            else {
                require('view/errorView.php');
            }
        }
        else {

            require('view/userBoardView.php');
        }
    }
    else {
        try {
            require('view/connectionPageView.php');
    
        } catch(Exception $e) {
            //die('Erreur : '.$e->getMessage());
            // ON UTILISE PAS DIE
            // MAIS ON CREE UNE VARIABLE ERROR ET
            // UNE VUE C'EST PLUS PROPRE
            $error = $e->getMessage();
            require('view/errorView.php');
        }
    }




