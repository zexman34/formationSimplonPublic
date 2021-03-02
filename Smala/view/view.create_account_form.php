<h1>Création d'un utilisateur</h1>

<div class="contenu">
    <form action="?add_user" method="post">

        <label for="pseudo">Pseudo : </label>
        <br>
        <input type="text" name="pseudo_user" required placeholder="K.prdlls">
        <br>
        <label for="mail">Adresse mail : </label>
        <br>
        <input type="text" name="mail_user" required placeholder="kevin.prdlls@gmail.com">
        <br>
        <label for="password">Mot de passe : </label>
        <br>
        <input type="text" name="password_user" required placeholder="mot de passe">
        <br>
        <label for="password">Role de l'utilisateur </label>
        <br>
        <select name="role_user" > 
        <option value="1" >Admin</option>
        <option value="0" >Utilisateur</option>
        </select>
        <br>
        <input type="submit" name="create_account" required  value="Créer un nouveau compte">
    </form>
</div>