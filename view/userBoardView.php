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

<?php
    $content = ob_get_clean();
    $title = 'Tableau de bord';
    require('base.php');
?>