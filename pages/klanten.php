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
      <table class="klanten-table">
        <tr>
          <th>ID</th>
          <th>Naam</th>
          <th>Email</th>
          <th>address</th>
          <th>Postcode</th>
          <th>Woonplaats</th>
        </tr>
        <?php getKlanten() ?>
      </table>
      <br><br>
      <a href="insert/insertKlant.php" class="link">- <u>Maak een klant aan</u></a><br>
      <a href="update/updateKlant.php" class="link">- <u>Verander een klant</u></a><br>
      <a href="delete/deleteKlant.php" class="link">- <u>Verwijder een klant</u></a>
    </div>
    <!-- <script src="https://code.jquery.com/jquery-3.2.1.min.js" integrity="sha256-hwg4gsxgFZhOsEEamdOYGBf13FyQuiTwlAQgxVSNgt4="crossorigin="anonymous"></script> JQuiry libriary-->
    <!-- <script src="Projects/overzicht/js/bootstrap.js"></script> -->
  </body>
</html>
