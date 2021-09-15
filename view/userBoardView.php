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
?>
<div id="userboard-container">

        <div class="userboard-picture">
        <a href="http://localhost/GestionnaireMDP/index.php/?page=addpsw">
            <img src="http://localhost/GestionnaireMDP/public/assets/add.jpg">
            <span class="userboard-caption">Ajouter des mots de passe</span>
            </a>
        </div>
    
        <div class="userboard-picture">
        <a href="http://localhost/GestionnaireMDP/index.php/?page=viewpsw">
            <img src="http://localhost/GestionnaireMDP/public/assets/passlist.jpg">
            <p class="userboard-caption">Voir les mots de passe</p>
            </a>
        </div>
        
        <div class="userboard-picture">
        <a href="">
            <img src="http://localhost/GestionnaireMDP/public/assets/changepass.jpg">
            <p class="userboard-caption">Gérer les mots de passe</p>
            </a>
        </div>
        
   

</div> 


<?php
    $content = ob_get_clean();
    $title = 'Tableau de bord';
    require('base.php');
?>