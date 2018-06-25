<?php
  //include database connect file
  include_once 'connect.php';

  //Constanten
  $insertKlantNaam = $_POST['insertKlantNaam'];
  $insertKlantEmail = $_POST['insertKlantEmail'];
  $insertKlantAdres = $_POST['insertKlantAdres'];
  $insertKlantPostcode = $_POST['insertKlantPostcode'];
  $insertKlantWoonplaats = $_POST['insertKlantWoonplaats'];
  $insertKlantSubmit = $_POST['insertKlantSubmit'];

  //if Condition: check if submit button is clicked and redirect
  if (!isset($insertKlantSubmit)) {
    header("location: ../pages/insertKlant.php?insert=notSubmitted");
  }
  elseif (!filter_var($insertKlantEmail, FILTER_VALIDATE_EMAIL)) {
  header("location: ../pages/insertKlant.php?insert=invalid_email");
  }
  elseif (!preg_match("~\A[1-9]\d{3} ?[a-zA-Z]{2}\z~", $insertKlantPostcode)) {
    header("location: ../pages/insertKlant.php?signup=unvalid_postalcode");
  }
  //Else condition: Add entry to the database
  else{
    $sqlInsert = "INSERT INTO klant (klant_naam, klant_email, klant_adres, klant_postcode, klant_woonplaats)
     VALUES ('$insertKlantNaam', '$insertKlantEmail', '$insertKlantAdres', '$insertKlantPostcode', '$insertKlantWoonplaats');";
    mysqli_query($conn, $sqlInsert);
    header("location: ../pages/klanten.php?insert=succes");
  }

?>
