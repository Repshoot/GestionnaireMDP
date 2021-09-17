<?php
ob_start();
?>

<?php
if(!empty($_POST['pseudo']) && !empty($_POST['password1']) && !empty($_POST['password2'])){
    $pseudo = $_POST['pseudo'];
    $password1 = $_POST['password1'];
    $password2 = $_POST['password2'];

    if($password1 != $password2) {
    header('location: index.php/?error=1&pass=1');
    }
    else {
        createNewUserIfAvailable($pseudo, $password1);
    }
}

if (isset($_POST['pseudo-connection']) && isset($_POST['password-connection'])){
        $pseudoConnection = $_POST['pseudo-connection'];
        $passwordConnection = $_POST['password-connection'];

        connectUser($pseudoConnection, $passwordConnection);
    }
?>

<div class="container">
    <div class="subscription-form">

    <?php
    if(isset($_GET['error'])) {

        if(isset($_GET['pass'])) {
            echo '<p class="alert" id="error">Vos mots de passe ne sont pas identiques</p>';
        }

        if(isset($_GET['pseudo'])) {
            echo '<p class="alert" id="error">Ce pseudo existe déjà.</p>';
        }

        if(isset($_GET['connectionError'])) {
            echo '<p class="alert" id="error">La connexion à échoué.</p>';
        }
    }
    else if (isset($_GET['success'])){
            echo '<p class="alert" id="success">Votre compte a été créé. Vous pouvez maintenant vous connecter.</p>';
    }
?>
<style>
    #page-container {
    background: linear-gradient(white , silver);
}
</style>

        <h1 id="connection-title">Créez votre compte gratuitement</h1>
        <form method="post" action="index.php">
            <table class="table-form">
                <tr><td><label>pseudo</label></td><td><input type="text" name="pseudo" required></td></tr>
                <tr><td><label>Mot de passe</label></td><td><input type="password" name="password1" required></td></tr>
                <tr><td><label>Confirmer le mdp</label></td><td><input type="password" name="password2" required></td></tr>
                <tr><td></td><td><button id="sub-button" type="submit" name="sub">Créer votre compte</button></td></tr>
            </table>
        </form>
    </div>
</div>

<?php
    $content = ob_get_clean();
    $title = 'Accueil';
    require('base.php');
?>