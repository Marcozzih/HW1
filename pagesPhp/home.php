
<?php


session_start();
if(!isset($_SESSION["username"]))
{

    header("Location: registrazione.php");
    exit;

    

}


?>




<html>
  <head> 
   <meta name="viewport"
content="width=device-width, initial-scale=1">
    
    <title>homework 1 front page</title> 
    <link rel="stylesheet" href = "style/home.css">
    <script src = 'script/home.js' defer></script>
  
    
    
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Audiowide">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Trirong">
    <link href="https://fonts.googleapis.com/css2?family=New+Tegomin&display=swap" rel="stylesheet">
  </head>
  
  <body>
    <header>
     <div class = overlay> </div>

      
      <nav> 
        
        <div id = 'titolo'>
          <strong> Discovolante </strong>
        </div>
      <div id = 'link'>

        <span>Benvenuto 
          <?php             
           echo "<span class = 'username'>";
           print_r($_SESSION["username"]);
           echo "</span>";
          ?>
        </span>  

        <span class = 'arrow'></span>

      </div>
        
        <div id = menu>
          <div> </div>
          <div> </div>
          <div> </div>
          </div>
        
      </nav>

      <div id = 'options' class = hidden>
        <a href = 'carrello.php'>CARRELLO</a>
        <a href = "logout.php">LOGOUT</a>    
      </div>
      
      <div class = 'mainFrase'>
        <a href="pagina_negozio.php"> Inizia a scoprire la musica </a>        
      </div>
         
    </header>
    
    <section id = 'main'>
           <div id = 'up'>
             <a> Musica di Tendenza </a> 
          <div class = 'overlay'>
            
          </div> 
      </div>
      
      
      <div id  = 'contPreferiti' class = 'hidden'>
        Preferiti
      </div>

      <div id = 'preferiti' class = 'hidden'> 

      </div>

      
          
      
      <div id = 'down'>
        
        <div class = 'search'>
          <div id = 'ricerca'>
            <span>cerca per nome album</span>
            <input type='text'>
          </div>
        </div>

        <div id = 'albums'>

       


       
          <div class = 'prodotto'>
            <div class = 'img'>
            </div>         
            <div class = 'album'>
            </div>         
            <div class = 'info'>
              <div class = 'desc'>
              </div>
              <h2>mostra +</h2>              
            </div>
          </div>
          

        <div class = 'prodotto'>
          <div class = 'img'>
          </div>
          <div class = 'album'>
          </div>
          <div class = 'info'>
            <div class = 'desc'>
            </div>
            <h2>mostra +</h2>            
          </div>
        </div>
        <div class = 'prodotto'>
          <div class = 'img'>
          </div>
          <div class = 'album'>
          </div>
            <div class = 'info'>
              <div class = 'desc'>
              </div>
                <h2>mostra +</h2>                
              </div>
          </div>
          <div class = 'prodotto'>
            <div class = 'img'>
            </div>
            <div class = 'album'>
            </div>
            <div class = 'info'>
              <div class = 'desc'>
              </div>
                <h2>mostra +</h2>
              </div>
            </div>
          <div class = 'prodotto'>
            <div class = 'img'>
            </div>
            <div class = 'album'>
            </div>
            <div class = 'info'>
              <div class = 'desc'>
              </div>
                <h2>mostra +</h2>
            </div>
          </div>
        </div>

        
      </div>

          

    </section>

    
    
    <footer>
      <div>
      <strong> TITOLO </strong>
      </div>
      <div class = 'info'>
        <a> - chi siamo </a> </br>
        <a> - dove trovarci</a>
      </div>
      
      <div>
        <h1>MARCO PARATORE O46002248</h1>
          </div>
    </footer>
    
  </body>
  
        </html>