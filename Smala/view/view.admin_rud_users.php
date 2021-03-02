<h1>Utilisateurs de la SMALA</h1>
<div class="contenu">
    <table>
        
        <tr>
            <td>Pseudo</td>
            <td>Email</td>
            <td>Mot de passe</td>
            <td colspan="2">Gestion</td>
        </tr>
        
        <tr>
        <?php
        foreach ($_SESSION["all_users"] as $value => $key) {
            
            echo '<tr><form action="?admin_rud_users" method="post">'
            . '<td><input type ="text" name="pseudo_user" value="' . $key['pseudo_user'] . '"></td>'
            . '<td><input type ="text" name="mail_user" value="' . $key['mail_user'] . '"></td>'
            . '<td><input type ="text" name="password_user" value="' . $key['password_user'] . '"></td>'
            . '<td><input type="submit" name="update_user" value="Modifier"></td>'
            . '<td><input type="submit" name="delete_user" value="Supprimer"></td>'
            . '<td><input type ="hidden" name="id_user"  value="' . $key['id_user'] . '"></td>'
                . '</form>';
            echo "</tr>";
        }
        ?>
        </tr>
    </table>
</div>

<form action="?backoffice_admin" method="post">
    <input type="submit" value="Créer un utilisateur">
</form>
