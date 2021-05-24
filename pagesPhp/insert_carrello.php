

<?php
   if(empty($_POST['username'])){
       echo("errore: utente non loggato");
       exit;
   }
    //per poter aggiungere nel carrello il cliente deve decidere in che formato vuole il prodotto quindi deve necessariamente passare dalla pagina del prodotto

    if(isset($_POST["album"]) && isset($_POST["artista"]) && isset($_POST["formato"]))
    {
        //connessione database
        $conn = mysqli_connect("localhost", "root", "", "newdb_v3") or die("Errore: ".mysqli_connect_error());
        //Escape input
        $titolo = mysqli_real_escape_string($conn, $_POST["album"]);
        $artista = mysqli_real_escape_string($conn, $_POST["artista"]);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        $formato = mysqli_real_escape_string($conn, $_POST["formato"]);
        //cerco il formato scelto

        
        //cerco id utente
        $query = "SELECT cod_cliente FROM cliente WHERE username = '".$username."'";
        $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
        $row = mysqli_fetch_assoc($res);
        $user = $row['cod_cliente'];

        //cerco l'album corrispondente nel data base
        $query = "SELECT * FROM album WHERE titolo = '".$titolo."' AND artista = '".$artista."'";
        $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
        $row = mysqli_fetch_assoc($res);
        $album = $row['CB'];

        //conto gli elemnenti nel carrello
        $count = "SELECT count(*) FROM carrello";
        $res = mysqli_query($conn, $count) or die("Errore2: ".mysqli_error($conn));
        $row = mysqli_fetch_row($res);
        $id = $row[0] + 1;

        //album trovato lo aggiungo al carrello
        $query = "INSERT into carrello(id, album, cliente, formato) VALUES ($id, '$album', $user, '$formato')";
        $res = mysqli_query($conn, $query) or die("Errore2: ".mysqli_error($conn));
        exit;
    }






    
?>
