const app = document.getElementById('root')


const container = document.createElement('div')
container.setAttribute('class', 'container')


app.appendChild(container)

var request = new XMLHttpRequest() //requette
request.open('GET', 'https://ghibliapi.herokuapp.com/films', true) //récupere l'info sur l'api
request.onload = function () { //load la fonction dans request
  // Begin accessing JSON data here
  var data = JSON.parse(this.response) 
  if (request.status >= 200 && request.status < 400) { //status = 0 en cas d'erreur ou avant que la requette soit faite
    data.forEach((movie) => { //Pour toute les "movie" dans la variable objet "data"
      const card = document.createElement('div') //on creer un element div
      card.setAttribute('class', 'card') //On créer une classe avec le nom "card"

      const h1 = document.createElement('h1') //Créer un element H1 pour le titre du film
      h1.textContent = movie.title //Récupere le titre du film

      const p = document.createElement('p') //Créer l'element P pour les descriptions des films
      movie.description = movie.description.substring(0, 300)  //S'arretera a 300 caractere puis finira par ...
      p.textContent = `${movie.description}...`

      container.appendChild(card) //On bourre tout ca dans la page
      card.appendChild(h1)
      card.appendChild(p)
    })
  } else { //en cas d'erreur
    const errorMessage = document.createElement('marquee')
    errorMessage.textContent = `Gah, it's not working!`
    app.appendChild(errorMessage)
  }
}

request.send() //let's go magle
