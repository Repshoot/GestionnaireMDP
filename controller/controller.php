<?php
    require_once ('model/UserManager.php');
    require_once ('model/InfosManager.php');
    

    function createNewUserIfAvailable ($pseudo, $password) {
        $userManager = new UserManager();

        $userManager->createNewUserIfAvailable($pseudo, $password);
    }

    function connectUser($pseudoConnection, $passwordConnection) {
        $userManager = new UserManager();
        $userManager->connectUser($pseudoConnection, $passwordConnection);
    }
   

    function addInfos($website, $username, $password) {
        $InfosManager = new InfosManager();
        $result = $InfosManager->addInfos($website, $username, $password);
        
        if($result === false){
            header('location: index.php?page=addpsw&error=1');
        }
        else {
                header('location: index.php?page=addpsw&success=1');
                exit();
            }
    }

    function getPasswords() {
        $userManager = new UserManager();
        $requetePsw = $userManager->getPasswords();
        require('view/viewPasswords.php');
    }
