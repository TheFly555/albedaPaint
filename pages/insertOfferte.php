

<!DOCTYPE html>
<html>
   <head>
     <?php include '../scripts/databese.php'; ?>
     <?php include '../scripts/connect.php' ?>
      <meta charset="utf-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link rel="stylesheet" href="../css/style.css">
      <title>Albeda Paint</title>
   </head>
   <body>
      <nav class="navbar-top">
         <div class="logo">
            <a href="home.php">Albeda Paint</a>
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
            <li><a href="klanten.php">klanten</a></li>
            <li><a href="#">Offertes</a></li>
            <li><a href="#">Facturen</a></li>
         </ul>
      </div>
      <?php include_once 'templates/errorMessage.php'; ?>
      <div class="container">
         <h1>offerte aanmaken:</h1>
         <form action="../scripts/insertOfferte.php" method="post">
            <table class="table-form">
              <tr>
                <td class="formText">
                  <h4>Offerte werkzaamheden:</h4>
                </td>
                <td>
                  <textarea name="insertOfferteWerkzaamheden" rows="5" cols="35" maxlength="255" placeholder="Offerte Werkzaamheden" required></textarea>
                </td>
              </tr>
              <tr>
                <td class="formText">
                  <h4>Offerte prijs:</h4>
                </td>
                <td>
                  <input type="number"class="inputForm" name="insertOffertePrijs" placeholder="Prijs" maxlength="8" step="0.01" pattern="^\d+(?:\.\d{1,2})?$" required>
                </td>
              </tr>
               <tr>
                  <td class="formText">
                     <h4>Offerte datum:</h4>
                  </td>
                  <td><input type="date" class="inputForm" name="insertOfferteDate" placeholder="Datum" required> </td>
               </tr>
               <tr>
                  <td></td>
                  <td><input type="submit" class="inputForm" name="insertOfferteSubmit" value="Save"> </td>
               </tr>
            </table>
          </form>
          <hr>

          <h2>Koppel een offerte aan een klant</h2>
          <form action="../scripts/insertOfferteRegel.php" method="post">
            <table class="table-form">
              <tr>
                <td class="formText">
                  <h4>Selecteer klant:</h4>
                </td>
                <td>
                  <select class="inputForm" name="selectKlant" required>
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
                <td class="formText">
                  <h4>Selecteer offerte:</h4>
                </td>
                <td>
                  <select class="inputForm" name="selectOfferte" required>
                    <option value="" disabled selected></option>
                    <?php
                      $sqlSelectOfferte = "SELECT * FROM offerte";
                      $resultSelectOfferte = mysqli_query($conn, $sqlSelectOfferte);
                      while ($rowSelectOfferte = mysqli_fetch_row($resultSelectOfferte)) {
                        echo "<option value='". $rowSelectOfferte[0] ."'>". $rowSelectOfferte[2] . " - " . $rowSelectOfferte[3] . "</option>";
                      }
                      ?>
                  </select>
                </td>
              </tr>
              <tr>
                <td></td>
                <td>
                  <input class="inputForm" type="submit" name="insertOfferteRegelSubmit" value="Save">
                </td>
              </tr>
            </table>
          </form>
      </div>

      <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script> JQuiry libriary-->
      <!-- <script src="Projects/overzicht/js/bootstrap.js"></script> -->
   </body>
</html>
