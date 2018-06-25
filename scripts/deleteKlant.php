<?php
  //include database connect file
  include_once 'connect.php';

  //Constanten
  $selectDeleteKlant = $_POST['selectDeleteKlant'];
  $submitDeleteKlant = $_POST['submitDeleteKlant'];

  //if Condition: check if submit button is clicked and redirect
  if (!isset($submitDeleteKlant)) {
    header("location: ../pages/deleteKlant.php?insert=notSubmitted");
  }
  //Else condition: Add entry to the database
  else{
    $sqldelete = "DELETE FROM klant WHERE klant_id = $selectDeleteKlant;";
    mysqli_query($conn, $sqldelete);
    header("location: ../pages/klanten.php?insert=succes");
  }

?>
