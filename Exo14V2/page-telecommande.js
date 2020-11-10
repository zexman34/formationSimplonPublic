"user strict";

// j'écoute l'évènement "click" de la première touche de ma télécommande
//Voiture
document.querySelector("main > ul > li:nth-of-type(1)").addEventListener("click", (event) => {
  let bruit = new Audio("https://raw.githubusercontent.com/zexman34/formationSimplonPublic/main/Exo14/Sons/voiture.mp3"); // je créé un objet audio appelé "bruit"
  bruit.play(); // je joue ce bruit
});
// même chose avec les autres touches de ma télécommande
//Cloche
document.querySelector("main > ul > li:nth-of-type(2)").addEventListener("click", (event) => {
  let bruit = new Audio("https://raw.githubusercontent.com/zexman34/formationSimplonPublic/main/Exo14/Sons/cloche.mp3");
  bruit.play();
});
//Coq
document.querySelector("main > ul > li:nth-of-type(3)").addEventListener("click", (event) => {
  let bruit = new Audio("https://raw.githubusercontent.com/zexman34/formationSimplonPublic/main/Exo14/Sons/coq.mp3");
  bruit.play();
});
//Violon
document.querySelector("main > ul > li:nth-of-type(4)").addEventListener("click", (event) => {
  let bruit = new Audio("https://raw.githubusercontent.com/zexman34/formationSimplonPublic/main/Exo14/Sons/violon.mp3");
  bruit.play();
});
//Klaxon
document.querySelector("main > ul > li:nth-of-type(5)").addEventListener("click", (event) => {
  let bruit = new Audio("https://raw.githubusercontent.com/zexman34/formationSimplonPublic/main/Exo14/Sons/klaxon.mp3");
  bruit.play();
});
//Travaux
document.querySelector("main > ul > li:nth-of-type(6)").addEventListener("click", (event) => {
  let bruit = new Audio("https://raw.githubusercontent.com/zexman34/formationSimplonPublic/main/Exo14/Sons/travaux.mp3");
  bruit.play();
});