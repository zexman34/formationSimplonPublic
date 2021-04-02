<link rel="stylesheet" href="style.css">
<?php
include "config.php"; //Lit le fichier config.php et récupere la variable $pdo pour me connecter à la BDD
if (isset($_POST['affichierArtiste'])) {
    //Récupere le nom de l'artiste
    $idArtist = $_POST['artistAsso_choisi'];
    $requete = "SELECT * FROM `artists` 
                WHERE `artist_id` = :artist_id;";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ":artist_id" => $idArtist
    ));
    $prepare->execute();
    $resultatArtist = $prepare->fetchAll();

    //Joint pour cherche les style associés a l'artiste
    $requete = "SELECT *
    FROM `asso_artist_style`
    JOIN artists ON `artists`.`artist_id` = `asso_artist_style`.`asso_artist_id`
    JOIN styles ON `styles`.`style_id` = `asso_artist_style`.`asso_style_id`    
    WHERE `artists`.`artist_id` = :artist_id ";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ':artist_id' => $idArtist, //La variable du projet dans lequel on est
    ));
    $resultatAsso = $prepare->fetchAll();
    echo ($resultatAsso[0]['artist_name']);
    echo (' Joue du ');
    foreach ($resultatAsso as $key => $value) {
        echo ($value['style_name'] . " - ");
    }
}
?>
<?php
///////////////////////AJOUTER STYLE A UN ARTISTE
if (isset($_POST['ajoutStyle'])) {
    $idArtist = $_POST['variableArtisteStyle'];
    $requete = "SELECT * FROM `artists` 
                WHERE `artist_id` = :artist_id;";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ":artist_id" => $idArtist
    ));
    $prepare->execute();
    $resultatArtist = $prepare->fetchAll();

    $requete = "SELECT * FROM `styles` ORDER BY `style_name`";
    $prepare = $pdo->prepare($requete);
    $prepare->execute();
    $resultatStyle = $prepare->fetchAll();

?>
    <!-- FORMULAIRE POUR FAIRE LASSOCIATION DE STYLE A LARTISTE -->
    <form action="artiste.php" method="post">
        <label>Nom de l'artiste/groupe</label>
        <select name="artistAsso_choisi" id="choix_artist_for" size=2>
            <?php
            foreach ($resultatArtist as $key => $value) {
                echo ('<option name="' . $value['artist_id'] . '" value="' . $value['artist_id'] . '">' . $value['artist_name'] . '</option>');
            } //end foreach pour afficher les ARTISTES   
            ?>
        </select>
        <label for="choix_style_for">Choisis un style</label>
        <select name="styleAsso_choisi" id="choix_style_for" size=7>
            <?php
            foreach ($resultatStyle as $key => $value) {
                echo ('<option name="' . $value['artist_id'] . '" value="' . $value['style_id'] . '">' . $value['style_name'] . '</option>');
            } //end foreach pour afficher les STYLES    
            ?>
        </select>
        <input type="submit" name="assoArtistStyle" value="Ajouter le style sélectionné">
    </form>
<?php
}//////////////FIN DE L'AJOUT DE STYLE A UN ARTISTE
//Requete pour ajouter un style à un artiste
if (isset($_POST['assoArtistStyle'])) {
    $idArtist = $_POST['artistAsso_choisi'];
    $idStyle = $_POST['styleAsso_choisi'];
    $requete = "INSERT INTO `asso_artist_style`(`asso_style_id`,`asso_artist_id`) 
                        VALUES (:asso_style_id, :asso_artist_id)";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ":asso_style_id" => $idStyle,
        ":asso_artist_id" => $idArtist
    ));
} //END IF AJOUT STYLE A UN ARTISTE


//////////////////SUPPRESSION STYLE D'UN ARTISTE
if (isset($_POST['supprimerStyle'])) {
    $idArtist = $_POST['variableArtisteStyle'];
    $requete = "SELECT * FROM `artists` 
                WHERE `artist_id` = :artist_id;";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ":artist_id" => $idArtist
    ));
    $prepare->execute();
    $resultatArtist = $prepare->fetchAll();

    //Joint pour cherche les style associés a l'artiste
    $requete = "SELECT *
    FROM `asso_artist_style`
    JOIN artists ON `artists`.`artist_id` = `asso_artist_style`.`asso_artist_id`
    JOIN styles ON `styles`.`style_id` = `asso_artist_style`.`asso_style_id`    
    WHERE `artists`.`artist_id` = :artist_id ";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ':artist_id' => $idArtist, //La variable du projet dans lequel on est
    ));
    $resultatAsso = $prepare->fetchAll();
?>
    <!-- FORMULAIRE POUR FAIRE LASSOCIATION DE STYLE A LARTISTE -->
    <form action="artiste.php" method="post">
        <label>Nom de l'artiste/groupe</label>
        <select name="artistAsso_choisi" id="choix_artist_for" size=2>
            <?php
            foreach ($resultatArtist as $key => $value) {
                echo ('<option name="' . $value['artist_id'] . '" value="' . $value['artist_id'] . '">' . $value['artist_name'] . '</option>');
            } //end foreach pour afficher les ARTISTES   
            ?>
        </select>
        <label for="choix_style_for">Choisis un style</label>
        <select name="styleAsso_choisi" id="choix_style_for" size=7>
            <?php
            foreach ($resultatAsso as $key => $value) {
                echo ('<option name="' . $value['artist_id'] . '" value="' . $value['style_id'] . '">' . $value['style_name'] . '</option>');
            } //end foreach pour afficher les STYLES    
            ?>
        </select>
        <input type="submit" name="assoSupprimerArtistStyle" value="Supprimer le style sélectionné">
    </form>
<?php
}//////////////FIN DE L'AJOUT DE STYLE A UN ARTISTE
//Requete pour ajouter un style à un artiste
if (isset($_POST['assoSupprimerArtistStyle'])) {
    $idArtist = $_POST['artistAsso_choisi'];
    $idStyle = $_POST['styleAsso_choisi'];


    $requete = "SELECT *
    FROM `asso_artist_style`
    JOIN artists ON `artists`.`artist_id` = `asso_artist_style`.`asso_artist_id`
    JOIN styles ON `styles`.`style_id` = `asso_artist_style`.`asso_style_id`    
    WHERE `styles`.`style_id` = :style_id ";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ':style_id' => $idStyle, //La variable du projet dans lequel on est
    ));
    $resultatAsso = $prepare->fetchAll();
    $assoId = $resultatAsso[0]['asso_id'];
    $requete = "DELETE FROM `asso_artist_style` WHERE `asso_id` = :asso_id;";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
        ":asso_id" => $assoId        
    ));
} //END IF AJOUT STYLE A UN ARTISTE

?>

<form action="artiste.php" method="post">
    <input type="hidden" name="variableArtisteStyle" value=<?php if (isset($idArtist)) {echo ($idArtist);}; ?>>
    <input type="submit" name="ajoutStyle" value="Ajouter un style">
    <input type="submit" name="supprimerStyle" value="Supprimer un style">
</form>