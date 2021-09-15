<?php
require_once('Manager.php');

class UserManager extends Manager {

    public function getUsers(){
        $bdd = $this->connection();
        $requete = $bdd->query('SELECT * FROM users');
        return $requete;
    }

    public function createNewUserIfAvailable($pseudo, $password){
        $bdd = $this->connection();
        $req = $bdd->prepare('SELECT count(*) as numberPseudo FROM users WHERE pseudo = ?');
        $req->execute(array($pseudo));

        while ($pseudo_verification = $req->fetch()) {
            if($pseudo_verification['numberPseudo'] != 0) {
                header('location: location: http://localhost/GestionnaireMDP/index.php/?error=1&pseudo=1');
            }
           else {
            $secret_key = sha1($pseudo).time();
            $secret_key = sha1($secret_key).time();

            $password = "f3s".sha1($password."1f54e")."061";

            $req = $bdd->prepare('INSERT INTO users (pseudo, password, secret_key) VALUES (?,?,?)');
            $req -> execute(array($pseudo, $password, $secret_key));

            header('location: http://localhost/GestionnaireMDP/index.php/?success=1');
        }
    }
}

    public function connectUser ($pseudo, $password){

        $password = "f3s".sha1($password."1f54e")."061";
        $error = 1;

        $bdd = $this->connection();
        $requete = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
        $requete->execute(array($pseudo));

        while ($user = $requete->fetch()) {
            if ($password == $user['password']){
                $error=0;
                $_SESSION['connected'] = 1;
                $_SESSION['pseudo'] = $user['pseudo'];
                $_SESSION['user_id'] = $user['id'];
                $_SESSION['creation_date'] = $user['creation_date'];

                header('location: http://localhost/GestionnaireMDP/index.php');
            }
        }
        if ($error==1) {
            header('location: http://localhost/GestionnaireMDP/index.php/?error=1&connectionError=1');
        }
    }


    public function getPasswords(){

        $userId = strval($_SESSION['user_id']);

        $bdd = $this->connection();

        $requetePsw = $bdd->query('SELECT * FROM passwords_users WHERE id_user = '.$userId.';');
        
        return $requetePsw;
    }
}
    
