<?php
  //include database connect file
  include_once '../connect.php';

  //Constanten
  $SelectOfferteUpdate = $_POST['SelectOfferteUpdate'];
  $updateWerkzaamhedenOfferte = $_POST['updateWerkzaamhedenOfferte'];
  $updatePrijsOfferte = $_POST['updatePrijsOfferte'];
  $updateDatumOfferte = $_POST['updateDatumOfferte'];
  $updateStatusOfferte = $_POST['updateStatusOfferte'];
  $updateGekoppeldeKlantOfferte = $_POST['updateGekoppeldeKlantOfferte'];
  $updateOfferteSubmit = $_POST['updateOfferteSubmit'];

  //if Condition: check if submit button is clicked and redirect
  if (!isset($updateOfferteSubmit)) {
    header("location: ../../pages/insertofferte.php?insert=notSubmitted");
  }
  //Else condition: Add entry to the database
  else{
    $sqlUpdate = "UPDATE offerte SET offerte_werkzaamheden = '$updateWerkzaamhedenOfferte', offerte_prijs = '$updatePrijsOfferte', offertedatum = '$updateDatumOfferte', offerte_status = '$updateStatusOfferte', klant_id = '$updateGekoppeldeKlantOfferte' WHERE offertenummer = $SelectOfferteUpdate";
    mysqli_query($conn, $sqlUpdate);
    header("location: ../../pages/offertes.php?insert=succes");
  }

?>
