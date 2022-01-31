 <?php
  $servername = "localhost";
  $username = "root";
  $password = "";
  $err = "";
  $conn =  mysqli_connect($servername, $username, $password);

  function hasEnding($str, $substr)
  {
    return strrpos($str, $substr) === strlen($str) - strlen($substr);
  }

  if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
  }
  //creates db and table if it doesnt exist
  $sql = 'CREATE DATABASE IF NOT EXISTS test;';
  if (mysqli_query($conn, $sql)) {
    mysqli_select_db($conn, 'test');
    $sql = 'CREATE TABLE IF NOT EXISTS email ( Id INT NOT NULL AUTO_INCREMENT , email VARCHAR(255) NOT NULL , PRIMARY KEY (`Id`)); ';
    mysqli_query($conn, $sql);
  } else {
    echo "failed " . mysqli_error($conn);
  }
  ?>