<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<form action="admin.php" method="POST" >
    <label for="name">Identifiant </label>
    <input type="text" name="identifiant" required>
    <label for="name">MDP : </label>
    <input type="password" name="password" required>    
    <input type="submit" value="Aller go !">
</form>    


    <?php 
    
    include('../config.php');

    session_start();
    if (isset($_POST['identifiant']) == true&&
    isset($_POST['password']) == true){
        
        try {
            $identifiant = htmlentities($_POST['identifiant'], ENT_QUOTES); //Récupère la recherche si il y en a une
            $password = htmlentities($_POST['password'], ENT_QUOTES); //Récupère la recherche si il y en a une

            // instancie un objet $connexion à partir de la classe PDO
            $pdo = new PDO(DB_DRIVER . ":host=" . DB_HOST . ";dbname=" . DB_NAME . ";charset=" . DB_CHARSET, DB_LOGIN, DB_PASS, DB_OPTIONS);
        
            // Requête d'identification
            $requete = "SELECT *
                        FROM `lp_users`
                        WHERE `usr_login`='$identifiant' AND `usr_mdp` = '$password'"; 
            $prepare = $pdo->prepare($requete);
            $prepare->execute();
            $res = $prepare->rowCount();
            if (($res) == 1) {
                $user = $prepare->fetchAll();
                $_SESSION["identifiant"] = $user[0]['usr_login']; 
                $_SESSION["password"] = $user[0]['usr_mdp']; 
                $_SESSION["type"] = "admin";

                header('location: logged.php');    
            }
            else{
                $message = "Le nom d'utilisateur ou le mot de passe est incorrect.";
                echo($message);
            }

        } catch (PDOException $e) {
            // en cas d'erreur, on récup et on affiche, grâce à notre try/catch
            exit("❌🙀💀 OOPS :\n" . $e->getMessage());
        }

    }
    ?>
</body>
</html>