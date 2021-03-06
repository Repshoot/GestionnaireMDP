<?php
ob_start();
?>
<style>
#page-container {
    background: linear-gradient(silver, rgb(160, 72, 108));
}
</style>
<a class="return-button" type="button" href="userBoardView.php">&lt;&lt; Retour</a>
<?php
    if(getNumberPsw() == 0){
        ?>
        <p class="no-psw-message">Vous n'avez pas de mots de passes en stock.</p>
        <?php
    }
    else {?>

<div id="modal-background-delete">
</div>

<div id="modal-delete">
      <p id="close-modal-delete" onclick="document.querySelector('#modal-delete').style.display = 'none'">&times;</p>
      <p id="modal-delete-title">Etes vous sûr de vouloir supprimer cette ligne&nbsp;?</p>
      <p id="modal-delete-para">Cette action est irréversible.</p>

    <form action="GET" action="http://localhost/GestionnaireMDP/index.php">
        <input id="id-input-delete" type="hidden" name="idDelete">
        <div id="delete-modal-buttons">
            <button type="submit" class="delete-button" id="delete-button-oui" >Oui</button>
            </form>
            <a class="delete-button" id="delete-button-non" onclick="document.querySelector('#modal-delete').style.display = 'none'">Non</a> 
        </div>
</div>

<div id="modal-modify">
      <p id="close-modal-modify" onclick="document.querySelector('#modal-modify').style.display = 'none'">&times;</p>
      <p id="modal-modify-title">Modifier le mot de passe</p>

    <form action="GET" action="http://localhost/GestionnaireMDP/index.php">
        <input id="id-input-modify" type="hidden" name="idModify">
        <table id="table-modify">
            <tr><td>Nouveau mot de passe :</td><td><input type="password" name="newPsw1"></td></tr>
            <tr><td>Confirmer :</td><td><input type="password" name="newPsw2"></td></tr>
        </table>
        <div id="modify-modal-buttons">
            <button type="submit" class="modify-button" id="modify-button-oui" >OK</button>
            </form>
            <a class="modify-button" id="modify-button-non" onclick="document.querySelector('#modal-modify').style.display = 'none'">Annuler</a> 
        </div>
</div>




        <?php
        if (isset($_GET['deletesuccess'])){
            ?>
            <div class="alert-psw-manage success" id="alert-psw-manage-success">Informations supprimées.</div>
            <?php
        }   
        else if (isset($_GET['pswmatcherror'])){ ?>
            <div class="alert-psw-manage error" id="alert-psw-manage-error">Erreur : les nouveaux mots de passe ne sont pas identiques.</div>
            <?php
        }
        else if (isset($_GET['modifysuccess'])) { ?>
        
        <div class="alert-psw-manage success" id="alert-psw-manage-success">Le mot de passe a été modifié.</div>
        <?php
        }
        ?>


<div class="container">
        <table id="table-manage-psw">
            <tr><th>Site</th><th>Identifiant</th><th>Mot de passe</th></tr>
                <?php
                while ($ligneInfos = $requetePsw->fetch()) {
                ?> <tr>
                    <td> <?= $ligneInfos['website'] ?></td> <td><?= $ligneInfos['username']?></td> <td><?=$ligneInfos['password']?></td>
                <td style="text-align: center;">
                    <a class="manage-button" id="manage-modify" onclick="showModifyModal('<?=$ligneInfos['id'] ?>')">Modifier</a>
                </td><td style="text-align: center;">
                    <a class="manage-button" id="manage-delete" onclick="showDeleteModal('<?=$ligneInfos['id'] ?>')">Supprimer</a>
                </td></tr>
                
                <?php
            }
            ?>
        </table>
</div>
<?php }
?>

<?php
    $content = ob_get_clean();
    $title = 'Gérer les mots de passe';
    require('base.php');
?>