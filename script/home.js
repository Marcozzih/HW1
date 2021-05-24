




    //ricerca
    const vet_nome_album = [];
    const ricerca = document.querySelector('input');
    const auxProdotti = document.querySelectorAll('.prodotto');
    const prodotti = [];
    for(let x of auxProdotti){
        prodotti.push(x);
    }
    ricerca.addEventListener('keyup', Ricerca);
    const ric = [];
    let parola = '';
    function Ricerca(event){
      
  if(event.key !== 'Shift' && event.key !== 'CapsLock'){
        parola = '';    
        if(event.key !== 'Backspace'){
            ric.push(event.key);
            for(let j = 0; j<ric.length; j++){
                parola += ric[j];
            }
            for(let i = 0; i<5/*elementi massimi da cercare in home */; i++){

                //nascondo gli elementei per i quali non coincide la parola cercata
                if(vet_nome_album[i].search(parola) === -1){
                    prodotti[i].classList.add('hidden');    
                }
            }    
        }else{
            ric.pop();
            for(let j = 0; j<ric.length; j++){
                parola += ric[j];
            }               
            for(let i = 0; i<5; i++){
                if(vet_nome_album[i].search(parola) !== -1){
                    prodotti[i].classList.remove('hidden');
                }
            }
        }
      }      
    }


//mostra descrizione

function MostraPiu(event){

  const eve = event.currentTarget;
  eve.removeEventListener('click', MostraPiu);
  const contenitore = eve.parentNode;
  const contenitoreDesc = contenitore.querySelector('.desc');
 
  contenitoreDesc.classList.remove('desc');

  eve.textContent = 'Mostra -';
  eve.addEventListener('click', MostraMeno);
  
}


function MostraMeno(event){
  const eve = event.currentTarget;
  eve.removeEventListener('click', MostraMeno);
  const contenitore = eve.parentNode;
  const contenitoreDesc = contenitore.querySelector('div');
 
  contenitoreDesc.classList.add('desc');
  eve.textContent = 'Mostra +';
  eve.addEventListener('click', MostraPiu);
}  


    const mostraDesc = document.querySelectorAll('.info h2');
    for(const piu of mostraDesc)
    {
      piu.addEventListener('click', MostraPiu);
    }





  //caricamento dei contenuti
 
 
  fetch("fetch_prodotti.php?").then(onResponse).then(onJson);

  //quando faccio la fetch inserisco quelli trovati in questo vettore che serve per la ricerca const vet_nome_album = [];
  

  function onResponse(response){
    if(!response.ok) return null;
    return response.json();
  }


  //chidere info
  
  function onJson(json){

    for(let i = 0; i<5; i++){
      //album
      
      alb = document.createElement('a');
      alb.textContent = json[0].Albums[i].titolo;
      container2[i].appendChild(alb);
      //utile per la ricerca
      vet_nome_album[i] = json[0].Albums[i].titolo;

      //artista
      art = document.createElement('a');
      art.textContent = json[0].Albums[i].artista;        
      container2[i].appendChild(art);

      //img
      img = document.createElement('img');
      img.src = json[0].Albums[i].image;
      container1[i].appendChild(img);

      //desc
      desc = document.createElement('h1');
      desc.textContent = json[0].Albums[i].descrizione;
      container3[i].appendChild(desc);

    }
    
    

  }


  const container1 = document.querySelectorAll('.img');
  const container2 = document.querySelectorAll('.album');  
  const container3 = document.querySelectorAll('.desc'); 
  let alb = null;
  let art = null;
  let desc = null;
  let img = null;

 
  
 
  
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


/* * * * * * * * * * */
