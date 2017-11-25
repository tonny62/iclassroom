<?php
  require_once('connect.php');
  session_start();
  $q = "SELECT * FROM ".$_POST['totable'].";";
  $result = $mysqli->query($q);
  $row = $result->fetch_assoc();
  $myquery = "UPDATE ".$_POST['totable']." SET";
  foreach ($row as $key => $value) {
    if($key=='personalid'){
    }else {
      $myquery = $myquery." ".$key."='".$_POST[$key]."',";
    }
  }
  $myquery = mb_strimwidth($myquery, 0, (mb_strwidth($myquery)-1));
  $mykey = 'id'.$_POST['totable'];
  $myquery = $myquery." WHERE id".$_POST['totable']." = ".$_POST[$mykey].';';
  // echo $myquery;
  $logquery = 'INSERT INTO `log` (`idlog`, `timestamp`, `iduser`, `query`) VALUES (NULL, CURRENT_TIMESTAMP, "'.$_SESSION['user']['idteacher'].'", "'.$myquery.'");';

  // echo "<br>$logquery";
  $mysqli->query($myquery);
  $mysqli->query($logquery);
  header('location: sysadmin.php'); ?>
