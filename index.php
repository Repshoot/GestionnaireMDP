

<?php
session_start();
    require('controller/controller.php');

    if (isset ($_SESSION['connected'])){
        require('view/userBoardView.php');
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




