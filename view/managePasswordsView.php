<?php
ob_start();
?>
<style>
body {
    background: linear-gradient(silver, rgb(160, 72, 108));
}
</style>
<a class="return-button" type="button" href="userBoardView.php">&lt;&lt; Retour</a>

<div class="container">
<table id="table-manage-psw">
    <tr><th>Site</th><th>Identifiant</th><th>Mot de passe</th></tr>
        <?php
        while ($ligneInfos = $requetePsw->fetch()) {
            echo '<tr>
                <td>'. $ligneInfos['website'].'</td> <td>'. $ligneInfos['username'].'</td> <td>'.$ligneInfos['password'].'</td>
            </tr>';
         
        }
        ?>
    </table>
</div>


<?php
    $content = ob_get_clean();
    $title = 'Voir les mots de passe';
    require('base.php');
?>