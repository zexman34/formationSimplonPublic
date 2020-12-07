<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laceur de Dés</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1> Le compagnon du rôliste</h1>
        <div class="formu">
            <form action="resultat.php" method="post">
                <label for="quantity">Nombre de dés:</label>
                <input type="number" id="quantity" name="quantity" min="1" max="100" required>
                <label for="face">Nombre de face:</label>
                <input type="number" id="face" name="face" min="2" max="100" required>                
                <a href="resultat.php" ><button class="button">Lancer les dés</button></a>
            </form>
        </div>    
    </div>
</body>
</html>