<?php
  session_start();
  require_once('connect.php');
  foreach ($_SESSION['cart'] as $key => $value) {
    $q = "INSERT INTO section_has_student VALUES ('".$_SESSION['user']['idstudent']."','".$value."')";
    // echo "$q<br>";
    $result = $mysqli->query($q);
  }
  $_SESSION['cart'] = array();
  $_SESSION['cartsubject'] = array();
  header('Location: timetable.php');
 ?>
