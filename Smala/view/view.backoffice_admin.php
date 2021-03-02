<?php

$mail_user = $_SESSION['connected'];
$pseudo_user = $_SESSION['pseudo'];

echo '<h1>Bonjour ' . $mail_user . $pseudo_user . '</h1>';
?>
<h2>Manage </h2>


<form action="?add_photo" id="add_photo" method="post">
<input type="image" src="add.svg">
<label for="add_photo">Ajouter une photo</label>
</form>

<form action="?update_profile" method="post">
<input type="image" src="pen.svg" value="Modifier mes infos personnelles">
</form>

<form action="?create_user" method="post">
<input type="image" src="add-user.svg" value="Créer un utilisateur">
</form>

<form action="?admin_rud_users" method="post">
<input type="image" src="user.svg" value="Voir les utilisateurs">
</form>



<?php


foreach ($_POST['user_photo'] as $key => $value){
    //Il faut réaliser un JOIN pour récupérer le pseudo de la personne qui a édité la photo
    echo '<div class="contenu">'
        . '<img src="' . $value['url_photo'] . '" alt="' . $value['name_photo'] . '">'
        . '<p>' . $value['name_photo'] . '</p>'
        . '<p>publié par ' . $value['pseudo_user'] . '</p>'
        . '<p>' . $value['date_photo'] . '</p>'
        . '<form action="?rud_photo_users" method="post">'
        . '<input type="hidden" value="'. $value['id_photo'] .'">'
        . '<input type="button" value="Modifier">'
        . '</form>'
        . '<form action="?backoffice_admin" method="post">'
        . '<input type="hidden" value="'. $value['id_photo'] .'">'
        . '<input type="button" value="Supprimer">'
        . '</form>'
        . '</div>';
}
?>