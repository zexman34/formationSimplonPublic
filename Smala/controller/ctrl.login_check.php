<?php
//Recupere les infos de la DB

use RankMath\Admin\Admin;

include("model/model.pdo.php");//Connexion PDO $pdo
include("model/model.user.php");//Connexion PDO $pdo



if(isset($_POST['mail_user']) && isset($_POST['password_user']))
{

   $pseudo_user = htmlentities($_POST["pseudo_user"], ENT_QUOTES);
   $mail_user = htmlentities($_POST["mail_user"], ENT_QUOTES);
   $password_user = htmlentities($_POST["password_user"], ENT_QUOTES);   
   if($resultat[0]["pseudo_user"] == ""){
         echo("utilisateur introuvable");
         header ("Location: ?login#utilisateur_introuvable");
      }
   else if($resultat[0]["password_user"] != $password_user){
         echo("Mauvais mot de passe ");
         echo($resultat[0]["pseudo_user"]);
         header ("Location: ?login#mauvais_mot_de_passe");
      }
   else if ($resultat[0]["password_user"] == $password_user && $resultat[0]["mail_user"] == $mail_user ){
      echo('Bienvenue Batard ! Heuuu ');
      echo($resultat[0]["pseudo_user"]);
      include('ctrl.session_start.php');
      $_SESSION["connected"]= $resultat[0]["mail_user"];
      $_SESSION["role"]= $resultat[0]["role_user"];
      $_SESSION["pseudo"]= $resultat[0]["pseudo_user"];
      $_SESSION["id_user"]= $resultat[0]["id_user"];
      $_SESSION["password"]=  $resultat[0]["password_user"];
      $_SESSION["mail"]=  $resultat[0]["mail_user"];
      if($resultat[0]["role_user"] == false){
        header("Location: ?espace_user");      
      }
      else{
        header("Location: ?backoffice_admin");      
      }
   }
}