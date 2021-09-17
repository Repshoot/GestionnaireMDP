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

    public function getPasswords(){
        $userId = strval($_SESSION['user_id']);

        $bdd = $this->connection();
        $requetePsw = $bdd->query('SELECT * FROM passwords_users WHERE id_user = '.$userId.';');
        
        return $requetePsw;
    }

    public function getNumberPsw(){
        $userId = strval($_SESSION['user_id']);
        $bdd = $this->connection();

        $requetePsw = $bdd->query('SELECT count(*) as totalPsw FROM passwords_users WHERE id_user = '.$userId.';')->fetchColumn(); ;

            return $requetePsw;
        }

        public function deleteRow($idDelete){
            $bdd = $this->connection();
            try{
                $requete = $bdd->prepare('DELETE FROM passwords_users WHERE id = ?');
                $requete->execute(array($idDelete));
            }catch(PDOException $e) {

                echo $e->getMessage();
                require('http://localhost/GestionnaireMDP/index.php/?page=errorView');
            }

            header('location: http://localhost/GestionnaireMDP/index.php/?page=managepsw&deletesuccess=1');
            }

    public function modifyRow($idModify, $newPsw){
        $bdd = $this->connection();
        $requete = 'UPDATE `passwords_users` SET `password` = \''.$newPsw.'\' WHERE `id` = '.$idModify;
        $bdd->exec($requete);

        header('location: http://localhost/GestionnaireMDP/index.php/?page=managepsw&modifysuccess=1');
    }


    public function deleteRowsAccount(){
        $bdd = $this->connection();
        $requete = 'DELETE FROM `passwords_users` WHERE `id_user` = '.$_SESSION['user_id'];
        $bdd->exec($requete);
    }

    
    
}