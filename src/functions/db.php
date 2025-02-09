<?php 

  $connect = mysqli_connect("localhost", "root", "KaliShau", "php");

  if (!$connect) {
    die("Connection failed: " . mysqli_connect_error());
  } 
  
  return $connect;
  
?>