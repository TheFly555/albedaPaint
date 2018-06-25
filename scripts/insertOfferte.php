<?php
  //include database connect file
  include_once 'connect.php';

  //Constanten
  $insertOfferteWerkzaamheden = $_POST['insertOfferteWerkzaamheden'];
  $insertOffertePrijs = $_POST['insertOffertePrijs'];
  $insertOfferteDate = $_POST['insertOfferteDate'];
  $insertOfferteKlant = $_POST['insertOfferteKlant'];
  $insertOfferteSubmit = $_POST['insertOfferteSubmit'];

  //if Condition: check if submit button is clicked and redirect
  if (!isset($insertOfferteSubmit)) {
    header("location: ../pages/insertofferte.php?insert=notSubmitted");
  }
  //Else condition: Add entry to the database
  else{
    $sqlInsert = "INSERT INTO offerte (offerte_werkzaamheden, offerte_prijs, offertedatum, offerte_status, klant_id) VALUES ('$insertOfferteWerkzaamheden', '$insertOffertePrijs', '$insertOfferteDate', 'Nieuw', '$insertOfferteKlant');";
    mysqli_query($conn, $sqlInsert);
    header("location: ../pages/offertes.php?insert=succes");
  }

?>
