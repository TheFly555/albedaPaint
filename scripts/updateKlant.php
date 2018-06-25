<?php
  //include database connect file
  include_once 'connect.php';

  //Constanten
  $SelectKlantUpdate = $_POST['SelectKlantUpdate'];
  $updateKlantNaam = $_POST['updateKlantNaam'];
  $updateKlantEmail = $_POST['updateKlantEmail'];
  $updateKlantAdres = $_POST['updateKlantAdres'];
  $updateKlantPostcode = $_POST['updateKlantPostcode'];
  $updateKlantWoonplaats = $_POST['updateKlantWoonplaats'];
  $updateKlantSubmit = $_POST['updateKlantSubmit'];

  //if Condition: check if submit button is clicked and redirect
  if (!isset($updateKlantSubmit)) {
    header("location: ../pages/updateKlant.php?insert=notSubmitted");
  }
  elseif (!filter_var($updateKlantEmail, FILTER_VALIDATE_EMAIL)) {
  header("location: ../pages/updateKlant.php?insert=invalid_email");
  }
  elseif (!preg_match("~\A[1-9]\d{3} ?[a-zA-Z]{2}\z~", $updateKlantPostcode)) {
    header("location: ../pages/updateKlant.php?signup=unvalid_postalcode");
  }
  else{
    $sqlUpdate = "UPDATE klant SET klant_naam = '$updateKlantNaam', klant_email = '$updateKlantEmail', klant_adres = '$updateKlantAdres', klant_postcode = '$updateKlantPostcode', klant_woonplaats = '$updateKlantWoonplaats' WHERE klant_id = $SelectKlantUpdate;";
    mysqli_query($conn, $sqlUpdate);
    header("location: ../pages/klanten.php?insert=succes");
  }
?>
