<?php

  /*

  route

  */

  parse_str($_SERVER["QUERY_STRING"], $qs); // récupère les "query string" et les range en tableau
  $keys = array_keys($qs); // extrait le nom des clés du tableau
  $route = array_shift($keys); // extrait le nom de la première clé

  switch ($route) {

/////////////CONNEXION///////////////////
    case "login":
      include("controller/ctrl.login.php"); //Affige la page de login
      break;
    case "login_check":
      include("controller/ctrl.login_check.php"); //Check si le log existe ou pas et si c'est un admin ou non
      break;
    
/////////////USER///////////////////
    case "espace_user":
      include("controller/ctrl.espace_user.php"); //Gestionnaire de l'utilisateur
      break;
      
/////////////ADMIN ET USER ///////////////////
    case "add_photo":
      include("controller/ctrl.add_photo.php"); //Permet d'aller ajouter une photo
      break;
    case "upload_photo":
      include("controller/ctrl.upload_photo.php"); //Permet d'aller ajouter une photo
      break;
    case "update_profile":
      include("controller/ctrl.update_profile.php"); //Pour modifier les infos de profil
      break;

/////////////ADMIN///////////////////
    case "backoffice_admin":
      include("controller/ctrl.backoffice_admin.php"); //Envois sur l'interface Admin
      break;
    case "create_user":
      include("controller/ctrl.create_user.php"); //Pour créer un user depuis le côté admin
      break;
    case "add_user":
      include("controller/ctrl.add_user.php"); //Pour créer un user depuis le côté admin
      break;
    case "admin_rud_users":
      include("controller/ctrl.admin_rud_users.php"); //Pour gérer un user depuis le côté admin
      break;
    case "rud_photo_users":
      include("controller/ctrl.rud_photo_users.php"); //Pour modifier les infos de profil
      break;
/////////////DEFAUT///////////////////
    default:
      include("controller/ctrl.login.php");//page par defaut de login
      break;

  }






  /*

  EOF
  
  */

  exit;