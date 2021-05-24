<?php

    if(!empty($_POST["data"]) &&  !empty($_POST["nome"]) && !empty($_POST["cognome"]) && !empty($_POST["email"]) && 
    !empty($_POST["username"]) && !empty($_POST["password"]) && !empty($_POST["conferma_password"]))
    {
        //connessione database
        $conn = mysqli_connect("localhost", "root", "", "newdb_v3") or die("Errore: ".mysqli_connect_error());
        
        //username
        $user = mysqli_real_escape_string($conn, $_POST["username"]);
        // Cerco se l'username esiste già 
        $query = "SELECT username FROM cliente WHERE username = '$user'";
        $res = mysqli_query($conn, $query);
        if (mysqli_num_rows($res) > 0) {
            $err_user = true;
        }



        //password
        if(strlen($_POST["password"]) < 8){
            $err_lenght_pass = true;
        }
        if (strcmp($_POST["password"], $_POST["conferma_password"]) != 0) {
            $err_confirm_pass = true;
        }


        if(empty($err_lenght_pass) && empty($err_confirm_pass) && empty($err_user)){
        //controllo che l'utente non sia già registrato



        //Escape input

        $data = mysqli_real_escape_string($conn, $_POST["data"]);
        $nome = mysqli_real_escape_string($conn, $_POST["nome"]);
        $cognome = mysqli_real_escape_string($conn, $_POST["cognome"]);
        $email = mysqli_real_escape_string($conn, $_POST["email"]);
        
        $pass = mysqli_real_escape_string($conn, $_POST["password"]);
        $conf_pass = mysqli_real_escape_string($conn, $_POST["conferma_password"]);
        //conto quanti utenti sono registrati in modo da fornire al nuovo utente un id corretto
        $idSearch = "SELECT count(*) FROM cliente";
        $res = mysqli_query($conn, $idSearch) or die("Errore2: ".mysqli_error($conn));
        $row = mysqli_fetch_row($res);
        $id = $row[0] + 1;
        //inserisco il nuovo utente
        $query = "INSERT INTO cliente(cod_cliente, nome, cognome, data_nascita, email, username, pass) VALUES ($id, '$nome', '$cognome', $data, '$email', '$user', '$pass')";
        $res = mysqli_query($conn, $query) or die("Errore2: ".mysqli_error($conn));
        //verifica che le credenziali sono esatte
        if(isset($res)){
            //stert session
            session_start();
            $_SESSION["username"] = $_POST["username"];
            header("Location: home.php");
            exit;
        }else {
            $err_database = true;
        }


        }

        mysqli_close($conn);
        
    }else if (isset($_POST["username"])) {
        $err_campi_form = true;
    }
        
    



?>





<html>

<head>
    <link rel = "stylesheet" href = "style/registrazione.css">
</head>

<body>

        <?php

        
            
            if(isset($err_campi_form))            {
                echo "<p class = 'error'>";
                echo "Riemire tutti i campi.";
                echo "</p>";
            }

            if(isset($err_lenght_pass))            {
                echo "<p class = 'error'>";
                echo "Verificare che la password abbia più di 8 caratteri.";
                echo "</p>";
            }
            if(isset($err_confirm_pass)){
                echo "<p class = 'error'>";
                echo "Le password non corrispondono.";
                echo "</p>";
            }
            if(isset($err_database)){
                echo "<p class = 'error'>";
                echo "errore connessione database.";
                echo "</p>";
            }
            if(isset($err_user)){
                echo "<p class = 'error'>";
                echo "username già utilizzato.";
                echo "</p>";
            }
            
        

            
        ?>

        <header>

            <div id = 'titolo'>
                <strong>Discovolante</strong> 
            </div>            
        </header>

    <main>

            <div>
                <h1>Registrati</h1>
            </div>
        <form name = 'Registrazione' method = 'post'>
            <div>
                <label>Nome</br> <input type = 'text' name ='nome' ></label>
            </div>
            <div>
                <label>Cognome</br> <input type = 'text' name = 'cognome'></label>
            </div>
            <div>
                <label>Data di nascita</br> <input type = 'text' name = 'data'></label>
            </div>    
            <div>
                <label>Email</br> <input type = 'text' name = 'email'></label>
            </div>
            <div>
                <label>Username</br> <input type = 'text' name = 'username'></label>
            </div>
            <div>
                <label>Password</br> <input type = 'password' name = 'password'></label>
            </div>
            <div>
                <label>Conferma Password</br> <input type = 'password' name = 'conferma_password'></label>
            </div>
            
            <div>
                <label><input type = 'submit'></label>
            </div>
        
        </form>

        <div id = 'log'>
            hai già un account </br> <a href = "login.php"> accedi </a>
        </div>

    </main>
</body>

