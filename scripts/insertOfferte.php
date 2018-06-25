<?php
  //include database connect file
  include_once 'connect.php';

  //Constanten
  $insertOfferteDate = $_POST['insertOfferteDate'];
  $insertOfferteWerkzaamheden = $_POST['insertOfferteWerkzaamheden'];
  $insertOffertePrijs = $_POST['insertOffertePrijs'];
  $selectOfferteStatus = $_POST['selectOfferteStatus'];
  $insertOfferteSubmit = $_POST['insertOfferteSubmit'];

  //if Condition: check if submit button is clicked and redirect
  if (!isset($insertOfferteSubmit)) {
    header("location: ../pages/insertofferte.php?insert=notSubmitted");
  }
  //Else condition: Add entry to the database
  else{
    $sqlInsert = "INSERT INTO offerte (offerte_werkzaamheden, offertedatum, offerte_prijs, offerte_status)
     VALUES ('$insertOfferteWerkzaamheden', '$insertOfferteDate', $insertOffertePrijs, 'Nieuw');";
    mysqli_query($conn, $sqlInsert);
    header("location: ../pages/offertes.php?insert=succes");
  }

?>
