<?php
  // $q = "SELECT"
  if ($_POST['username']!='' AND $_POST['password']!='') {
    // echo $_POST['username'];
    // echo "<br>";
    // echo $_POST['password'];
    require_once('connect.php');
    $q = "SELECT * FROM student WHERE idstudent = '".$_POST['username']."' AND personalid ='".$_POST['password']."';";
    $result = $mysqli->query($q);
    $row = $result->fetch_assoc();
    if(!$row){
      $q = "SELECT * FROM teacher WHERE idteacher = '".$_POST['username']."' AND personalid ='".$_POST['password']."';";
      $result = $mysqli->query($q);
      $row2 = $result->fetch_assoc();
      if(!$row2){
        header('location: index.php?status=incorrect');
      }else{
        session_start();
        $_SESSION['user'] = $row2;
        header('location: tdashboard.php');

      }
    }else{
      session_start();
      $_SESSION['user'] = $row;
      $_SESSION['mysection'] = array();
      $q = "SELECT idsection FROM section_has_student WHERE idstudent = '".$_POST['username']."';";
      $result = $mysqli->query($q);
      while ($row = $result->fetch_assoc()) {
        array_push($_SESSION['mysection'], $row['idsection']);
      }
      header('location: dashboard.php');
    }
    // header('location: dashboard.php');
  }else{

    header('location: dashboard.php');
    // header('location: index.php?status=incorrect');
  }
 ?>
