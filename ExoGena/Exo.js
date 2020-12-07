/*1*/
let maVariable = 0;

while (maVariable < 10) {
  maVariable ++;
}

console.log(maVariable);


/*2*/
let autreVariable = 0;
let variableRandom = 4;

while (autreVariable < 20) {
  let z = autreVariable*variableRandom;
  console.log(z);
  autreVariable++;
}

/*3*/
let maVariable = 100;
let autreVariable = 14;

while (maVariable <= 10) {
  let z = maVariable*autreVariable;
  console.log(z);
  maVariable--;  
}

/*4*/
let y = 1;

while (y <= 10) {
  console.log(y);
  let z = y/2;
  y = y+z;  
}

/*5*/
for (let i=1;i<15;i++){
  console.log('On y arrive presque...');
}

/*6*/
for (let i=20;i>0;i--){
  console.log('C\'est presque bon...');
}
/*7*/
for (let i=1;i<100;i=i+15){
  console.log('On tient le bon bout...');
}

/*8*/
for (let i=200;i>0;i=i+12){
  console.log('Enfin ! ! !');
}

/*--------------FONCTIONS ----------------------*/

/*1*/
function maFonction(y) {
  var y=true;
  return y;
}

/*2*/
function maFonction(y) { 
  return y;
}

/*3*/
function maFonction(y,z) { 
  let w = (y+" "+z);
  return w;
}

/*4*/
function maFonction(x,y) { 
  if (x>y){
    return "Le premier nombre est plus grand";
  }
  else if(x<y){
    return "Le premier nombre plus petit";
  }
  else{
    return "Les deux nombres sont identiques";
  }
}
/*5*/
function maFonction(y,z) { 
  let w = (y+" "+z);
  return w;
}

/*6*/
function maFonction(nom, prenom, age) { 
  return ("Bonjour "+nom +" " + prenom+", tu as "+ age +" ans");
}

/*7*/

function maFonction(age, genre) { 
  if (age>17){
    let majeur = "et vous êtes majeur.";
    if (genre =="Femme"){
      return ("Vous êtes une Femme " + majeur);
    }
    else{
      return ("Vous êtes un Homme beau et fort " + majeur);
    }
  }
  else{
    let majeur = "et vous êtes mineur.";
    if (genre =="Homme"){
      return ("Vous êtes un Homme " + majeur);
    }
    else{
      return ("Vous êtes une Femme " + majeur);
    }
  }
}

/*8*/

function maFonction(a=1,b=2,c=3) { 
  let z= a+b+c;
  return z;
}


/*-----------------TABLEAUX--------------------------*/

/*1*/
let mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

/*2*/
console.log(mois[2]);

/*3*/
console.log(mois[5]);

/*4*/
mois[7] = 'Août avec accent';

/*5*/
let departement = {02 : "Aisne", 59 : "Nord", 60 : "Oise", 62 : "Pas-de-Calais", 80 : "Somme"};

/*6*/
console.log(departement[59]);

/*7*/

let departement = {02 : "Aisne", 59 : "Nord", 60 : "Oise", 62 : "Pas-de-Calais", 80 : "Somme"};
departement[51] = "Marne";

/*8*/
let mois = ['Janvier', 'Février', 'Mars', 'Avril', 'Mai', 'Juin', 'Juillet', 'Août', 'Septembre', 'Octobre', 'Novembre', 'Décembre'];

for(y = 0; y < mois.length; y++){
    console.log(mois[y]);
}

/*9*/
let departement = {02 : "Aisne", 59 : "Nord", 60 : "Oise", 62 : "Pas-de-Calais", 80 : "Somme"};

for (var num in departement){
  console.log(departement[num]);
}

/*10*/
let departement = {02 : "Aisne", 59 : "Nord", 60 : "Oise", 62 : "Pas-de-Calais", 80 : "Somme"};
for (var num in departement){
  console.log("Le département" + departement[num] +"a le numero " + num);
}

