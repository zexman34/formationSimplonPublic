<h1>Mon profil</h1>

<h2>Connexion</h2>

<div class="contenu">
<form action="?backoffice_admin" method="post">
<?php

echo '<label for="pseudo_user">Pseudo : </label>'
    . '<br>'
    . '<input type="text" name="pseudo_user" value="' . $_SESSION['pseudo'] . '">'
    . '<br>'
    . '<label for="mail">Adresse mail : </label>'
    . '<br>'
    . '<input type="text" name="mail_user" value="' . $_SESSION['mail'] . '">'
    . '<br>'
    . '<label for="password">Mot de passe : </label>'
    . '<br>'
    . '<input type="text" name="password_user" value="' .  $_SESSION['password'] . '">'
    . '<br>'
    . '<input type="submit" name="update_profile" value="Modifier">';
?>
</form>
</div>

<form action="?backoffice_admin" method="post" id="retour">
    <input type="button" value="Retour">
</form>

<!-- Comment faire pour l'envoyer sur le backoffice si c'est un admin et sur l'espace perso si c'est un user -->
<!-- <form>
  <input type="button" value="back" onclick="history.go(-1)">
</form> -->