<?php
  //include database connect file
  include_once '../connect.php';

  //Constanten
  $insertFactuurPrijs = $_POST['insertFactuurPrijs'];
  $insertFactuurDatum = $_POST['insertFactuurDatum'];
  $insertFactuurRegelOffertenummer = $_POST['insertFactuurRegelOffertenummer'];
  $insertFactuurSubmit = $_POST['insertFactuurSubmit'];

  //Manual ID/Index numbers input database
  $query = "SELECT max(factuurnummer) as 'maxFactuurnummer' FROM factuur;";
  $result = $conn->query($query);
  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $maxFactuurnummer = $row["maxFactuurnummer"];
      }
    }
  $factuurnummer = $maxFactuurnummer + 1;

  //if Condition: check if submit button is clicked and redirect
  if (!isset($insertFactuurSubmit)) {
    header("location: ../../pages/insert/insertFactuur.php?insert=notSubmitted");
  }
  //Else condition: Add entry to the database
  else{
    $sqlInsertFactuur = "INSERT INTO factuur (factuurnummer, factuurdatum, factuur_prijs) VALUES ('$factuurnummer', '$insertFactuurDatum', '$insertFactuurPrijs');";
    $sqlInsertOfferteRegel = "INSERT INTO offerte_regel (factuurnummer, offertenummer) VALUES ('$factuurnummer', '$insertFactuurRegelOffertenummer');";

    mysqli_query($conn, $sqlInsertFactuur);
    mysqli_query($conn, $sqlInsertOfferteRegel);

    header("location: ../../pages/facturen.php?insert=succes");
  }
?>
