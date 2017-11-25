<?php
  require_once('connect.php');
  session_start();
  if (isset($_SESSION['user']['idteacher'])) {
    $q = "UPDATE teacher SET teacher.fname = '".$_POST['fname']."', teacher.lname = '".$_POST['lname']."';";
  }else{
    $q = "UPDATE student SET student.fname = '".$_POST['fname']."', student.lname = '".$_POST['lname']."';";
  }
  // echo "$q";
  $mysqli->query($q);
  if (isset($_SESSION['user']['idteacher'])) {
    $q = "SELECT * FROM teacher WHERE idteacher = '".$_SESSION['user']['idteacher']."';";
  }else{
    $q = "SELECT * FROM student WHERE idstudent = '".$_SESSION['user']['idstudent']."';";
  }
  $result = $mysqli->query($q);
  // echo "$q";
  $row = $result->fetch_assoc();
  $_SESSION['user'] = $row;
  header('Location: profile.php');
 ?>
