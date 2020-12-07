<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Resultat des dés !</title>
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <div class=container>
        <h1> Hoho ! Super lancé !</h1>
        <div class="result">
            <?php
            $quantity = $_POST["quantity"] ?? false;
            $face = $_POST["face"] ?? false;
            function diceRoll($numbreOfDice, $numberOfFace)
            {
                for ($i = 0; $i < $numbreOfDice; $i++) {
                    $resultat[$i] = random_int(1, $numberOfFace);
                    $des = $i + 1;
                    $rotY =random_int(-440,-50);
                    $rotX =random_int(-440,-50);
                    $transX =random_int(-440,450);
                    $transY =random_int(-440,450);

                    echo ("<div id='wrapD3Cube' style='transform: translateX(".$transX."px) translateY(".$transY."px)'><div class='D3Cube' style='transform: rotateX(".$rotX."deg) rotateY(".$rotY."deg) rotateZ(0deg)' style='-moz-transform: rotateX(".$rotX."deg) rotateY(".$rotY."deg) rotateZ(0deg)' style='-webkit-transform: rotateX(".$rotX."deg) rotateY(".$rotY."deg) rotateZ(0deg)'><div id='side1'>1</div><div id='side2'>2</div><div id='side3'> $resultat[$i] </div><div id='side4'>7</div><div id='side5'>11</div><div id='side6'>7</div></div></div> ");
                }
            }
            diceRoll($quantity, $face);
            ?>
        </div>
        <div class="formu">
            <form action="resultat.php" method="post">
                <input name="quantity" type="hidden" id="quantity" value="<?php echo ($quantity); ?>">
                <input name="face" type="hidden" id="face" value="<?php echo ($face); ?>">
                <input class="button" type="submit" value="Relancer">
            </form>
            <a href="index.php"><button class="button">Retour</button></a>
        </div>
    </div>
</body>

</html>