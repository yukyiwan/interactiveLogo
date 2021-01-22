<?php
session_start();
$fName = $_POST["fName"];
$aFName = addslashes ($fName);
$lName = $_POST["lName"];
  $aLName = addslashes ($lName);
$email = $_POST["email"];
$message = $_POST["message"];
  $aMessage = addslashes ($message);

include("includes/db-config.php");
$stmt = $pdo->prepare ("INSERT INTO `contact` (`contactId`, `fName`, `lName`, `email`, `message`, `timeStamp`) VALUES (NULL, '$aFName', '$aLName', '$email', '$aMessage', NULL);");
$stmt->execute();

header("Location: index.php");

?>