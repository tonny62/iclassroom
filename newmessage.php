<?php
  require_once('connect.php');
  session_start();
  if(!isset($_SESSION['uid'])){
    if (isset($_SESSION['user']['idteacher'])){
      $_SESSION['uid'] = $_SESSION['user']['idteacher'];
    }else{
      $_SESSION['uid'] = $_SESSION['user']['idstudent'];
    }
  }

  $q = "INSERT INTO `message` (`idmessage`, `idfrom`, `idto`, `topic`, `message`, `timestamp`) VALUES (NULL, '".$_SESSION['uid']."', '".$_POST['idto']."', '".$_POST['topic']."', '".$_POST['message']."', CURRENT_TIMESTAMP);";
  $mysqli->query($q);
  // echo "$q";
  header('Location: mailbox.php');

 ?>
