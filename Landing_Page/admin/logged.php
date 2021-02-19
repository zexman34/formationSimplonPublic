<!-- PHP / Check User TYPE -->
<?php
  // Initialiser la session
  session_start();
  // Vérifiez si l'utilisateur est connecté, sinon redirigez-le vers la page de connexion
  if($_SESSION["type"] != "admin"){
    header("Location: ../index.php");
    exit(); 
  }
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Page</title>
</head>
<body>
<p>Bienvenue wesh !</p>

<!-- couleur BG -->
<form action="logged.php" method="POST" >
    <label for="name">Couleur BG </label>
    <input type="color" name="couleurBackground" >
<!-- couleur texte -->    
    <label for="name"> Couleur Texte </label>
    <input type="color" name="couleurTexte" >    
<!-- Titre de la page -->
    <label for="name">Titre de la page </label>
    <input type="text" name="titrePage" >    
<!-- Meta -->
    <label for="name">Meta </label>
    <input type="text" name="meta" >    

    <input type="submit" value="Aller go !">
</form>    



<!-- Crud lien  -->


<?php
include('../config.php');
//COULEUR BG
if (isset($_POST['couleurBackground']) == true){
    try {
        $couleurBackground = htmlentities($_POST['couleurBackground'], ENT_QUOTES); //Récupère la recherche si il y en a une
        // instancie un objet $connexion à partir de la classe PDO
        $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
    
        // Requête d'identification
        $requete = "UPDATE `lp_data`
                    SET`dt_background_color` = :dt_background_color
                    WHERE `dt_id` = :dt_id ";
        $prepare = $pdo->prepare($requete);
        $prepare->execute(array(
            ':dt_id' => 1,
            ':dt_background_color' => $couleurBackground
        ));
        $resultat = $prepare->fetchAll();
        header('location: logged.php');          

    } catch (PDOException $e) {
        // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
        exit("❌🙀💀 OOPS :\n" . $e->getMessage());
    }
}
//COULEUR TEXTE
if (isset($_POST['couleurTexte']) == true){
    try {
        $textColor = htmlentities($_POST['couleurTexte'], ENT_QUOTES); //Récupère la recherche si il y en a une
        // instancie un objet $connexion à partir de la classe PDO
        $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
    
        // Requête d'identification
        $requete = "UPDATE `lp_data`
                    SET`dt_text_color` = :dt_text_color
                    WHERE `dt_id` = :dt_id ";
        $prepare = $pdo->prepare($requete);
        $prepare->execute(array(
            ':dt_id' => 1,
            ':dt_text_color' => $textColor
        ));
        $resultat = $prepare->fetchAll();
        header('location: logged.php');          

    } catch (PDOException $e) {
        // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
        exit("❌🙀💀 OOPS :\n" . $e->getMessage());
    }
}
//TITRE DE LA PAGE
if (isset($_POST['titrePage']) == true){
    try {
        $titrePage = htmlentities($_POST['titrePage'], ENT_QUOTES); //Récupère la recherche si il y en a une
        // instancie un objet $connexion à partir de la classe PDO
        $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
    
        // Requête d'identification
        $requete = "UPDATE `lp_data`
                    SET`dt_title` = :dt_title
                    WHERE `dt_id` = :dt_id ";
        $prepare = $pdo->prepare($requete);
        $prepare->execute(array(
            ':dt_id' => 1,
            ':dt_title' => $titrePage
        ));
        $resultat = $prepare->fetchAll();
        header('location: logged.php');          

    } catch (PDOException $e) {
        // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
        exit("❌🙀💀 OOPS :\n" . $e->getMessage());
    }
}
//META
if (isset($_POST['meta']) == true){
    try {
        $meta = htmlentities($_POST['meta'], ENT_QUOTES); //Récupère la recherche si il y en a une
        // instancie un objet $connexion à partir de la classe PDO
        $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
    
        // Requête d'identification
        $requete = "UPDATE `lp_data`
                    SET`dt_meta` = :dt_meta
                    WHERE `dt_id` = :dt_id ";
        $prepare = $pdo->prepare($requete);
        $prepare->execute(array(
            ':dt_id' => 1,
            ':dt_meta' => $meta
        ));
        $resultat = $prepare->fetchAll();
        header('location: logged.php');          

    } catch (PDOException $e) {
        // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
        exit("❌🙀💀 OOPS :\n" . $e->getMessage());
    }
}
//LIENS
//INSERT 
if (
    isset($_POST['nomLienAdd']) == true &&
    isset($_POST['urlLienAdd']) == true ) {
    try {
        $nomLienAdd = htmlentities($_POST['nomLienAdd'], ENT_QUOTES); //Récupère la recherche si il y en a une
        $urlLienAdd = htmlentities($_POST['urlLienAdd'], ENT_QUOTES); //Récupère la recherche si il y en a une
       

        $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
        $requete = "INSERT INTO `lp_links`
                    (`lnk_nom`, `lnk_lien`)
                    VALUE (:lnk_nom, :lnk_lien)";
        $prepare = $pdo->prepare($requete);
        $prepare->execute(array(
            ":lnk_nom"   => $nomLienAdd,
            ":lnk_lien"   => $urlLienAdd           
        ));
        $resultat = $prepare->fetchAll();
    } catch (PDOException $e) {
        // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
        exit("❌🙀💀 OOPS :\n" . $e->getMessage());
    }
} //End premier if check si il y a un envoi de variable via le formulaire
//SUPPRIMER
if (isset($_POST['idDelete']) == true) {
    $id = $_POST['idDelete'];
    try {
        $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
        $requete = "DELETE FROM `lp_links`
                    WHERE ((`lnk_id` = :lnk_id));";
        $prepare = $connexion->prepare($requete);
        $prepare->execute(array(
            ':lnk_id' => $id
        ));
        $resultat = $prepare->rowCount();
    } catch (PDOException $e) {
        // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
        exit("❌🙀💀 OOPS :\n" . $e->getMessage());
    }
}
//MODIFIER

