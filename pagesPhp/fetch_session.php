<?php
session_start();
if(!isset($_SESSION["username"]))
{

    header("Location: registrazione.php");
    exit;
}

header('Content-Type: application/json');

    $vet_session[] = array('username' => $_SESSION["username"]);
    echo json_encode($vet_session);

  exit;
  
?>