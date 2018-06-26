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
    <?php include_once '../templates/errorMessage.php'; ?>
    <div class="container">
      <h1>Offerte veranderen:</h1>
      <form action="../../scripts/update/updateOfferte.php" method="post">
        <table class="table-form">
          <tr>
            <td class="formText">
              <h4>Selecteer offerte:</h4>
            </td>
            <td>
              <select class="inputForm" name="SelectOfferteUpdate" required>
                <option value="" disabled selected></option>
                <?php
                  $sqlSelectOfferte = "SELECT offerte.offertenummer, offerte.offerte_werkzaamheden, offerte.offerte_prijs, offerte.offertedatum, offerte.offerte_status, klant.klant_naam
                                       FROM offerte JOIN klant ON offerte.klant_id = klant.klant_id";
                  $resultSelectOfferte = mysqli_query($conn, $sqlSelectOfferte);
                  while ($rowSelectOfferte = mysqli_fetch_row($resultSelectOfferte)) {
                    echo "<option value='". $rowSelectOfferte[0] ."'>". $rowSelectOfferte[0] . " - " . $rowSelectOfferte[5] . ": " . $rowSelectOfferte[1] . "</option>";
                  }
                  ?>
              </select>
            </td>
          </tr>
          <tr>
            <td colspan="2">
              <center>
                <h4>veranderen in:</h4>
              </center>
            </td>
          </tr>
          <tr>
            <td class="formText">
              <h4>Naam</h4>
            </td>
            <td><textarea name="updateWerkzaamhedenOfferte" rows="5" cols="36" maxlength="255" placeholder="Offerte Werkzaamheden" required></textarea></td>
          </tr>
          <tr>
            <td class="formText">
              <h4>Offerte prijs:</h4>
            </td>
            <td>
              <input type="number"class="inputForm" name="updatePrijsOfferte" placeholder="0.00" maxlength="8" step="0.01" required>
            </td>
          </tr>
          <tr>
            <td class="formText">
              <h4>Offerte datum:</h4>
            </td>
            <td><input type="date" class="inputForm" name="updateDatumOfferte" placeholder="Datum" required> </td>
          </tr>
          <tr>
            <td class="formText">
              <h4>Offerte Status</h4>
            </td>
            <td>
              <select class="inputForm" name="updateStatusOfferte">
                <option value="" disabled selected></option>
                <option value="Nieuw">Nieuw</option>
                <option value="Staat open">Staat open</option>
                <option value="Bevestigd">Bevestigd</option>
                <option value="Verlopen">Verlopen</option>
              </select>
            </td>
          </tr>
          <tr>
            <td class="formText">
              <h4>Koppel aan klant:</h4>
            </td>
            <td>
              <select class="inputForm" name="updateGekoppeldeKlantOfferte" required>
                <option value="" disabled selected></option>
                <?php
                  $sqlSelectKlant = "SELECT * FROM klant";
                  $resultSelectKlant = mysqli_query($conn, $sqlSelectKlant);
                  while ($rowSelectKlant = mysqli_fetch_row($resultSelectKlant)) {
                    echo "<option value='". $rowSelectKlant[0] ."'>". $rowSelectKlant[1] . "</option>";
                  }
                  ?>
              </select>
            </td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" class="inputForm" name="updateOfferteSubmit" value="Save"> </td>
          </tr>
        </table>
      </form>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script> JQuiry libriary-->
    <!-- <script src="Projects/overzicht/js/bootstrap.js"></script> -->
  </body>
</html>
