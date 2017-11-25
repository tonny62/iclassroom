<?php
  require_once('connect.php');
  $q = "DELETE FROM ".$_GET['table']." WHERE id".$_GET['table']."=".$_GET['id']."; ";
  // echo "$q";
  $mysqli->query($q);
 ?>
