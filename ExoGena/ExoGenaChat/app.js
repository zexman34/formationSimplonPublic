
async function readJson(){
    let petTrie = [];
    let response = await fetch("user.json");
    let comits = await response.json();
    for(let i =0; i <comits.customers.length ; i++){
        // console.log(comits.customers[i]); //affiche tous les customers
        for(let y =0; y <comits.customers[i].user_pets.length ; y++){
            // console.log(comits.customers[i].user_pets[y]); //affiche tous les user_pets
            petTrie.push(comits.customers[i].user_pets[y].pet_name);
        }
    }
    console.log(petTrie.sort().join()); //Trie les animeaux par ordre alphabétique
};

async function readPet(){
    let response = await fetch("user.json");
    let comits = await response.json();
    for(let i =0; i <comits.customers.length ; i++){
        if (comits.customers[i].user_pets.length > 0){ //vérifie si il y a des animeaux ou pas
            console.log(addPet); 
        }
    }
};

async function addPet(){    
    let mickey = {pet_name:"Mickey", pet_age:"0.1" ,pet_type:"Souris"};
    let response = await fetch("user.json");
    let comits = await response.json();
    for(let i =0; i <comits.customers.length ; i++){
            comits.customers[i].user_pets[comits.customers[i].user_pets.length] = mickey;
            console.log(comits.customers[i].user_pets);
        }
    };



//readJson();
//readPet();
addPet();

//test

// Create a request variable and assign a new XMLHttpRequest object to it.
var request = new XMLHttpRequest()

request.open('GET', 'https://cat-fact.herokuapp.com/facts/random?animal_type=cat&amount=5', true) //Amount définie combien de fact on veut

request.onload = function () {
    var data = JSON.parse(this.response)
    data.forEach((jsonTab) => { 
        console.log(jsonTab.text);
    })
}

// request.send()