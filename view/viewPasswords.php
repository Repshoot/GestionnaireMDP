<?php
ob_start();
?>
<style>
body {
    background: linear-gradient(silver, rgb(66, 89, 144));
}
</style>
<a class="return-button" type="button" href="userBoardView.php">&lt;&lt; Retour</a>

<div class="container">
<table id="table-view-psw">
    <tr><th>Site</th><th>Identifiant</th><th>Mot de passe</th></tr>
        <?php
        while ($ligneInfos = $requetePsw->fetch()) {
            ?><tr>
                <td><?= $ligneInfos['website'] ?> </td> <td> <?= $ligneInfos['username'] ?></td> <td> <span id="<?='psw'. $ligneInfos['id']?>"><?= $ligneInfos['password'] ?></span></td><td>
                    <div class="tooltip">    
                        <a class="copy-psw" onclick="copyClipboard('<?= 'psw'. $ligneInfos['id'] ?>')" onmouseout="outFunc('<?= 'psw'. $ligneInfos['id'] ?>')">
                                <img class="img-clipboard" src="../public/assets/clipboard.png">
                                <span>Copier le mdp</span>
                                <span class="tooltiptext" id="myTooltip<?='psw'. $ligneInfos['id']?>"></span>
                            </a>
                    </div>
                </td>
            </tr>
            <?php
        }
        ?>
    </table>
</div>

<script>

function copyClipboard(pswToCopy) {

    var id = "#" + pswToCopy;
    var copyText = document.querySelector(id);

    var textArea = document.createElement("textarea");
    textArea.value = copyText.textContent;
    document.body.appendChild(textArea);
    textArea.select();
    textArea.setSelectionRange(0, 99999); /* For mobile devices */
    document.execCommand("Copy");
    textArea.remove();

    var toolTipId =  "myTooltip"+pswToCopy;
    var tooltip = document.getElementById(toolTipId);
    tooltip.innerHTML = "Mot de passe copié !";
}

function outFunc(pswToCopy) {
    var toolTipId =  "myTooltip"+pswToCopy;
    var tooltip = document.getElementById(toolTipId);
    tooltip.innerHTML = "Copier dans le presse papier";
}

</script>

<?php
    $content = ob_get_clean();
    $title = 'Voir les mots de passe';
    require('base.php');
?>