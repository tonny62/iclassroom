<?php
  require_once('connect.php');
  if ($_POST['id'] == '' OR $_POST['pid']=='' OR $_POST['password']=='') {
    header('location: register.php?status=incorrect input data, please try again');
  }else {
    $q = "SELECT COUNT(*) as c FROM student WHERE student.idstudent = '".$_POST['id']."' AND student.personalid ='".$_POST['pid']."';";
    $result = $mysqli->query($q);
    if(!$result){
      echo $mysqli->error;
    }else {
      $row = $result->fetch_assoc();
      $cnt_student = $row['c'];
    }
    $q = "SELECT COUNT(*) as c FROM teacher WHERE teacher.idteacher = '".$_POST['id']."' AND teacher.personalid ='".$_POST['pid']."';";
    $result = $mysqli->query($q);
    if(!$result){
      echo $mysqli->error;
    }else {
      $row = $result->fetch_assoc();
      $cnt_teacher = $row['c'];
    }
    if($cnt_teacher OR $cnt_student){
      $q = "INSERT INTO user VALUES('".$_POST['id']."','".$_POST['password']."')";
      $result = $mysqli->query($q);
      if(!$result){
        header('Location: register.php?status=already register, please log in');
      }else{
        header('Location: index.php?status=register success');
      }
    }else{
      header('Location: register.php?status=incorrect input data, please try again');

    }
  }
 ?>
