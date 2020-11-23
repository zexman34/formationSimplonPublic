<?php

  // déclarations des variables
  $inputDir = "source";
  $outputDir = "miniature";
  $outputMaxWidth = 800;
  $outputMaxHeight = 500;
  $allowedExtensionsArray = ["jpg", "jpeg", "gif", "png"];
  $allowedMimetypesArray = ["image/jpeg", "image/gif", "image/png"];
  $outputFilesArray = [];

  // chargement d'une fonction externe
  include_once("imgresize.php");

  // vérification des droits en écriture sur le répertoire contenant les miniatures
  $writable = @touch($outputDir);
  if (!$writable) {
    // oops, on arrête le script
    exit("❌ je ne peux pas écrire dans le répertoire \"$outputDir\" - merci d'en changer les permissions puis de recharger la page.");
  }

  // scan du répertoire source
  $inputFilesArray = array_diff(scandir($inputDir), ["..", "."]); // tout sauf .. et .
  natcasesort($inputFilesArray); // tri naturel insensible à la casse

  // vérification de chaque fichier du répertoire source
  foreach ($inputFilesArray as $key => $inputFile) {
    // déclaration
    $inputRelativePath = $inputDir . "/" . $inputFile;
    $inputExtension = pathinfo($inputRelativePath, PATHINFO_EXTENSION);
    $inputMimetype = mime_content_type($inputRelativePath);
    // est-ce un fichier autorisé ?
    if (
      in_array($inputExtension, $allowedExtensionsArray) AND
      in_array($inputMimetype, $allowedMimetypesArray)
    ) {
      // on est bon
      // déclaration des variables
      $outputFile = "miniature-" . $inputFile; // nom du fichier de la miniature
      $outputRelativePath = $outputDir . "/" . $outputFile; // chemin relatif vers la miniature
      if (!file_exists($outputRelativePath)) {
        // la miniature n'existe pas encore
        // alors on la créé
        $resized = imgResize($inputRelativePath, $outputRelativePath, $outputMaxWidth, $outputMaxHeight);
        if (!$resized) exit("❌ je ne peux pas redimensionner \"$inputRelativePath\" - merci de vérifier cette image puis de recharger la page.");
      }
      $outputFilesArray[] = $outputRelativePath;
    } else {
      // mhh, extension ou mime type interdit
      unset($inputFilesArray[$key]); // on retire du tableau
    }
  }

?><!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>faceBoom</title>
  <meta name="description" content="faceBoom est un script qui permet de centraliser vos images personnelles sur un serveur">
  <link rel="stylesheet" href="style.css">
</head>
<body>

  <header>
    <h1>faceBoom</h1>
  </header>

  <main>
    <?php

      foreach ($outputFilesArray as $outputRelativePath) {
        echo "<img src='$outputRelativePath'  alt='photographie'>\n";
      }

    ?>
    
  </main>

  <footer>
    <p>Tous les contenus de cette page sont disponibles sous <a href="https://creativecommons.org/licenses/by-sa/4.0/deed.fr" target="_blank" rel="noopener noreferrer">licence Creative Commons attribution, partage dans les mêmes conditions</a> ; d'autres conditions peuvent s’appliquer.</p>
  </footer>

</body>
</html>