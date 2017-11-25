<?php
  require_once('components.php');
  require_once('helperfunctions.php');
  require_once('connect.php');
  session_start();
  if(!isset($_GET['id'])){
    header('Location: studentlist.php');
  }
?>

<!DOCTYPE html>
<html>

<head>
 <meta charset="utf-8">
 <meta name="viewport" content="width=device-width, initial-scale=1">
 <title>Log in</title>
 <link rel="stylesheet" href="css/font-awesome-4.7-1.0/css/font-awesome.min.css">
 <link rel="stylesheet" href="css/bulma.min.css">
 <!-- <link rel="stylesheet" href="bulma/css/bulma.css"> -->
</head>

<body>

  <?php if (isset($_SESSION['user']['idteacher'])): ?>
    <?php navbar_t(); ?>
  <?php else: ?>
    <?php navbar(); ?>
  <?php endif; ?>

 <section class="section">
   <div class="container">
     <div class="columns">
       <div class="column is-2">

       </div>
       <div class="column content is-centered">
         <?php

         $id = $_GET['id'];
          $q = "SELECT * FROM studentslot WHERE idstudent = ".$id.";";
          $result = $mysqli->query($q);
          $myslot = array();
          $subject = array();
          while ($row = $result->fetch_assoc()) {
            array_push($myslot, $row['slot1']);
            array_push($myslot, $row['slot2']);
            array_push($subject,$row['idsection']);
          }
          ?>
         <table class="table">
           <tr>
             <th>Day/Time</th>
             <th>9.00-10.20</th>
             <th>10.40-12.00</th>
             <th>12.00-13.00</th>
             <th>13.00-14.20</th>
             <th>14.40-16.00</th>
           </tr>
           <tr>
             <th>Mon</th>
             <td><?php searchreturn($myslot,$subject,1,$mysqli); ?></td>
             <td><?php searchreturn($myslot,$subject,2,$mysqli); ?></td>
             <td> </td>
             <td><?php searchreturn($myslot,$subject,3,$mysqli); ?></td>
             <td><?php searchreturn($myslot,$subject,4,$mysqli); ?></td>
           </tr>
           <tr>
             <th>Tue</th>
             <td><?php searchreturn($myslot,$subject,5,$mysqli); ?></td>
             <td><?php searchreturn($myslot,$subject,6,$mysqli); ?></td>
             <td> </td>
             <td><?php searchreturn($myslot,$subject,7,$mysqli); ?></td>
             <td><?php searchreturn($myslot,$subject,8,$mysqli); ?></td>
           </tr>
           <tr>
             <th>Wed</th>
             <td><?php searchreturn($myslot,$subject,9,$mysqli); ?></td>
             <td><?php searchreturn($myslot,$subject,10,$mysqli); ?></td>
             <td> </td>
             <td><?php searchreturn($myslot,$subject,11,$mysqli); ?></td>
             <td><?php searchreturn($myslot,$subject,12,$mysqli); ?></td>
           </tr>
           <tr>
             <th>Thu</th>
             <td><?php searchreturn($myslot,$subject,13,$mysqli); ?></td>
             <td><?php searchreturn($myslot,$subject,14,$mysqli); ?></td>
             <td> </td>
             <td><?php searchreturn($myslot,$subject,15,$mysqli); ?></td>
             <td><?php searchreturn($myslot,$subject,16,$mysqli); ?></td>
           </tr>
           <tr>
             <th>Fri</th>
             <td><?php searchreturn($myslot,$subject,17,$mysqli); ?></td>
             <td><?php searchreturn($myslot,$subject,18,$mysqli); ?></td>
             <td> </td>
             <td><?php searchreturn($myslot,$subject,19,$mysqli); ?></td>
             <td><?php searchreturn($myslot,$subject,20,$mysqli); ?></td>
           </tr><tr>
             <th>Sat</th>
             <td><?php searchreturn($myslot,$subject,21,$mysqli); ?></td>
             <td><?php searchreturn($myslot,$subject,22,$mysqli); ?></td>
             <td> </td>
             <td><?php searchreturn($myslot,$subject,23,$mysqli); ?></td>
             <td><?php searchreturn($myslot,$subject,24,$mysqli); ?></td>
           </tr>

         </table>
       </div>
       <div class="column is-2">

       </div>
     </div>
       <a href="addremove.php" class="button is-link">Add/Remove Subject</a>
   </div>
 </section>


</body>

</html>
