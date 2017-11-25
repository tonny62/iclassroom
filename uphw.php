<?php
  // echo $_POST['sectid']." ".$_POST['duedate']." ".$_POST['topic'];
  require_once('connect.php');
  session_start();
  $filename = $_FILES['file']['name'];
  $ext = pathinfo($filename, PATHINFO_EXTENSION);
  if(move_uploaded_file($_FILES['file']["tmp_name"],"file/".$filename))
  {
  	$q = "INSERT INTO homework VALUES (NULL,'".$_POST['sectid']."','".$_POST['topic']."','".$_POST['duedate']."','".$filename."');";
    // echo "$q";
    $result = $mysqli->query($q);
    $last_id = $mysqli->insert_id;
    // echo "$last_id";
    $mypath = "homework/".$last_id;
    mkdir($mypath, 0700);
    header('Location: thomework.php');
  }
 ?>
