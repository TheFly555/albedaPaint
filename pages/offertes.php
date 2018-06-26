<!DOCTYPE html>
<html>
  <head>
    <?php include '../scripts/database.php'; ?>
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
        <li><a href="klanten.php">Klanten</a></li>
        <li><a href="offertes.php">Offertes</a></li>
        <li><a href="facturen.php">Facturen</a></li>
      </ul>
    </div>
    <div class="container">
      <h3>Offertes:</h3>
      <table class="offerte-table">
        <tr>
          <th>Offerte nummer</th>
          <th>Offerte werkzaamheden</th>
          <th>Offerte prijs</th>
          <th>Offerte datum</th>
          <th>Status</th>
          <th>Klant</th>
        </tr>
        <?php getOffertes() ?>
      </table>
      <br><br>
      <a href="insert/insertOfferte.php" class="link">- <u>Maak een offerte aan</u></a><br>
      <a href="update/updateOfferte.php" class="link">- <u>Verander offerte</u></a><br>
      <a href="delete/deleteOfferte.php" class="link">- <u>verwijder offerte</u></a><br>
      <!-- <a href="updateKlant.php">- Verander een klant</a><br>
        <a href="deleteKlant.php">- Verwijder een klant</a> -->
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script> JQuiry libriary-->
    <!-- <script src="Projects/overzicht/js/bootstrap.js"></script> -->
  </body>
</html>
