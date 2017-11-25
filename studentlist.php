<?php
  require_once('components.php');
  require_once('connect.php');
  session_start();
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
  <?php if (isset($_SESSION['user']['idstudent'])): ?>
    <?php navbar(); ?>
  <?php else: ?>
    <?php navbar_t(); ?>
  <?php endif; ?>

 <section class="section">
   <div class="container">
     <div class="columns">
       <div class="column is-2">

       </div>
       <div class="column is-centered content">
         <table class="table">
           <thead>
             <tr>
               <th>ID</th>
               <th>Name</th>
               <th>See Schedule</th>
               <th>Sent Message</th>
             </tr>
           </thead>
           <tbody>
             <?php
             $q = "SELECT * FROM student WHERE idmajor='".$_SESSION['user']['idmajor']."';";
             $result = $mysqli->query($q);
             while ($row = $result->fetch_array()) {
               echo "<tr><td>".$row['idstudent']."</td><td>".$row['fname']." ".$row['lname']."</td><td><a href='otimetable.php?id=".$row['idstudent']."' class='button is-link'>See Schedule</a></td><td><a href='mailbox.php?tab=create&id=".$row['idstudent']."' class='button is-primary'>Send Message</a></td></tr>";
             }
              ?>
           </tbody>
         </table>
       </div>
       <div class="columns is-2">

       </div>




     </div>

   </div>
 </section>


</body>

</html>
