<?php
  $fullUrl = "https://$_SERVER[HTTP_HOST]$_SERVER[REQUEST_URI]";

  //If condition: Alert box if not everythting is filled in
  if (strpos($fullUrl, "insert=invalid_email") == true) {
    echo "<p class='alertText'>Je hebt geen geldige e-mail ingevoerd</p> ";
  }
  //elseIf condition: Alert box dubble combo: stad_id and winkel_id in table: stad_winkel
  elseif (strpos($fullUrl, "insert=notSubmitted") == true) {
    echo "<p class='alertText'>Je hebt niet gesubmit en je bent via de url naar de script pagina gegaan</p> ";
  }
  elseif (strpos($fullUrl, "signup=unvalid_postalcode") == true) {
    echo "<p class='alertText'>Je hebt geen geldige postcode</p> ";
  }
  //elseIf condition: Succes box if everything is valid and the entry is added
  elseif (strpos($fullUrl, "insert=succes") == true) {
    echo "<p class='succesText'>De klant is succesvol toegevoegd</p> ";
  }
 ?>
