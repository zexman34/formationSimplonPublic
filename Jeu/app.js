let joueurPV = 20; //déclération de variable pour les points de vie du joueur
let monstrePV = 20;//déclération de variable pour les points de vie du monstre

//Creation de la fonction pour avoir un nombre entier random
function getRandomIntInclusive(min, max) {
    min = Math.ceil(min);
    max = Math.floor(max);
    return Math.floor(Math.random() * (max - min + 1)) + min;
}//End function

// le i va me servir à switch du monstre au joueur
let i = 0;

//Boucle while avec un check des PV
while (joueurPV >= 0 || monstrePV >= 0) {
    //Si le joueur n'a plus de PV
    if (joueurPV <= 0) {
        alert("Le monstre a gagné ! T'es mauvais !");//Affichage de la phrase en alert
        break; //Break pour sortir de la boucle
    }//End if
    //Si le monstre n'as pas plus de PV
    if (monstrePV <= 0) {
        alert("Aller c'est fini bisou, GG");//Affichage de la phrase en alert
        break; //Break pour sortir de la boucle
    }//end if
    //Si c'est le monstre qui à joué au tour d'avant
    if (i == 0) {
        i = 1; //On change la valeur de i
        let degats = getRandomIntInclusive(1, 6); //Init de la variable degat avec la fonction random
        joueurPV = joueurPV - degats;//Soustraction des dégat aux PV
        alert("Le monstre tape à " + degats + " dégat(s) ! Il resste " + joueurPV + " PV au joueur");//Affichage de la phrase en alert
    } //end if
    else { //Si c'est le joueur qui à joué au tour d'avant
        i = 0; //On change la valeur de i
        let degats = getRandomIntInclusive(1, 6); //Init de la variable degat avec la fonction random
        monstrePV = monstrePV - degats; //Soustraction des dégat aux PV
        alert("Le joueur tape à " + degats + " dégat(s) ! Il reste " + monstrePV + " PV au monstre"); //Affichage de la phrase en alert
    }//End else
}//End while