<?php
  //include database connect file
  include_once 'connect.php';

  //Constanten
  $selectKlant = $_POST['selectKlant'];
  $insertMemo = $_POST['insertMemo'];
  $insertMemoSubmit = $_POST['insertMemoSubmit'];

  //if Condition: check if submit button is clicked and redirect
  if (!isset($insertMemoSubmit)) {
    header("location: ../pages/insertKlant.php?insert=notSubmitted");
  }
  //Else condition: Add entry to the database
  else{
    $sqlInsert = "UPDATE klant SET klant_memo='$insertMemo' WHERE id = $selectKlant";
    mysqli_query($conn, $sqlInsert);
    header("location: ../pages/klanten.php?insert=succes");
  }

?>
