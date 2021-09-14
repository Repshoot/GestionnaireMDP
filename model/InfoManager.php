<?php
require_once('Manager.php');

class InfoManager extends Manager{

    public function getInfos(){
       
        $bdd = $this-> connection();
        $requete = $bdd->query('SELECT * FROM testimonials');

        return $requete;
    }

    public function postInfos($note, $message) {
        $bdd = $this-> connection();
        $requete = $bdd->prepare('INSERT INTO testimonials (note, content) VALUES (?, ?)');
        $result = $requete->execute([$note, $message]);

        return $result;
    }

}
