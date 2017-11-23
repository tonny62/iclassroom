<?php
  session_start();
  require_once('connect.php');
  $_SESSION['user'];
  $_SESSION['cart'];
  foreach ($_SESSION['cart'] as $key => $value) {
    $q = "INSERT INTO section_has_student VALUES ('".$_SESSION['user']['iduser']."','".$value."')";
    // echo "$q<br>";
    $result = $mysqli->query($q);
  }
  $_SESSION['cart'] = array();
  header('Location: timetable.php');
 ?>
