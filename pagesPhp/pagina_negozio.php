

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
    <title>pagina_negozio</title> 
    <link rel="stylesheet" href = "style/pagina_negozio.css">
    <script src = 'script/pagina_negozio.js' defer></script>


    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">
    </head>

    <body>

        <header>

            <nav> 
        
                <div id = 'titolo'>
                  <strong> Discovolante </strong>
                </div>
              <div id = 'link'>
                <a id = 'random'> RANDOM </a>
                <a href = 'carrello.php'> CARRELLO </a>
                <span>Benvenuto 
                    <?php                         
                        echo "<span class = 'username'>";
                        print_r($_SESSION["username"]);
                        echo "</span>";
                    ?>
                </span>  
              </div>
                
                <div id = menu>
                  <div> </div>
                  <div> </div>
                  <div> </div>
                  </div>
                
              </nav>

            
        </header>

        <section>

            <div id = 'radAlbums'>
                
                

                <form id = 'input' class = 'input_view'>
                    <input type='text' id="album">
                    <input type='submit' value="Cerca">
                </form>

            </div>

            <div id = 'vetrina'>

            </div>


        </section>

        <section id = 'modal_view' class = 'hidden'>


        <div id = 'up'>
            <div id = 'img'>
            </div>

            <div id = 'prodotto'>
            

                <div id = 'album'>
                </div>

                <div id = 'artista'>
                </div>            

                <div id = 'formato'>
                    <a id = 'cd'></a>
                    <a id = 'vinile'></a>
                    <a id = 'cassetta'></a>                
                </div>

                <div id = 'bottone'>
                    <a id = 'carrello'>aggiungi al carrello</a>
                </div>
            </div> 

            <div id = 'exit'>
                <span class = 'x'></span>
            </div>
        </div>

        <div id = 'down'>
        </div>

        </section>
        <section id = 'inserimento_fatto' class = 'hidden'>
            <div id = 'completato'>
                <span>Prodotto inserito nel carrello correttamente</span>
            </div>

            <div id = 'continua'>
                <span>Continua a comprare</span>
            </div>

            <div id = 'home'>
                <a href="home.php">Torna alla home</span>
            </div>

        </section>

    </body>

</html>