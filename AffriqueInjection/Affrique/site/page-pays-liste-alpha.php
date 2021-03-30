<?php
  define("PAGE_TITLE", "Liste alphabétique des pays d'Afrique");
  require("inc/inc.kickstart.php");
?>

<main class="pays-liste">
<?php
  
  $tableau = [];
  $requete = "SELECT * FROM `country` ORDER BY `country_name` "; //Changement du nom de la colonne 🍑
  try {
    $etape = $pdo->prepare($requete);
    $etape->execute();
    $nbreResultat = $etape->rowCount();
    if ($nbreResultat) $tableau = $etape->fetchAll();
    else echo "<pre>✖️ La requête SQL ne retourne aucun résultat</pre>";
  } catch (PDOException $e) {
    echo "<pre>✖️ Erreur liée à la requête SQL :\n" . $e->getMessage() . "</pre>";
  }
//Permet de trier le tableau 🍑
$columns = array_column($tableau, 'country_name');
$coll = collator_create( 'fr_FR' );
usort($tableau, function($a, $b) {
  $coll = collator_create( 'fr_FR' );
  $arr = array($a['country_name'], $b['country_name']);
  collator_asort($coll, $arr, Collator::SORT_STRING);
  return array_pop($arr) == $a['country_name'];
});


  foreach ($tableau as $pays) {
    echo "<section>";   
    echo "<h1>" . htmlentities($pays["country_name"],ENT_QUOTES) . "</h1>"; //Entitisation du form 🍑
    echo "<h2>" . htmlentities($pays["country_flag"],ENT_QUOTES) . "</h2>";//Entitisation du form 🍑
    echo "<div>" . htmlentities(number_format($pays["country_area"], 0, ',', ' '),ENT_QUOTES) . " km²</div>";//Entitisation du form 🍑
    echo "<div>" . htmlentities($pays["country_capital"],ENT_QUOTES) . "</div>";//Entitisation du form 🍑
    echo "</section>";
  }

?>
</main>

<?php require("inc/inc.footer.php"); ?>