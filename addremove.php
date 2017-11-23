<?php
  require_once('components.php');
  require_once('connect.php');
  require_once('helperfunctions.php');
  session_start();
  if (!isset($_SESSION['cart']) OR !isset($_SESSION['cartsubject'])) {
    $_SESSION['cart'] = array();
    $_SESSION['cartsubject'] = array();


  }
  $_SESSION['cartslot1'] = array();
  $_SESSION['cartslot2'] = array();
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

 <?php navbar(); ?>

 <section class="section">
   <div class="container">
     <p>Currently Enrolled</p>
     <div class="columns">
       <div class="column is-2">

       </div>
       <div class="column content is-centered">
         <table>
           <thead>
             <tr>
               <th>no</th>
               <th>SECT ID</th>
               <th>code</th>
               <th>subject</th>
               <th>section</th>
               <th>teacher</th>
               <th>period1</th>
               <th>period2</th>
               <th>remove</th>
             </tr>
           </thead>
           <tbody>
             <?php
             foreach ($_SESSION['cart'] as $key => $value) {
               $q = "SELECT * FROM teachsection WHERE idsection = '".$value."';";
               $result = $mysqli->query($q);
               $row = $result->fetch_assoc();
               echo "<tr><td>".($key+1)."</td>";
               foreach ($row as $k => $v) {
                   // echo "<td>".$v." ".$k."</td>";
                 if ($k == 'slot1' OR $k == 'slot2') {
                   echo "<td>".returntimeslot($v)."</td>";
                   if($k == 'slot1'){
                     array_push($_SESSION['cartslot1'],$v);
                   }else{
                     array_push($_SESSION['cartslot2'],$v);
                   }
                 }else{
                   echo "<td>".$v."</td>";
                 }
              }
              echo "<td><a href='removecart.php?cartid=".$key."' class='button is-danger'>DELETE</a></td>";
              echo "</tr>";
             } ?>

           </tbody>
         </table>
       </div>
       <div class="column is-2">

       </div>
     </div>
     <div class="box">
       <p>Subject</p>
       <div class="content">
         <h1>
           <?php echo checkdupslot($_SESSION['cartslot1'],$_SESSION['cartslot2']); ?>

         </h1>
       </div>
       <form class="" action="addremove.php" method="get">
         <div class="select">
           <select name='subid'>
             <?php
             $q = "SELECT * FROM subject";
             $result = $mysqli->query($q);
             while ($row=$result->fetch_array()) {
               echo "<option value=".$row['idsubject'].">".$row['name']."</option>";
             }
              ?>
           </select>
         </div>
         <input type="submit" value="View Sections" class="button">
       </form>
       <?php if (isset($_GET['status'])): ?>
         <div class="content">
           <h1><?php echo $_GET['status'] ?></h1>
         </div>

       <?php endif; ?>
       <?php if (isset($_GET['subid'])): ?>
         <p>Section</p>
         <form class="" action="addcart.php" method="POST">
           <div class="select">
             <select name='sectid'>
               <?php
               $_SESSION['cursubject'] = $_GET['subid'];
               $q = "SELECT * FROM section WHERE section.idsubject = ".$_GET['subid'].";";
               $result = $mysqli->query($q);
               while ($row=$result->fetch_array()) {
                 echo "<option value=".$row['idsection'].">".$row['numbersection']." ".returntimeslot($row['slot1'])." ".returntimeslot($row['slot2'])."</option>";
               }
                ?>
             </select>
           </div>
           <input type="submit" value="Add Section" class="button">
           <?php
           print_r($row);
            ?>
         </form>
       <?php endif; ?>

     </div>
     <div class="box">
       <div class="content">
          <p>Confirm timetable : On inserting sections, all the previous records of enrolling will disapper please besure to insert all the sections</p>
          <br>
         <a href="confirmtime.php" class="button is-primary">Confirm</a>
       </div>
     </div>
   </div>
   <div class="content">
   </div>
 </section>


</body>

</html>
