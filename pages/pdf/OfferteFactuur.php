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
    <?php
      $query = 'SELECT * FROM factuur Where factuurnummer = 2';
      $result = $conn->query($query);

      if ($result->num_rows > 0) {
        while($row = $result->fetch_assoc()) {
          $factuur_nummer = $row['factuurnummer'];
          $factuur_datum = $row['factuurdatum'];
          $factuur_prijs = $row['factuur_prijs'];
          }
        }
     ?>

    <div class='container'>
      <h4>aan:</h4>
      <div class='klant'>
        <h5>De heer/mevrouw Thijs de vlieger
          <br>
          Baljuwerf 18<br>
          3264 SK<br>
          Nieuw-Beijerland <br><br>
          <div class='factuurDetails'>
              Factuurnummer: <?php  $factuur_nummer ?> <br>
              Factuurdatum: 6-26-2018 <br>
              Factuur prijs: 10,10 euro
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
