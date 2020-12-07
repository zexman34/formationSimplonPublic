<?php // lancement d'une session
include_once("session-init.php");
// vérification de la session
if (isset($_SESSION["user"]) and is_array($_SESSION["user"])) {
    // yes, alors bienvenue
    include("back-office--template.php");
} else { // bye
    header("Location: index.html#mauvaise-session");
    exit; // exit après une redirection
}






$arr = array("lol", "lil","lul", "lel");



$num1 = $arr[0];
$num2 = $arr[1];

$arr[2];
$arr[3];





foreach ($arr as $key => $value){
    echo($value);

    //commandes
}