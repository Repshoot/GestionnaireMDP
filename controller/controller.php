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
        $InfosManager = new InfosManager();
        $requetePsw = $InfosManager->getPasswords();
        require('view/viewPasswords.php');
    }

    function managePasswords() {
        $InfosManager = new InfosManager();
        $requetePsw = $InfosManager->getPasswords();
        require('view/managePasswordsView.php');
    }

    function getNumberPsw() {
        $InfosManager = new InfosManager();
        $requeteNbPsw = $InfosManager->getNumberPsw();
        return $requeteNbPsw;
    }

    function modifyPsw($idModify, $newPsw) {
        $InfosManager = new InfosManager();
        $InfosManager->modifyRow($idModify, $newPsw);
    }

    function deletePsw($idDelete) {
        $InfosManager = new InfosManager();
        $InfosManager->deleteRow($idDelete);
    }


    function deleteAccount() {
        $InfosManager = new InfosManager();
        $InfosManager->deleteRowsAccount();

        $userManager = new UserManager();
        $userManager->deleteUser();

        session_unset();
        session_destroy();

        header('location: http://localhost/GestionnaireMDP/index.php/?page=managepsw&pswmatcherror=1 ');
    }