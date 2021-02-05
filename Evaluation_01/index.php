<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="robots" content="index, follow" />
    <!-- Description -->
    <meta name="description" content="Des recettes pour une nouvelle façon de cuisiner">
    <meta name="keywords" content="Cuisine, vapeur, vapeur douce, recettes">
    <meta name="author" content="Stéphane Gabrielly">
    <!-- Twitter -->
    <meta name="twitter:card" content="summary" />
    <meta name="twitter:site" content="@yoursite" />
    <meta name="twitter:title" content="Vapeur Douce" />
    <meta name="twitter:description" content="Une autre façon de cuisiner" />
    <meta name="twitter:image" content="https://fabiendevweb.000webhostapp.com/Evaluation_01/logo.png" />
    <!-- Facebook -->
    <meta property="og:type" content="website" />
    <meta property="og:url" content="https://fabiendevweb.000webhostapp.com/Evaluation_01/" />
    <meta property="og:title" content="Vapeur Douce" />
    <meta property="og:description" content="Une autre façon de cuisiner" />
    <meta property="og:image" content="https://fabiendevweb.000webhostapp.com/Evaluation_01/logo.png" />   
    <meta property="og:image:type" content="image/jpeg" />
    <meta property="og:image:width" content="400" />
    <meta property="og:image:alt" content="Logo du site" />
    <link  rel="stylesheet" href="style.css" type="text/css" media="screen" id="pageStyle">
    <title>Vapeur Douce</title>
</head>
<body>
    <div class="title"> <h1>VAPEUR DOUCE</h1> </div>
    <div class="main">
        <img src="logo.png" class="logo" alt="Logo du site super joli">
            <div class="second">
                <form action="index.php" class="formulaire" method="POST">
                    <input class="champ" name="recherche" type="search" placeholder="Rechercher...">        
                </form>
                <?php
                if(isset($_POST['recherche'])){    //Vérifie si il y a une recherche de faite            
                    $recherche = urlencode($_POST['recherche']);//Récupère la recherche depuis le form
                    $curl = curl_init();  //Init du curl
                    //Setup du curl
                    curl_setopt_array($curl, array( 
                        CURLOPT_URL => "https://api.hmz.tf/?id=".$recherche."",
                        CURLOPT_RETURNTRANSFER => true,
                        CURLOPT_TIMEOUT => 30
                    ));
                    $response = curl_exec($curl);//Execute le curl et stock les infos dans reponse
                    curl_close($curl); //close la requete
                    $response = json_decode($response,true); //Deconde le json dans reponse
                    //Vérifie si le résultat existe dans l'API
                    if(!isset($response['message']["vapeur"]['cuisson'])){
                        echo('Mot-clé introuvable'); //En cas d'erreur ou de mauvaise recherche
                    }
                    else{
                        $tempsDeCuisson = $response['message']["vapeur"]['cuisson'];
                        echo('<div class="recherche">'.$recherche.'</div>');
                        echo('<div class="phrase"> Pour une cuisson en vapeur douce de votre '.$recherche.' </div>');
                        foreach($response['message']['vapeur'] as $key => $value){
                            echo('<div class="resultat">');
                            echo(strtoupper(htmlentities($key, ENT_QUOTES))); //Ecriture en MAJ + Convertit les caractères + les guillemets doubles et les guillemets simples.
                            echo(" : ");
                            echo(strtoupper(htmlentities($value, ENT_QUOTES))."<br>"); //Ecriture en MAJ + Convertit les caractères + les guillemets doubles et les guillemets simples.
                            echo('</div>'); //End div resultat
                        } //End        
                    }//End if response
                }//End if POST recherche  
                ?>
                </div>
            </div>
        </div>
    <div class="separator">_ _ _ _ _ _ _ _ _ _</div>
</body>
</html>
