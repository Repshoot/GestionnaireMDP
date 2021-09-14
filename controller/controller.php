<?php
    require_once ('model/UserManager.php');
    require_once ('model/InfoManager.php');
    
    function home() {
        $userManager = new UserManager();
        $requete = $userManager->getUsers();
    }
    

    function postInfos($username, $password, $comment) {
        $InfoManager = new InfoManager();
        $result = $InfoManager->postInfos($username, $password, $comment);
        
        if($result === false){
            throw new Exception("Impossible d'ajouter votre avis pour le moment.");
        }
        else {
                header('location: index.php?page=avis');
                exit();
            }
    }

    function createNewUserIfAvailable ($pseudo, $password) {
        $userManager = new UserManager();

        $userManager->createNewUserIfAvailable($pseudo, $password);
    }

    function connectUser($pseudoConnection, $passwordConnection) {
        $userManager = new UserManager();
        $userManager->connectUser($pseudoConnection, $passwordConnection);
    }
   
