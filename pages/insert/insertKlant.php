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
      <h1>Klant toevoegen:</h1>
      <form action="../../scripts/insert/insertklant.php" method="post">
        <table class="table-form">
          <tr>
            <td class="formText">
              <h4>Naam</h4>
            </td>
            <td><input type="text" class="inputForm" name="insertKlantNaam" placeholder="Naam" maxlength="55" required> </td>
          </tr>
          <tr>
            <td class="formText">
              <h4>E-mail</h4>
            </td>
            <td><input type="email" class="inputForm" name="insertKlantEmail" placeholder="E-mail" maxlength="110" required></td>
          </tr>
          <tr>
            <td class="formText">
              <h4>Straatnaam + nummer:</h4>
            </td>
            <td><input type="text" class="inputForm" name="insertKlantAdres" placeholder="adres" maxlength="110" required></td>
          </tr>
          <tr>
            <td class="formText">
              <h4>Postcode:</h4>
            </td>
            <td><input type="text" class="inputForm" name="insertKlantPostcode" placeholder="Postcode" maxlength="7" required></td>
          </tr>
          <tr>
            <td class="formText">
              <h4>Woonplaats:</h4>
            </td>
            <td><input type="text" class="inputForm" name="insertKlantWoonplaats" placeholder="Woonplaats" maxlength="55" required></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" class="inputForm" name="insertKlantSubmit" value="Save"> </td>
          </tr>
        </table>
      </form>
      <br><br><br>
      <form class="" action="../../scripts/insert/insertmemo.php" method="post">
        <table class="table-form">
          <tr>
            <td  class="formText">
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
              <h4>memo:</h4>
            </td>
            <td>  <textarea rows="4" cols="50" name="insertMemo"></textarea></td>
          </tr>
          <tr>
            <td></td>
            <td><input type="submit" class="inputForm" name="insertMemoSubmit" value="Save"> </td>
          </tr>
        </table>
      </form>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script> JQuiry libriary-->
    <!-- <script src="Projects/overzicht/js/bootstrap.js"></script> -->
  </body>
</html>
