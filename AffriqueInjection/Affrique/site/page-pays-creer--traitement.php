<?php
define("PAGE_TITLE", "Traitement");
require("inc/inc.kickstart.php");
?>

<main class="pays-creer">
  <?php


  try {
    $requete = "INSERT INTO `country` (`country_name`, `country_flag`, `country_capital`, `country_area`) 
              VALUES (:country_name , :country_flag , :country_capital , :country_area);";
    $prepare = $pdo->prepare($requete);
    $prepare->execute(array(
      ':country_name' => $_POST["country_name"], //Faire une requete préparée 🍑
      ':country_flag' => $_POST["country_flag"], 
      ':country_capital' => $_POST["country_capital"], 
      ':country_area' => $_POST["country_area"] 
    ));
  } catch (PDOException $e) {
    // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
    exit("❌🙀💀 OOPS :\n" . $e->getMessage());
  }  //END TRY


  echo "<h3>Merci !</h3>";
  echo "<p>Voici un récapitulatif de votre contribution :</p>";
  echo "<ul>"
    . "<li>Nom du pays : " . htmlentities($_POST["country_name"], ENT_QUOTES) . "</li>" //Entitisation du form 🍑
    . "<li>Capitale du pays : " . htmlentities($_POST["country_capital"], ENT_QUOTES) . "</li>" //Entitisation du form 🍑
    . "<li>Drapeau du pays : " . htmlentities($_POST["country_flag"], ENT_QUOTES) . "</li>" //Entitisation du form 🍑
    . "<li>Superficie du pays (en km²) : " . htmlentities($_POST["country_area"], ENT_QUOTES) . "</li>" //Entitisation du form 🍑
    . "<ul>";
  echo "<a href='page-pays-liste-alpha.php'><button>Consulter la liste des pays</button></a>";

  ?>
</main>

<?php require("inc/inc.footer.php"); ?>