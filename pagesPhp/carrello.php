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
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel = "stylesheet" href = "style/carrello.css">
        <script src = 'script/carrello.js' defer></script>
        <script src ='script/return_home.js' defer></script>
        <title>carrello</title>

        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">


    </head>

    <header>      
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
        <a href = "logout.php">LOGOUT</a>
      </div>
    
         
    </header>

    <section id = 'main'>
    <div id = 'mainBar'>
      <div>
        <h1>Carrello</h1>
      </div>
      <div>
        <h2>prezzo</h2>
      </div>
    </div>
      
    <div id = 'prodotto'>
    </div>

    <div class = 'spazio'></div>
    
    <div id = 'totale'>
    </div>

      


    
    </section>




</html>