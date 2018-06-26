<?php
include_once '../connect.php';
$query = 'SELECT * FROM factuur, klant Where factuurnummer = 2 AND klant_id = ';
$result = $conn->query($query);

if ($result->num_rows > 0) {
  while($row = $result->fetch_assoc()) {
    $factuur_nummer = $row['klant_naam'];
    $factuur_datum = $row['factuurdatum'];
    $factuur_prijs = $row['factuur_prijs'];
    $klant_id = $row['klant_id'];
    $klant_naam = $row['klant_naam'];
    $klant_adres = $row['klant_adres'];
    $klant_postcode = $row['klant_postcode'];
    $klant_woonplaats = $row['klant_woonplaats'];
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
  </head>
  <body>
    <div class='container'>
      <h4>aan:</h4>
      <div class='klant'>
        <h5>De heer/mevrouw ".  $klant_naam . "
          <br>
          ".  $klant_adres . "<br>
          ".  $klant_postcode . "<br>
          ".  $klant_woonplaats . " <br><br>
          <div class='factuurDetails'>
              Factuurnummer: ".  $factuur_nummer . " <br>
              Factuurdatum: ".  $factuur_datum . " <br>
              Factuur prijs: ".  $factuur_prijs . " euro
          </div>
        </h5>
      </div>

      <h1>Factuur</h1>
      <table style='border: 2px solid black;'>
        <tr>
          <th>Product ID</th>
          <th>Beschrijving</th>
          <th>Aantal</th>
          <th>Prijs</th>
        </tr>
        <tr>
          <td>1</td>
          <td>Nike Schoenen</td>
          <td>2</td>
          <td>134,95</td>
        </tr>
        <tr>
          <td>2</td>
          <td>broeken</td>
          <td>1</td>
          <td>134,95</td>
        </tr>
        <tr>
          <td>3</td>
          <td>Adidas Schoenen</td>
          <td>4</td>
          <td>134,95</td>
        </tr>
        <tr>
          <td>4</td>
          <td>T-shirt</td>
          <td>1</td>
          <td>134,95</td>
        </tr>
        <tr>
          <td>5</td>
          <td>Korte Broek</td>
          <td>1</td>
          <td>134,95</td>
        </tr>
        <tr>
          <td></td>
          <td></td>
          <td></td>
          <td><b>Totaal: 10000,-</b></td>
        </tr>
      </table>
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
header('Content-Disposition: attachment; filename=' . 'alias-name.pdf' );

// Stream PDF to user
echo $result;
 ?>
