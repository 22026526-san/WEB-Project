<?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $data = "web_caulong";
  $port = 3308;

  $conn = new mysqli($servername, $username, $password, $data, $port);

  if($conn->connect_errno){
    die("error" . $conn->connect_errno);
  }
?>