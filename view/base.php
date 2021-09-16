<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title><?= $title ?></title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Orbitron:wght@100;300;400&family=Roboto:wght@100;300;400&display=swap" rel="stylesheet"> 
    <link rel="stylesheet" href="http://localhost/GestionnaireMDP/public/design/default.css" />    
</head>
    <body>

<div id="modal-background">
</div>

<div id="modal-connection">
    <div id="modal-connection-content">
      <p id="close-modal">&times;</p>
      <p id="connection-title">Connexion</p>
      <hr>
        <form class="table-form" method="post" action="index.php">
                <input type="text" name="pseudo-connection" placeholder="Pseudo" required></input><br>
                <input type="password" name="password-connection" placeholder="Mot de passe" required></input><br>
                <button id="cancel-sub-button">Annuler</button>
                <button id="sub-button" type="submit" name="sub">Se connecter</button></td></tr>
         
        </form>
    </div>
</div>

    <header>
        <div class="container">

            <div class="element" >
                <div id="image-header">
                    <img src="http://localhost/GestionnaireMDP/public/assets/cybersecurity.jpg"/>
                </div>
            </div>

            <div class="element">
                <div id="titles-container">
                    <span id="title">Gestionnaire de mots de passe</span> <br>
                    <span id="subtitle">Stockez vos mots de passe en ligne.</span>
                </div>
            </div>
            
            <?php
            if (!isset($_SESSION['connected'])) {
                echo '
                <div class="element">
                <a id="connection-button" onclick="document.getElementById(\'modal-connection\').style.display=\'block\'; document.getElementById(\'modal-background\').style.display=\'block\';">
                Connexion</a>';
            }
            else {
                ?> <div class="element">
                        <p id="header-account"><?php echo 'Bienvenue <span id="header-name">'.$_SESSION['pseudo'].'</span>'?> </p>
                        
                        <a class="header-button" id="account-info-button" href="http://localhost/GestionnaireMDP/index.php/?page=myaccount">Mon compte</a>
                        <a class="header-button" id="disconnect-button" href="http://localhost/GestionnaireMDP/index.php/?disconnect=1">Déconnexion</a>
                    </div>
                <?php
            }

            ?>
            </div>
        </div>
    </header>


            <?= $content ?>
        
            <footer>
                <p id="footer-credits">Site portfolio créé par Guillaume Repka. <a id="footer-send-email" href="mailto:sk_8_397@hotmail.com">Envoyer un email</a></p>
            </footer>
            <script src="http://localhost/GestionnaireMDP/public/JS/default.js"></script>
    </body>
</html>