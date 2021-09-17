<?php
ob_start();
?>

<?php
if(!empty($_POST['addWebsite']) && !empty($_POST['addUsername']) && !empty($_POST['addPassword'])){
    $website = $_POST['addWebsite'];
    $username = $_POST['addUsername'];
    $password = $_POST['addPassword'];

    addInfos($website, $username, $password);
}
?>

<style>
    #page-container {
        background: linear-gradient(silver, #83b981);
    }
</style>

<a class="return-button" type="button" href="userBoardView.php">&lt;&lt; Retour</a>
<div class="container">
    <div class="subscription-form" id="addPswForm">
        <h1 id="add-psw-title">Ajouter des mots de passe</h1>
        <hr>
        <?php
            if(isset($_GET['success'])){
                ?>
                <div id="add-success-container">
                    <img id="checkbox-image" src="http://localhost/GestionnaireMDP/public/assets/checkbox.jpg" alt="checkbox">
                    <p class="alert-psw-manage success" id="add-success">Informations enregistrées avec succès</p>
                </div>
                <?php
            }
        ?>
        <form method="post" action="http://localhost/GestionnaireMDP/index.php/?page=addpsw">
            <table class="table-form">
                <tr><td><label>Site</label></td><td><input type="text" name="addWebsite" required></td></tr>
                <tr><td><label>Nom d'utilisateur</label></td><td><input type="text" name="addUsername" required></td></tr>
                <tr><td><label>Mot de passe</label></td><td><input type="text" name="addPassword" required></td></tr>
                <tr><td></td><td><button id="add-button" type="submit" name="sub">Ajouter</button></td></tr>
            </table>
        </form>
    </div>
</div>


<?php
    $content = ob_get_clean();
    $title = 'Ajouter mots de passe';
    require('base.php');
?>