<?php
// Verkrijg de PHP oprachten van Van Helden
function getKlanten(){

  include "connect.php";

  $query = "SELECT * FROM klant";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $klant_id = $row["klant_id"];
      $klant_naam = $row["klant_naam"];
      $klant_email = $row["klant_email"];
      $klant_adres = $row["klant_adres"];
      $klant_postcode = $row["klant_postcode"];
      $klant_woonplaats = $row["klant_woonplaats"];

      echo "<tr>";
        echo "<td>". $klant_id ."</td>";
        echo "<td>". $klant_naam ."</td>";
        echo "<td>". $klant_email ."</td>";
        echo "<td>". $klant_adres ."</td>";
        echo "<td>". $klant_postcode ."</td>";
        echo "<td>". $klant_woonplaats ."</td>";
        echo "</tr>";
      }
    }
}

// Verkrijg de PHP oprachten van Van Helden
function getOffertes(){

  include "connect.php";

  $query = "
  SELECT
  offerte.offertenummer,
  offerte.offerte_werkzaamheden,
  offerte.offerte_prijs,
  offerte.offertedatum,
  offerte.offerte_status,
  klant.klant_naam
  FROM offerte_regel
  JOIN offerte ON offerte_regel.offerte_id = offerte.offertenummer
  JOIN klant ON offerte_regel.klant_id = klant.klant_id;
  ";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $offerte_id = $row["offertenummer"];
      $offerte_werkzaamheden = $row["offerte_werkzaamheden"];
      $offerte_prijs = $row["offerte_prijs"];
      $offerte_datum = $row["offertedatum"];
      $offerte_status = $row["offerte_status"];
      $offerte_klant = $row["klant_naam"];


      echo "<tr>";
        echo "<td>". $offerte_id ."</td>";
        echo "<td>". $offerte_werkzaamheden ."</td>";
        echo "<td>". $offerte_prijs ."</td>";
        echo "<td>". $offerte_datum ."</td>";
        echo "<td>". $offerte_status ."</td>";
        echo "<td>". $offerte_klant ."</td>";
        echo "</tr>";
      }
    }
}

function getFacturen(){

  include "connect.php";

  $query = "SELECT * FROM factuur";
  $result = $conn->query($query);

  if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
      $klant_id = $row["klant_id"];
      $klant_naam = $row["klant_naam"];
      $klant_email = $row["klant_email"];
      $klant_adres = $row["klant_adres"];
      $klant_postcode = $row["klant_postcode"];
      $klant_woonplaats = $row["klant_woonplaats"];

      echo "<tr>";
        echo "<td>". $klant_id ."</td>";
        echo "<td>". $klant_naam ."</td>";
        echo "<td>". $klant_email ."</td>";
        echo "<td>". $klant_adres ."</td>";
        echo "<td>". $klant_postcode ."</td>";
        echo "<td>". $klant_woonplaats ."</td>";
        echo "</tr>";
      }
    }
}
 ?>
