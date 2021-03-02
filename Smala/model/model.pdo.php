<?php
// salut moi je suis un modèle
// mon rôle c'est d'aller à la pèche à l'info
// en général je contiens tout ce qu'il faut pour se connecter et CRUD une base de données  
// mais là je vais juste récupérer la date du jour


include "model.config.php";
try {
  //----------------READ--------------
    $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
} //END TRY
catch (PDOException $e) {
  // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
  exit("❌🙀💀 OOPS :\n" . $e->getMessage());
}//END CATCH

?>