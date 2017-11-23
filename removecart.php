<?php
  session_start();
  array_splice($_SESSION['cart'],$_GET['cartid'],1);
  array_splice($_SESSION['cartsubject'],$_GET['cartid'],1);
  header('Location: addremove.php');
 ?>
