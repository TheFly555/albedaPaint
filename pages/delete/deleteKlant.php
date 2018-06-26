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
      <h1>Klant verwijderen:</h1>
      <form action="../../scripts/delete/deleteklant.php" method="post">
        <table class="table-form">
          <tr>
            <td class="formText">
              <h4>Selecteer klant: </h4>
            </td>
            <td>
              <select class="inputForm" name="selectDeleteKlant" required>
                <option value="" disabled selected></option>
                <?php
                  $sqlDelKlant = "SELECT * FROM klant";
                  $resultDelKlant = mysqli_query($conn, $sqlDelKlant);
                  while ($rowDelKlant = mysqli_fetch_row($resultDelKlant)) {
                    echo "<option value='". $rowDelKlant[0] ."'>". $rowDelKlant[1] . "</option>";
                  }
                  ?>
              </select>
              <p style="font-size: 7px">*alle gerelateerde offertes worden ook verwijderd.</p>
            </td>
          </tr>
          <br>
          <tr>
            <td>
              <h4></h4>
            </td>
            <td><button class="inputForm" name="submitDeleteKlant">Save</button></td>
          </tr>
        </table>
      </form>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script> JQuiry libriary-->
    <!-- <script src="Projects/overzicht/js/bootstrap.js"></script> -->
  </body>
</html>
