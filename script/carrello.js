//apparizione delle opzioni dell'utente

const opz = document.querySelector('.arrow');
opz.addEventListener('click', MostraOpzioni);

function MostraOpzioni(event){
    const eve = event.currentTarget;
    eve.removeEventListener('click', MostraOpzioni);

    const options = document.querySelector('#options');
    options.classList.remove('hidden');
    
    eve.addEventListener('click', MenoOpzioni);
  }



function MenoOpzioni(event){
    const eve = event.currentTarget;
    eve.removeEventListener('click', MenoOpzioni);

    const options = document.querySelector('#options');
    options.classList.add('hidden');

    eve.addEventListener('click', MostraOpzioni);
}



//fetcho gli elementi che il cliente in sessione ha ancora nel carrello



user = '';
fetch("fetch_session.php").then(onResponseS).then(onJsonS)

function onResponseS(response){
  return response.json();
}

function onJsonS(json){
  user = json[0].username;
}



fetch("fetch_prodottiUtente.php").then(onResponse).then(onJson);

//quando faccio la fetch inserisco quelli trovati in questo vettore che serve per la ricerca const vet_nome_album = [];
//posso fare una pagina php che serve a fetchare l'username della persone in seesione

function onResponse(response){
  if(!response.ok) return null;
  return response.json();
}


//chidere info

function onJson(json){
  let totCosto = 0; //conta quant'è il totale nel carrello


for(let i = 0; i<Object.keys(json).length; i++){
  if(json[i].username === user){




      //contenitore
      contenitore = document.createElement('div');
      container.appendChild(contenitore);
      contenitore.classList.add('contenitore');


      //spazio       
      spazio = document.createElement('div');
      contenitore.appendChild(spazio);
      spazio.classList.add('spazio');

      //prodotto
      prt = document.createElement('div');
      contenitore.appendChild(prt);
      prt.classList.add('str_prodotto');

      
       
      

      //img
      img = document.createElement('img');
      img.src = json[i].image;
      prt.appendChild(img);

      //container album
      conteineAlbum = document.createElement('div');
      prt.appendChild(conteineAlbum);
      conteineAlbum.classList.add('str_album')

      //container prezzo
      
      cont_prezzo = document.createElement('div');
      cont_prezzo.textContent = json[i].prezzo + ' €';
      prt.appendChild(cont_prezzo);
      cont_prezzo.classList.add('prezzo');
      totCosto = totCosto + parseFloat(json[i].prezzo);
 
      

      //titolo album     
      titolo_alb = document.createElement('a');
      titolo_alb.textContent = json[i].titolo;
      conteineAlbum.appendChild(titolo_alb);
      titolo_alb.classList.add('titolo');

      //artista
      artista_alb = document.createElement('a');
      artista_alb.textContent = json[i].artista;        
      conteineAlbum.appendChild(artista_alb);
      artista_alb.classList.add('artista');

      //formato album
      
      formato_alb = document.createElement('a');
      formato_alb.textContent = json[i].formato;        
      conteineAlbum.appendChild(formato_alb);
      formato_alb.classList.add('formato');
      
      //bottone rimuovi
      bottone_rimuovi = document.createElement('a');
      bottone_rimuovi.textContent = 'Rimuovi';
      conteineAlbum.appendChild(bottone_rimuovi);
      bottone_rimuovi.classList.add('rimuovi');

      
      
  }
  
}
  
const bot = document.querySelectorAll('.contenitore .str_prodotto .str_album .rimuovi');
for(let aux of bot){
  aux.addEventListener('click', RimuoviAlbum);
}
//totale
const tot = document.createElement('span');
tot.textContent = 'totale:   ' +totCosto + ' €';
totale.appendChild(tot);

}



function RimuoviAlbum(event){
  const eve = event.currentTarget;
  //utile per la rimozione dal database
  const elementoD = eve.parentNode.querySelectorAll('a');
  const titoloR = elementoD[0].textContent;
  const artistaR = elementoD[1].textContent;
  const session_name = document.querySelector('.username');
  const dataForm = new FormData();      
  dataForm.append('username', session_name.textContent);
  dataForm.append('album', titoloR);
  dataForm.append('artista', artistaR);
  fetch("remove_carrello.php", { method: 'post', body: dataForm});

  
  location.reload();


}


const container = document.querySelector('#prodotto');
 
let titolo_alb = null;
let artista_alb = null;
let formato_alb = null;
let img = null;
let prt = null;
let conteineAlbum = null; //per album + artista ecc
let cont_bottoni = null;
let bottone_rimuovi = null;
//let bottone_sposta = null;

let contenitore = null;
let cont_prezzo = null;
let spazio = null;

const totale = document.querySelector('#totale');