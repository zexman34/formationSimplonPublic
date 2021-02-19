<?php
include('config.php');

try {
    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    // Requête de sélection 01
    $requete = "SELECT * FROM `lp_data`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute();
    $resultat = $prepare->fetchAll();
    $value = $resultat[0];
    echo($value['dt_title']);

}


catch (PDOException $e) {
    // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
    exit("❌🙀💀 OOPS :\n" . $e->getMessage());
    }

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="<?php echo( htmlentities($value["dt_meta"],ENT_QUOTES)); ?> ">
    <title> <?php echo($value['dt_title']);?> </title>
</head>
<body>

<style>
body{
    background-color: <?php echo($value["dt_background_color"]); ?> ;
}
body{
    color: <?php echo($value["dt_text_color"]); ?> ;
}
</style>


<p>BONJOUR Moi, c'est Capucine/Développeur full stack junior</p>

<?php
try {
    $connexion = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);

    // Requête de sélection 01
    $requete = "SELECT * FROM `lp_links`";
    $prepare = $connexion->prepare($requete);
    $prepare->execute();
    $resultat = $prepare->fetchAll();
    foreach($resultat as $key => $value){?>        
        <a href=" <?php echo($value['lnk_lien']); ?> "> <?php echo($value['lnk_nom']);?> </a> <?php
        echo('<br>');
    }
}
catch (PDOException $e) {
    // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
    exit("❌🙀💀 OOPS :\n" . $e->getMessage());
    }

?>


</body>
</html>