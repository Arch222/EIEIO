<?php
session_start();
if(!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true){
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <title>EIEIO</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, height = device-height, initial-scale=1">
  <link rel="stylesheet" href="navbar.css">
  <link rel = "stylesheet" href = "style.css">
</head>
<body>


<div class="container">
  <span><img src = 'Test.jpeg' alt = "EIEIO" style = 'width: 300px; height: 300px'></span>
      <h4>App_Name: Save money while helping to save the environment</h4>

      <nav>
        <ul>
          <li><a class = "button" href="index.php">Home</a></li>
          <li><a class = "button" href="map.php">Transportation Statistics to get to a certain location</a></li>
          <li><a class = "button" href="#">Other ways to help the environment: track how your friends are doing!</a></li>
          <li><a class = "button" href="#">Become a community driver!</a></li>
          <li><a class = "button" href = '#'>Research options for delivery</a></li>
        </ul>
      </nav>
    </div>
  </body>
