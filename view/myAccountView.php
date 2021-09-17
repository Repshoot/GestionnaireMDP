<?php
ob_start();
?>
<style>
#page-container {
    background: linear-gradient(silver, rgb(128, 128, 128));
}
</style>
<a class="return-button" type="button" href="userBoardView.php">&lt;&lt; Retour</a>

<div id="modal-delete-account">
      <p id="close-modal-delete-account" onclick="document.querySelector('#modal-delete-account').style.display = 'none'">&times;</p>
      <p id="modal-delete-account-title">Etes-vous sûr ?</p>
      <p id="modal-delete-account-para">Toutes vos données seront supprimées</p>

        <div id="delete-account-modal-buttons">
            <a href="http://localhost/GestionnaireMDP/index.php/?deleteaccount=1" class="delete-account-button" id="delete-account-button-oui" >Oui</a>
            <a class="delete-account-button" id="delete-account-button-non" onclick="document.querySelector('#modal-delete-account').style.display = 'none'">Non</a> 
        </div>
</div>


<div id="container-account">
    <p id="account-title">Mon compte</p>
    <hr>
    <table id="account-table">
        <tr><td style="text-align: right">Pseudo :</td><td style="text-align: left"><b><?=$_SESSION['pseudo']?></b></td></tr>
        <tr><td style="text-align: right">Numéro de compte :</td><td style="text-align: left"><b><?=$_SESSION['user_id']?></b></td></tr>
        <tr><td style="text-align: right">Date de création du compte :</td><td style="text-align: left"><b><?=$_SESSION['creation_date']?></b></td></tr>
        <tr><td style="text-align: right">Mots de passes stockés :</td><td style="text-align: left"><b><?= getNumberPsw() ?></b></td></tr>
        <tr><td></td><td><a id="delete-account-button" onclick="showDeleteAccountModal()">Supprimer le compte</a></td></tr>
    </table>

</div>

<?php
    $content = ob_get_clean();
    $title = 'Mon compte';
    require('base.php');
?>