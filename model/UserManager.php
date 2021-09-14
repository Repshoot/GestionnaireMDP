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

          
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
            /*Récupérer l'id du nouvel utilisateur */
            $requete = $bdd->prepare('SELECT * FROM users WHERE pseudo = ?');
            $requete->execute(array($pseudo));

            while ($user = $requete->fetch()) {
                $userNewId = strval($user['id']);
            }


/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
/*-----------------------------------------------------------------------*/
            /*Créer la table de stockage de mots de passe */

            $pswTableName = 'passwords_user_'.$userNewId;

            $bdd = $this->connection();
            $bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

            $sql = 'CREATE TABLE IF NOT EXISTS '.$pswTableName.'(id int(11) AUTO_INCREMENT PRIMARY KEY,
            id_user int(11) NOT NULL,
            website text NOT NULL,
            username text NOT NULL,
            password text NOT NULL)';
                try {
                    $bdd->exec($sql);
                }
                catch(PDOException $e) {
                    echo $sql . $e->getMessage();
                }

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

                header('location: http://localhost/GestionnaireMDP/index.php');
            }
        }
        if ($error==1) {
            header('location: http://localhost/GestionnaireMDP/index.php/?error=1&connectionError=1');
        }
    }

}
    