if (isset($_POST['idModifier']) == true){
        //READ
        try {
            // instancie un objet $connexion à partir de la classe PDO
            $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
            $idModifier = htmlentities($_POST['idModifier'], ENT_QUOTES); //Récupère la recherche si il y en a une
            $lnk_nom = htmlentities($_POST['nomLien'], ENT_QUOTES); //Récupère la recherche si il y en a une
            $lnk_lien = htmlentities($_POST['urlLien'], ENT_QUOTES); //Récupère la recherche si il y en a une       
            // Requête de sélection 01
            $requete = "UPDATE `lp_links`
            SET`lnk_nom` = :lnk_nom, `lnk_lien` = :lnk_lien
            WHERE `lnk_id` = :lnk_id ";
            $prepare = $connexion->prepare($requete);
            $prepare->execute(array(
                ':lnk_id' => $idModifier,
                ':lnk_nom' => $lnk_nom,
                ':lnk_lien' => $lnk_lien             
            ));
            $resultat = $prepare->fetchAll();  
            }    
            catch (PDOException $e) {
                // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
                exit("❌🙀💀 OOPS :\n" . $e->getMessage());
            }  
        }
//READ
try {
    // instancie un objet $connexion à partir de la classe PDO
    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    // Requête de sélection 01
    $requete = "SELECT * FROM `lp_links`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute();
    $resultat = $prepare->fetchAll();
    foreach ($resultat as $key => $value) { 
        ?>

    <form action="logged.php" method="POST" >
        <label for="name">Nom </label>
        <input type="text" name="nomLien" value="<?php echo($value['lnk_nom']); ?>">
        <label for="name">Lien </label>
        <input type="text" name="urlLien" value="<?php echo($value['lnk_lien']); ?>">
        <?php

        $id = $value["lnk_id"];
        echo ('<form action="logged.php" method="POST" >');
        echo ('<input type="hidden" name="idModifier" value=' . $id . '>');
        echo ('<input type="submit" value="Modifier">');
        echo ("</form>");
        echo ('<form action="logged.php" method="POST" >');
        echo ('<input type="hidden" name="idDelete" value=' . $id . '>');
        echo ('<input type="submit" value="Supprimer">');
        echo ("</form>");
        echo ("<br>");
  ?>
</form>  

<?php    
    }//ForeachEnd
    ?>
    <form action="logged.php" method="POST" >
        <label for="name">Nom </label>
        <input type="text" name="nomLienAdd" >
        <label for="name">Lien </label>
        <input type="text" name="urlLienAdd"  >
        <input type="submit" value="Ajouter un lien">
    </form>  
    <?php  

} catch (PDOException $e) {
    // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
    exit("❌🙀💀 OOPS :\n" . $e->getMessage());
}

?>

<!-- LOGOUT  -->
<form action="logout.php" method="POST" >
    <input type="submit" value="DECONNECTER">
</form>    
    
</body>
</html>