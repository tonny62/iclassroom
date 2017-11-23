<?php
  $mysqli = new mysqli('localhost', 'root', 'root', 'iclassroom');
  if($mysqli->connect_errno){
    #echo "Connection Error";
  }else{
    #echo "Connection Success";
  }
 ?>
