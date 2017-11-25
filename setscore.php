<?php
  require_once('connect.php');
  $q = "UPDATE `submithistory` SET `score` = '".$_GET['score']."' WHERE idstudent = '".$_GET['studentid']."' AND idhomework = '".$_GET['hwid']."';";
  $result = $mysqli->query($q);
  header('Location: thomework.php?tab=grade&id='.$_GET['hwid'].'');
 ?>
