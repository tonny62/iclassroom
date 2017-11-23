<?php
  session_start();
  if( array_search($_SESSION['cursubject'],$_SESSION['cartsubject']) !== false){
    header('Location: addremove.php?status=Cannot Add, Duplicate Subject!');
  }else{
    array_push($_SESSION['cart'],$_POST['sectid']);
    array_push($_SESSION['cartsubject'], $_SESSION['cursubject']);

    header('Location: addremove.php');
  }


 ?>
