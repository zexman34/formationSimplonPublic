<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">


    <title>Document</title>
</head>

<body>
    <div class="genre">
    <label>Genre</label>


    <?php
    include "config.php"; //Lit le fichier config.php et récupere la variable $pdo pour me connecter à la BDD
    //Requette pour aller lire dans la table Genre et stoquer le résultat dans une variable
    try {
        // Requête de selection des GENRES
        $requete = "SELECT * FROM `genres`";
        $prepare = $pdo->prepare($requete);
        $prepare->execute();
        $resultat = $prepare->fetchAll();


        //AJOUT D'UN NOUVEAU GENRE
        if (isset($_POST['ajouterGenre'])) {
            $nomGenre = $_POST['input_new_genre'];
            $requete = "INSERT INTO `genres`(`genre_name`) 
                        VALUES (:genre_name)";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":genre_name" => $nomGenre
            ));
            $id_photo = $pdo->lastInsertId();    //Recupere le dernier ID
            $res = $prepare->rowCount();
            if ($res >= 1) {
                echo "<h3>Le genre a bien été ajouté !</h3>";
            }
        } //END IF AJOUT GENRE

        //MODIFICATION GENRE
        if (isset($_POST['modifier_genre'])) {
            $nomGenre = $_POST['input_genre'];
            $requete = "UPDATE `genres` 
                SET `genre_name` = :genre_name
                WHERE `genre_id` = :genre_id ;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":genre_id" => $_POST['id_genre'],
                ":genre_name" => $nomGenre
            ));
            $result = $prepare->rowCount();
            if ($result >= 1) {
                echo "<h3>C'est modifié</h3>";
                header('Location: index.php');
            }
        } //END IF MODIFIER GENRE
        //SUPPRESSION GENRE
        if (isset($_POST['supprimer_genre'])) {
            //Modification de l'ID dans la table style pour pouvoir delete
            $requete = "UPDATE `styles` 
                SET `style_genre_id` = :style_genre_new_id
                WHERE `style_genre_id` = :style_genre_id ;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":style_genre_id" => $_POST['id_genre'],
                ":style_genre_new_id" => 16
            ));

            //Suppression de l'id genre
            $requete = "DELETE FROM `genres` WHERE `genre_id` = :genre_id;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":genre_id" => $_POST['id_genre']
            ));
            $result = $prepare->rowCount();
            if ($result == 1) {
                echo '<p>Bien joué, vous venez de supprimer le Genre</p>';
                header('Location: index.php');
            }
        } //END IF SUPPRESSION GENRE
        //AFFICHAGE DES GENRES
        foreach ($resultat as $key => $value) {
            if ($value['genre_id'] == 16) {
                //Rien du tout
            } //END IF
            else {
                echo ('<form action="index.php" method="post">'
                    . '<input type="text"   name="input_genre" value="' . $value['genre_name'] . '">'
                    . '<input type="hidden" name="id_genre" value="' . $value['genre_id'] . '">'
                    . '<input type="submit" name="modifier_genre" value="Modifier">'
                    . '<input type="submit" name="supprimer_genre" value="Supprimer">'
                    . '</form>');
            } //END ELSE
        } //end foreach pour afficher les infos de la table genre
    } catch (PDOException $e) {
        // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
        exit("❌🙀💀 OOPS :\n" . $e->getMessage());
    }

    ?>
    <!-- FORM AJOUT DE GENRE -->
    <label>Ajouter un genre</label>
    <form action="" method="post">        
            <input type="text" name="input_new_genre">
            <input type="submit" name="ajouterGenre" value="Ajouter un genre">
    </form>
    </div>
    <!-- AJOUT DE STYLE -->
    <div class="style">
    <label>Styles</label>
    <?php
    try {
        // Requête de selection des STYLES
        $requete = "SELECT * FROM `styles` ORDER BY `style_name`";
        $prepare = $pdo->prepare($requete);
        $prepare->execute();
        $resultatStyle = $prepare->fetchAll();


        //AJOUT D'UN NOUVEAU STYLES
        if (isset($_POST['ajouterStyle'])) {
            $nomStyle = $_POST['input_new_style'];
            $requete = "INSERT INTO `styles`(`style_name`) 
                        VALUES (:style_name)";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":style_name" => $nomStyle
            ));
            $id_photo = $pdo->lastInsertId();    //Recupere le dernier ID
            $res = $prepare->rowCount();
            if ($res >= 1) {
                echo "<h3>Le style a bien été ajouté !</h3>";
                header('Location: index.php');
            }
        } //END IF AJOUT STYLES


        //MODIFICATION STYLES
        if (isset($_POST['modifier_style'])) {
            $nomStyle = $_POST['input_style'];
            $requete = "UPDATE `styles` 
                SET `style_name` = :style_name
                WHERE `style_id` = :style_id ;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":style_id" => $_POST['id_style'],
                ":style_name" => $nomStyle
            ));
            $result = $prepare->rowCount();
            if ($result >= 1) {
                echo "<h3>C'est modifié</h3>";
                header('Location: index.php');
            }
        } //END IF MODIFIER STYLES

        // //SUPPRESSION STYLES               
        if (isset($_POST['supprimer_style'])) {
            //Suppression de l'id STYLES
            $requete = "DELETE FROM `styles` WHERE `style_id` = :style_id;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":style_id" => $_POST['id_style']
            ));
            $result = $prepare->rowCount();
            if ($result == 1) {
                echo '<p>Bien joué, vous venez de supprimer le style</p>';
                header('Location: index.php');
            }
        } //END IF SUPPRESSION STYLES

        //AFFICHEGE DES STYLES
        echo('<div class="styleList">');
        foreach ($resultatStyle as $key => $value) {            
            echo ('<form action="index.php" method="post">'
                . '<input type="text"   name="input_genre" value="' . $value['style_name'] . '">'
                . '<input type="hidden" name="id_genre" value="' . $value['style_id'] . '">'
                . '<input type="submit" name="modifier_genre" value="Modifier">'
                . '<input type="submit" name="supprimer_genre" value="Supprimer">'
                . '</form>');    
        } //end foreach pour afficher les infos de la table genre
        echo('</div>');
    } catch (PDOException $e) {
        // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
        exit("❌🙀💀 OOPS :\n" . $e->getMessage());
    }


    ?>

    <form action="" method="post">
        <input type="text" name="input_new_style">
        <input type="submit" name="ajouterStyle" value="Ajouter un style">
    </form>
    </div>

    <div class="artiste">
    <label>Artites</label>


    <?php
    try {
        // Requête de selection des ARTISTS
        $requete = "SELECT * FROM `artists` ORDER BY `artist_name`";
        $prepare = $pdo->prepare($requete);
        $prepare->execute();
        $resultatArtist = $prepare->fetchAll();


        //AJOUT D'UN NOUVEL ARTISTS
        if (isset($_POST['choixStyle'])) {
            $nomArtist = $_POST['input_new_artist'];
            $idStyle = $_POST['style_choisi'];
            $requete = "INSERT INTO `artists`(`artist_name`) 
                        VALUES (:artist_name)";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":artist_name" => $nomArtist
            ));
            $idArtist = $pdo->lastInsertId();    //Recupere le dernier ID
            $res = $prepare->rowCount();
            if ($res >= 1) {
                echo "<h3>L'artiste a bien été ajouté !</h3>";
                header('Location: index.php');
            }

            $requete = "INSERT INTO `asso_artist_style`(`asso_style_id`,`asso_artist_id`) 
                        VALUES (:asso_style_id, :asso_artist_id)";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":asso_style_id" => $idStyle,
                ":asso_artist_id" => $idArtist
            ));
        } //END IF AJOUT ARTISTS


        //RENOMMER ARTISTS
        if (isset($_POST['renommer_artist'])) {
            $nomArtist = $_POST['input_artist'];
            $requete = "UPDATE `artists` 
                SET `artist_name` = :artist_name
                WHERE `artist_id` = :artist_id ;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":artist_id" => $_POST['id_artist'],
                ":artist_name" => $nomArtist
            ));
            $result = $prepare->rowCount();
            if ($result >= 1) {
                echo "<h3>C'est modifié</h3>";
                //header('Location: index.php');
            }
        } //END IF MODIFIER ARTISTS

        // //SUPPRESSION ARTISTS               
        if (isset($_POST['supprimer_artist'])) {
            //Suppression de l'id ARTISTS
            $requete = "DELETE FROM `asso_artist_style` WHERE `asso_artist_id` = :asso_artist_id;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":asso_artist_id" => $_POST['id_artist']
            ));
            $requete = "DELETE FROM `artists` WHERE `artist_id` = :artist_id;";
            $prepare = $pdo->prepare($requete);
            $prepare->execute(array(
                ":artist_id" => $_POST['id_artist']
            ));
            $result = $prepare->rowCount();
            if ($result == 1) {
                echo "<p>Bien joué, vous venez de supprimer l'artist</p>";
                header('Location: index.php');
            }
        } //END IF SUPPRESSION ARTISTS
        //AFFICHAGE DES ARTISTS
        echo('<div class="artisteListe">');
        foreach ($resultatArtist as $key => $value) {
            echo ('<form action="" method="post">'
                . '<input type="text"   name="input_artist" value="' . $value['artist_name'] . '">'
                . '<input type="hidden" name="id_artist" value="' . $value['artist_id'] . '">'
                . '<input type="submit" name="renommer_artist" value="Renommer">'
                . '<input type="submit" name="supprimer_artist" value="Supprimer">'
                . '</form>');
        } 
        echo("</div>");//end foreach pour afficher les infos de la table ARTISTS
    } catch (PDOException $e) {
        // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
        exit("❌🙀💀 OOPS :\n" . $e->getMessage());
    }


    //ASSO ARTISTE STYLE
    if (isset($_POST['ajoutStyleArtiste'])) {
        $nomArtist = $_POST['input_new_artist'];
        $idStyle = $_POST['style_choisi'];
        $requete = "INSERT INTO `artists`(`artist_name`) 
                    VALUES (:artist_name)";
        $prepare = $pdo->prepare($requete);
        $prepare->execute(array(
            ":artist_name" => $nomArtist
        ));
        $idArtist = $pdo->lastInsertId();    //Recupere le dernier ID
        $res = $prepare->rowCount();
        if ($res >= 1) {
            echo "<h3>L'artiste a bien été ajouté !</h3>";
            //header('Location: index.php');
        }

        $requete = "INSERT INTO `asso_artist_style`(`asso_style_id`,`asso_artist_id`) 
                    VALUES (:asso_style_id, :asso_artist_id)";
        $prepare = $pdo->prepare($requete);
        $prepare->execute(array(
            ":asso_style_id" => $idStyle,
            ":asso_artist_id" => $idArtist
        ));
    } //END IF AJOUT ARTISTS

    ?>
    
    
    <!-- AJOUT D'UN ARTISTE AVEC STYLE -->
