"user strict";

// j'écoute l'évènement "click" de la première touche de ma télécommande
//Voiture
document.querySelector("main > ul > li:nth-of-type(1)").addEventListener("click", (event) => {
  let bruit = new Audio("https://raw.githubusercontent.com/zexman34/formationSimplonPublic/main/Exo14V2/Sons/Buckdich.mp3"); // je créé un objet audio appelé "bruit"
  bruit.play(); // je joue ce bruit
});
// même chose avec les autres touches de ma télécommande
//Cloche
document.querySelector("main > ul > li:nth-of-type(2)").addEventListener("click", (event) => {
  let bruit = new Audio("https://raw.githubusercontent.com/zexman34/formationSimplonPublic/main/Exo14V2/Sons/DuHast.mp3");
  bruit.play();
});
//Coq
document.querySelector("main > ul > li:nth-of-type(3)").addEventListener("click", (event) => {
  let bruit = new Audio("https://raw.githubusercontent.com/zexman34/formationSimplonPublic/main/Exo14V2/Sons/IchWill.mp3");
  bruit.play();
});
//Violon
document.querySelector("main > ul > li:nth-of-type(4)").addEventListener("click", (event) => {
  let bruit = new Audio("https://raw.githubusercontent.com/zexman34/formationSimplonPublic/main/Exo14V2/Sons/Links234.mp3");
  bruit.play();
});
//Klaxon
document.querySelector("main > ul > li:nth-of-type(5)").addEventListener("click", (event) => {
  let bruit = new Audio("https://raw.githubusercontent.com/zexman34/formationSimplonPublic/main/Exo14V2/Sons/Baby.mp3");
  bruit.play();
});
//Travaux
document.querySelector("main > ul > li:nth-of-type(6)").addEventListener("click", (event) => {
  let bruit = new Audio("https://raw.githubusercontent.com/zexman34/formationSimplonPublic/main/Exo14V2/Sons/Sonne.mp3");
  bruit.play();
});