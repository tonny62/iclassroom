<?php
  require_once('connect.php');
  session_start();
  $filename = $_FILES['file']['name'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  if(move_uploaded_file($_FILES['file']["tmp_name"],"homework/".$_POST['hwid']."/".$_SESSION['user']['idstudent'].".".$ext))
  {
  	$q = "INSERT INTO submithistory VALUES (NULL,'".$_SESSION['user']['idstudent']."','".$_POST['hwid']."',NOW(),'pending');";
    $result = $mysqli->query($q);
    header('Location: homework.php');
  }

?>
