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
  $insertOfferteNummer = $maxKlantNummer;
  $insertOfferteWerkzaamheden = $_POST['insertOfferteWerkzaamheden'];
  $insertOffertePrijs = $_POST['insertOffertePrijs'];
  $insertOfferteDate = $_POST['insertOfferteDate'];
  $insertOfferteKlant = $_POST['insertOfferteKlant'];
  $insertOfferteSubmit = $_POST['insertOfferteSubmit'];


  //if Condition: check if submit button is clicked and redirect
  if (!isset($insertOfferteSubmit)) {
    header("location: ../../pages/insertofferte.php?insert=notSubmitted");
  }
  //Else condition: Add entry to the database
  else{
    $sqlInsert = "INSERT INTO offerte (offertenummer, offerte_werkzaamheden, offerte_prijs, offertedatum, offerte_status, klant_id) VALUES ('$insertOfferteNummer', '$insertOfferteWerkzaamheden', '$insertOffertePrijs', '$insertOfferteDate', 'Nieuw', '$insertOfferteKlant');";
    mysqli_query($conn, $sqlInsert);
    header("location: ../../pages/offertes.php?insert=succes");
  }

?>
