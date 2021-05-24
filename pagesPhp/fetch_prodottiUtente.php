<?php
session_start();
if(!isset($_SESSION["username"]))
{

    header("Location: registrazione.php");
    exit;
}

header('Content-Type: application/json');

//recupero gli elementi dal db

  //connessione database
  $conn = mysqli_connect("localhost", "root", "", "newdb_v3") or die("Errore: ".mysqli_connect_error());
  //query che prende i preferiti e gli elementi nel carrello
  $query = "SELECT titolo, artista, image, descrizione, username, ca.formato as formato, prezzo
            FROM carrello ca join cliente cl on ca.cliente = cl.cod_cliente 
                join album a on a.CB = ca.album join esistein e on ca.album = e.album AND ca.formato = e.formato";
  //recupero gli elementi
  $res = mysqli_query($conn, $query) or die("Errore2: ".mysqli_error($conn));
  while($row = mysqli_fetch_assoc($res)){

    $arrayAlbums[] = array('titolo' => $row['titolo'], 'artista' => $row['artista'], 'image' => $row['image'], 'username' => $row['username'], 'formato' => $row['formato'], 'prezzo' => $row['prezzo'], 'descrizione' => $row['descrizione']);
  }

  
  echo json_encode($arrayAlbums);


  

  exit;
  
?>