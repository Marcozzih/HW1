<?php

    session_start();
    if(isset($_SESSION["username"]))
    {
        header("Location: homeV2.php");
        exit;
    }


    if(isset($_POST["username"]) && isset($_POST["password"]))
    {
        //connessione database
        $conn = mysqli_connect("localhost", "root", "", "newdb_v3") or die("Errore: ".mysqli_connect_error());
        //Escape input
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $pass = mysqli_real_escape_string($conn, $_POST["password"]);
        //cerco utenti con le credenziali inserite
        $query = "SELECT * FROM cliente WHERE username = '".$username."' AND pass = '".$pass."'";
        $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
        //verifica che le credenziali sono esatte
        if(mysqli_num_rows($res)>0){
            //stert session
            $_SESSION["username"] = $_POST["username"];
            header("Location: home.php");
            exit;
        }
        else
        {
            $errore = true;
        }
    }
   

?>

<html>
    
    <head>

        <link rel = "stylesheet" href= "style/login.css">

        
        <title>Login</title>       
        <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Sofia">


    </head>
    <body>    

        <?php
            if(isset($errore))
            {
                echo "<p class = 'errore'>";
                echo "Credenziali errate.";
                echo "</p>";
            }

            if(isset($errore2))
            {
                echo "<p class = 'errore2'>";
                echo "Riempire tutti i campi.";
                echo "</p>";
            }
            
        ?>

        <header>

            <div id = 'titolo'>
                <strong>Discovolante</strong> 
            </div>            
        </header>


        <main>

            <h1> Login </h1>
            <form name = 'login' method = 'post'>
                <div>
                    <label>Nome Utente</br> <input type='text' name='username'></label>
                </div>
                <div>
                    <label>Password</br> <input type = 'password' name = 'password'></label>
                </div>
                <div>
                    <label><input type = 'submit'></label>
                </div>

            </form>

            <div id = 'reg'>
                non sei rgistrato? </br> registrati  <a href = "registrazione.php"> qui </a>
            </div>

        </main>
    </body>

</html>

