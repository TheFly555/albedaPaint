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
        <li><a href="../klanten.php">Klanten</a></li>
        <li><a href="../offertes.php">Offertes</a></li>
        <li><a href="../facturen.php">Facturen</a></li>
      </ul>
    </div>
    <?php include_once 'templates/errorMessage.php'; ?>
    <div class="container">
      <h1>Downlaod factuur als PDF file:</h1>
      <form action="../../scripts/download/downloadFactuurPdf.php" method="post">
        <table class="table-form">
          <tr>
            <td class="formText">
              <h4>kies een factuur:</h4>
            </td>
            <td>
              <select class="inputForm" name="selectDownloadFactuur" required>
                <option value="" disabled selected></option>
                <?php
                  $sqlSelectFactuur =
                 "SELECT factuur.factuurnummer, factuur.factuurdatum, factuur.factuur_prijs, klant.klant_id, klant.klant_naam, klant.klant_adres, klant.klant_postcode, klant.klant_woonplaats
                  FROM offerte_regel
                  JOIN offerte ON offerte_regel.offertenummer = offerte.offertenummer
                  JOIN factuur ON offerte_regel.factuurnummer = factuur.factuurnummer
                  JOIN klant ON offerte.klant_id = klant.klant_id;";

                  $resultSelectFactuur = mysqli_query($conn, $sqlSelectFactuur);
                  while ($rowSelectFactuur = mysqli_fetch_row($resultSelectFactuur)) {
                    echo "<option value='". $rowSelectFactuur[0] ."'>". "Factuur: " . $rowSelectFactuur[0] . " - " . $rowSelectFactuur[4] . "</option>";
                  }
                  ?>
              </select>
            </td>
          </tr>
          <tr>
            <td class="formText">
              <h4>Kies een klant:</h4>
            </td>
            <td>
              <select class="inputForm" name="selectDownloadKlant" required>
                <option value="" disabled selected></option>
                <?php
                  $sqlSelectKlant =
                 "SELECT factuur.factuurnummer, factuur.factuurdatum, factuur.factuur_prijs, klant.klant_id, klant.klant_naam, klant.klant_adres, klant.klant_postcode, klant.klant_woonplaats
                  FROM offerte_regel
                  JOIN offerte ON offerte_regel.offertenummer = offerte.offertenummer
                  JOIN factuur ON offerte_regel.factuurnummer = factuur.factuurnummer
                  JOIN klant ON offerte.klant_id = klant.klant_id;";

                  $resultSelectKlant = mysqli_query($conn, $sqlSelectKlant);
                  while ($rowSelectKlant = mysqli_fetch_row($resultSelectKlant)) {
                    echo "<option value='". $rowSelectKlant[0] ."'>". "Factuur: " . $rowSelectKlant[0] . " - " . $rowSelectKlant[4] . "</option>";
                  }
                  ?>
              </select>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" class="inputForm" name="downloadPdfSubmit" value="Download"> </td>
          </tr>
        </table>
      </form>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script> JQuiry libriary-->
    <!-- <script src="Projects/overzicht/js/bootstrap.js"></script> -->
  </body>
</html>
