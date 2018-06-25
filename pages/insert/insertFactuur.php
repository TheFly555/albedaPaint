<!DOCTYPE html>
<html>
  <head>
    <?php include '../../scripts/database.php'; ?>
    <?php include '../../scripts/connect.php' ?>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../../css/style.css">
    <title>Albeda Paint</title>
  </head>
  <body>
    <nav class="navbar-top">
      <div class="logo">
        <a href="../home.php">Albeda Paint</a>
      </div>
      <div class="nav-icon-div">
        <div class="nav-icon"></div>
        <div class="nav-icon"></div>
        <div class="nav-icon"></div>
      </div>
      <div class="administrator-button">
        <a href="#administrator">administrator</a>
      </div>
    </nav>
    <div class="navigation-left">
      <ul class="navigation-left-list">
        <li><a href="../klanten.php">klanten</a></li>
        <li><a href="../offertes.php">Offertes</a></li>
        <li><a href="../facturen.php">Facturen</a></li>
      </ul>
    </div>
    <?php include_once 'templates/errorMessage.php'; ?>
    <div class="container">
      <h1>Factuur aanmaken:</h1>
      <form action="../../scripts/insertFactuur.php" method="post">
        <table class="table-form">
          <tr>
            <td class="formText">
              <h4>Factuur prijs:</h4>
            </td>
            <td>
              <input type="number"class="inputForm" name="insertFactuurPrijs" step='0.01' value='0.00' placeholder='0.00' maxlength="8" required>
            </td>
          </tr>
          <tr>
            <td class="formText">
              <h4>Factuur datum:</h4>
            </td>
            <td><input type="date" class="inputForm" name="insertFactuurDatum" placeholder="Datum" required> </td>
          </tr>
          <tr>
            <td class="formText">
              <h4>Koppel aan een offerte:</h4>
            </td>
            <td>
              <select class="inputForm" name="insertFactuurRegelOffertenummer" required>
                <option value="" disabled selected></option>
                <?php
                  $sqlSelectKlant = "SELECT * FROM offerte";
                  $resultSelectKlant = mysqli_query($conn, $sqlSelectKlant);
                  while ($rowSelectKlant = mysqli_fetch_row($resultSelectKlant)) {
                    echo "<option value='". $rowSelectKlant[0] ."'>".  $rowSelectKlant[0] . " - " . $rowSelectKlant[1]. "</option>";
                  }
                  ?>
              </select>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" class="inputForm" name="insertFactuurSubmit" value="Save"> </td>
          </tr>
        </table>
      </form>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script> JQuiry libriary-->
    <!-- <script src="Projects/overzicht/js/bootstrap.js"></script> -->
  </body>
</html>
