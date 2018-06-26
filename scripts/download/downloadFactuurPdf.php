<?php
  //include database connect file
  include_once '../connect.php';

  //Constanten
  $selectDownloadFactuur = $_POST['selectDownloadFactuur'];
  $downloadPdfSubmit = $_POST['downloadPdfSubmit'];

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
  if (!isset($downloadPdfSubmit)) {
    header("location: ../../pages/download/downloadFactuurPdf.php?insert=notSubmitted");
  }
  //Else condition: Add entry to the database
  else{
    include '../connect.php';
    $query ='SELECT *
    JOIN offerte ON offerte_regel.offertenummer = offerte.offertenummer
    JOIN factuur ON offerte_regel.factuurnummer = factuur.factuurnummer
    JOIN klant ON offerte.klant_id = klant.klant_id
    WHERE factuur.factuurnummer = $selectDownloadFactuur;';

    $result = $conn->query($query);

    if ($result->num_rows > 0) {
      while($row = $result->fetch_assoc()) {

        }
      }


      // Set parameters
      $apikey = '6b00c851-d015-4b39-b143-0ca99e9d1c30';
      $value = "

      <!DOCTYPE html>
      <html>
        <head>
          <?php include '../database.php'; ?>
          <?php include '../connect.php' ?>
          <meta charset='utf-8'>
          <meta name='viewport' content='width=device-width, initial-scale=1.0'>
          <link rel='stylesheet' href='../../css/pdfstyle.css'>
          <title>Albeda Paint</title>
          <style>
          html,body{
            height: 100%;
            width: 100%;
            padding: 0;
            font-family: arial;
          }

          .title {
            font-size: 20px;
          }

          .container {
            margin-left: 100px;
            margin-top: 75px;
            margin-right: 100px;

          }

          .klant {
            margin-left: 10px;
          }

          .factuurDetails {
            float: right;
          }

          .tableProducten {
            border: 2px solid black;
          }
          th, td {
            width: 130px;
          }

          </style>
        </head>
        <body>
          <div class='container'>
          <br><br><br><br>
          <h1>Factuur</h1>
            <h4>aan:</h4>
            <div class='klant'>
              <h5>De heer/mevrouw: " . $klant_naam . "
              <div class='factuurDetails'>
                  Factuurnummer: " .  $factuur_nummer . "<br>
                  Factuurdatum: " .  $factuur_datum . " <br>
                  Factuur prijs: " .  $factuur_prijs . "
              </div>
                <br>
                ". $klant_adres ."<br>
                ". $klant_postcode ."<br>
                ". $klant_woonplaats ."<br><br>
              </h5>
            </div>
            <br><br>
          </div>
        </body>
      </html>


      "; // can aso be a url, starting with http..

      // Convert the HTML string to a PDF using those parameters.  Note if you have a very long HTML string use POST rather than get.  See example #5
      $result = file_get_contents("http://api.html2pdfrocket.com/pdf?apikey=" . urlencode($apikey) . "&value=" . urlencode($value));

      // Output headers so that the file is downloaded rather than displayed
      // Remember that header() must be called before any actual output is sent
      header('Content-Description: File Transfer');
      header('Content-Type: application/pdf');
      header('Expires: 0');
      header('Cache-Control: must-revalidate');
      header('Pragma: public');
      header('Content-Length: ' . strlen($result));

      // Make the file a downloadable attachment - comment this out to show it directly inside the
      // web browser.  Note that you can give the file any name you want, e.g. alias-name.pdf below:
      header('Content-Disposition: attachment; filename=' . 'Factuur.pdf' );

      // Stream PDF to user
      echo $result;

    header("location: ../../pages/facturen.php?insert=succes");
  }
?>
