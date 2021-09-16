<?php
ob_start();
?>
<style>
body {
    background: white;
}
</style>
<a class="return-button" type="button" href="userBoardView.php">&lt;&lt; Retour</a>

<div id="container-account">
    <p id="account-title">Mon compte</p>
    <hr>
    <table id="account-table">
        <tr><td style="text-align: right">Pseudo :</td><td style="text-align: left"><b><?=$_SESSION['pseudo']?></b></td></tr>
        <tr><td style="text-align: right">Numéro de compte :</td><td style="text-align: left"><b><?=$_SESSION['user_id']?></b></td></tr>
        <tr><td style="text-align: right">Date de création du compte :</td><td style="text-align: left"><b><?=$_SESSION['creation_date']?></b></td></tr>
        <tr><td style="text-align: right">Mots de passes stockés :</td><td style="text-align: left"><b><?= getNumberPsw() ?></b></td></tr>
    </table>

</div>


<?php
    $content = ob_get_clean();
    $title = 'Mon compte';
    require('base.php');
?>