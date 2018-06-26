<?php
  //include database connect file
  include_once '../connect.php';

  //Constanten
  $selectDeleteOfferte = $_POST['selectDeleteOfferte'];
  $submitDeleteOfferte = $_POST['submitDeleteOfferte'];

  //if Condition: check if submit button is clicked and redirect
  if (!isset($submitDeleteOfferte)) {
      header("location: ../../pages/deleteOfferte.php?insert=notSubmitted");
  }
  //Else condition: Add entry to the database
  else {
      $sqldeleteOfferte = "DELETE FROM offerte WHERE offertenummer = $selectDeleteOfferte;";
      mysqli_query($conn, $sqldeleteOfferte);
      header("location: ../../pages/offertes.php?delete=succes");
  }

?>
