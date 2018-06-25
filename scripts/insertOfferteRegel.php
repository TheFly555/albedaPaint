<?php
  //include database connect file
  include_once 'connect.php';

  //Constanten
  $selectKlant = $_POST['selectKlant'];
  $selectOfferte = $_POST['selectOfferte'];
  $insertOfferteRegelSubmit = $_POST['insertOfferteRegelSubmit'];

  //if Condition: check if submit button is clicked and redirect
  if (!isset($insertOfferteRegelSubmit)) {
    header("location: ../pages/insertofferte.php?insert=notSubmitted");
  }
  //Else condition: Add entry to the database
  else{
    $sqlInsert = "
    INSERT INTO offerte_regel (offerte_id, klant_id) VALUES ('$selectOfferte', '$selectKlant');";

     $sqlInsertOfferte = "UPDATE offerte SET offerte_status = 'Aangewezen' WHERE offertenummer = $selectOfferte";
    mysqli_query($conn, $sqlInsert);
    mysqli_query($conn, $sqlInsertOfferte);
    header("location: ../pages/offertes.php?insert=succes");
  }

?>
