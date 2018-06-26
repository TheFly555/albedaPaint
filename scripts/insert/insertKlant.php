<?php
  //include database connect file
  include_once '../connect.php';

  //Manual ID/Index numbers input database
  $query = "SELECT max(klant_id) as 'maxKlantId' FROM klant;";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $maxKlantNummer = $row["maxKlantId"];
      }
    }

  //Constanten
  $insertKlantNaam = $_POST['insertKlantNaam'];
  $insertKlantEmail = $_POST['insertKlantEmail'];
  $insertKlantAdres = $_POST['insertKlantAdres'];
  $insertKlantPostcode = $_POST['insertKlantPostcode'];
  $insertKlantWoonplaats = $_POST['insertKlantWoonplaats'];
  $insertKlantSubmit = $_POST['insertKlantSubmit'];
  $Klantnummer = $maxKlantNummer+ 1;

  //if Condition: check if submit button is clicked and redirect
  if (!isset($insertKlantSubmit)) {
    header("location: ../../pages/insertKlant.php?insert=notSubmitted");
  }
  elseif (!filter_var($insertKlantEmail, FILTER_VALIDATE_EMAIL)) {
  header("location: ../../pages/insertKlant.php?insert=invalid_email");
  }
  elseif (!preg_match("~\A[1-9]\d{3} ?[a-zA-Z]{2}\z~", $insertKlantPostcode)) {
    header("location: ../../pages/insertKlant.php?signup=unvalid_postalcode");
  }
  //Else condition: Add entry to the database
  else{
    $sqlInsert = "INSERT INTO klant (klant_id, klant_naam, klant_email, klant_adres, klant_postcode, klant_woonplaats) VALUES ('$Klantnummer', '$insertKlantNaam', '$insertKlantEmail', '$insertKlantAdres', '$insertKlantPostcode', '$insertKlantWoonplaats');";
    mysqli_query($conn, $sqlInsert);
    header("location: ../../pages/klanten.php?insert=succes");
  }

?>
