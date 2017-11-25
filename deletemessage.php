<?php
  require_once('connect.php');
  $q = "DELETE FROM `message` WHERE `message`.`idmessage` = '".$_GET['id']."';";
  $mysqli->query($q);
  header('location: mailbox.php');
 ?>
