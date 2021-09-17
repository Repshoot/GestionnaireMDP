<?php
ob_start();
?>

<style>
    #page-container {
        background: linear-gradient(silver, #83b981);
    }
</style>
<a class="return-button" type="button" href="userBoardView.php">&lt;&lt; Retour</a>
<div id="error-container">
        <p id="error-title">Oups...</p>
        <p id="error-message">La page que vous recherchez n'existe pas.</p>
</div>

<?php
    $content = ob_get_clean();
    $title = 'Erreur';
    require('base.php');
?>