<div class="artisteStyle">
    <form class="formArtistStyle" action="" method="post">
        <label>Ajouter un artiste</label>
        <input type="text" name="input_new_artist">
        <label for="choix_style_for">Choisis un style</label>
        <select name="style_choisi" id="choix_style_for" required size=7>
            <?php
            foreach ($resultatStyle as $key => $value) {
                echo ('<option value="' . $value['style_id'] . '">' . $value['style_name'] . '</option>');
            } //end foreach pour afficher les STYLES    
            ?>
        </select>
        <input type="submit" name="ajoutStyleArtiste" value="Valider">
    </form>
    </div>



    <!-- CHOISIR L'ARTISTE -->
<div class="artisteSeul">
    <form class="formArtistStyle" action="artiste.php" method="post">
        <label>Nom de l'artiste/groupe</label>
        <select name="artistAsso_choisi" id="choix_artist_for" size=7>
            <?php
            foreach ($resultatArtist as $key => $value) {
                echo ('<option name="' . $value['artist_id'] . '"  value="' . $value['artist_id'] . '">' . $value['artist_name'] . '</option>');
            } //end foreach pour afficher les ARTISTES   
            ?>
        </select>
        <input type="submit" name="affichierArtiste" value="Valider">
    </form>
    </div>
    </div>
</body>

</html>