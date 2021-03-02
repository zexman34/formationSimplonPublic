<?php

  // je suis un contrôleur, un chef d'orchestre !

  // d'abord j'appelle un modèle, pour en récupérer une $info
  // include("model/model.user.php");
  
  // puis j'appelle une vue, pour afficher cette $info dans une belle page web
  include("view/view.header.php");
  include("view/view.upload_photo.php");
  include("ctrl.session_start.php");

// ajouter la photo

$target_dir = "images/images/";
$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
$uploadOk = 1;
$imageFileType = strtolower(pathinfo($target_file,PATHINFO_EXTENSION));

// Check if image file is a actual image or fake image
if(isset($_POST["submit"])) {
  $check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
  if($check !== false) {
    echo "Le fichier est bien une image ! Bravo ! Type :  " . $check["mime"] . ".";
    $uploadOk = 1;
  } else {
    echo "Le fichier n'est pas une image.";
    $uploadOk = 0;
  }
}

// Check if file already exists
if (file_exists($target_file)) {
  echo "Désolé, le fichier existe déjà.";
  $uploadOk = 0;
}

// Check file size
if ($_FILES["fileToUpload"]["size"] > 500000) {
  echo "Désolé, l'image est trop grosse 1 Mega maxi.";
  $uploadOk = 0;
}

// Allow certain file formats
if($imageFileType != "jpg" && $imageFileType != "png" && $imageFileType != "jpeg"
&& $imageFileType != "gif" ) {
  echo "Désolé je prend que des jpeg, jpg, gif et png.";
  $uploadOk = 0;
}

// Check if $uploadOk is set to 0 by an error
if ($uploadOk == 0) {
  echo "Il y a eu une erreur et le fichier n'a pas été uploadé.";
// if everything is ok, try to upload file
} else {
  if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
    echo "Le fichier ". htmlspecialchars( basename( $_FILES["fileToUpload"]["name"])). " a bien été uploadé.";
    include("model/model.pdo.php");
    include("model/model.photo.php");    
  } else {
    echo "Il y a eu une erreur et le fichier n'a pas été uploadé.";
  }
}

include("view/view.footer.php");

// et puis voilou, on s'arrête là
exit;