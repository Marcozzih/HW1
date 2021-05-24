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
  //conto i prodotti nel database
  $query = "SELECT count(*) FROM album";
  //estraggo il numero
  $res = mysqli_query($conn, $query) or die("Errore2: ".mysqli_error($conn));
  $cont = mysqli_fetch_row($res);
  //query righe di album 
  $query = "SELECT * FROM album";
  //recupero gli elementi
  $res = mysqli_query($conn, $query) or die("Errore2: ".mysqli_error($conn));
  for($i = 0; $i < $cont[0]; $i++){
    $row = mysqli_fetch_assoc($res);

    $arrayAlbums[] = array('codice' => $row['CB'], 'titolo' => $row['titolo'], 'artista' => $row['artista'], 'genere' => $row['genere'], 'durata' => $row['durata'], 'image' => $row['image'], 'descrizione' => $row['descrizione']);
  }

    //conto i prodotti nel database
    $query = "SELECT count(*) FROM esistein";
    //estraggo il numero
    $res = mysqli_query($conn, $query) or die("Errore2: ".mysqli_error($conn));
    $cont = mysqli_fetch_row($res);
    //query righe dei formati degli album
    $query = "SELECT * FROM esistein";
    //recupero gli elementi
    $res = mysqli_query($conn, $query) or die("Errore2: ".mysqli_error($conn));
    for($i = 0; $i < $cont[0]; $i++){
      $row = mysqli_fetch_assoc($res);
      $arrayFormati[] = array('album' => $row['album'], 'formato' => $row['formato'], 'prezzo' => $row['prezzo']);
    }

  $arrayResult[] = array('Albums' => $arrayAlbums, 'Formati' => $arrayFormati);
  echo json_encode($arrayResult);


  

  exit;
  
?>