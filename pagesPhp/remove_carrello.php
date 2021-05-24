

<?php
   if(empty($_POST['username'])){
       echo("errore: utente non loggato");
       exit;
   }

    if(isset($_POST["album"]) && isset($_POST["artista"]))
    {
        //connessione database
        $conn = mysqli_connect("localhost", "root", "", "newdb_v3") or die("Errore: ".mysqli_connect_error());
        //Escape input
        $titolo = mysqli_real_escape_string($conn, $_POST["album"]);
        $artista = mysqli_real_escape_string($conn, $_POST["artista"]);
        $username = mysqli_real_escape_string($conn, $_POST["username"]);
        

        
        //cerco id utente
        $query = "SELECT cod_cliente FROM cliente WHERE username = '".$username."'";
        $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
        $row = mysqli_fetch_assoc($res);
        $user = $row['cod_cliente'];

        //cerco l'album corrispondente nel data base e mi restituiso il CB
        $query = "SELECT * FROM album WHERE titolo = '".$titolo."' AND artista = '".$artista."'";
        $res = mysqli_query($conn, $query) or die("Errore: ".mysqli_error($conn));
        $row = mysqli_fetch_assoc($res);
        $album = $row['CB'];

        //elimino l'album
        $query = "DELETE FROM carrello WHERE album = '$album' and cliente = $user";
        $res = mysqli_query($conn, $query) or die("Errore2: ".mysqli_error($conn));
        exit;
    }






    
?>
