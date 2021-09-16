<?php
require_once('Manager.php');

class InfosManager extends Manager{

    public function getInfos(){
       
        $bdd = $this-> connection();
        $requete = $bdd->query('SELECT * FROM testimonials');

        return $requete;
    }

    public function addInfos($website, $username, $password) {
        $bdd = $this-> connection();
        $requete = $bdd->prepare('INSERT INTO passwords_users (id_user, website, username, password) VALUES (?, ?, ?, ?)');
        $result = $requete->execute([$_SESSION['user_id'],$website, $username, $password]);

        return $result;
    }

    public function modifyRow($idModify, $newPsw){
        $bdd = $this->connection();

        $requete = $bdd->prepare('UPDATE passwords_users SET password = ? WHERE id=?');
        $requete->execute(array($idModify, $newPsw));
        
        header('location: http://localhost/GestionnaireMDP/index.php/?page=managepsw&modifysuccess=1');
    }
}