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

 <?php navbar(); ?>

 <section class="section">
   <div class="container">
     <div class="columns">
       <div class="column is-2">

       </div>
       <div class="column is-centered content">
         <div class="box">
           <div class="columns">
             <div class="column is-4">
               <figure class="image is-128x128">
                 <img src="https://bulma.io/images/placeholders/128x128.png">
               </figure>
             </div>
             <div class="column is-8">
               <div class="content">
                 <form class="" action="index.html" method="post">
                   <div class="field">
                     <label class="label">IDUSER</label>
                     <div class="control">
                       <input class="input" type="text" placeholder="username" name="username">
                     </div>
                   </div>
                   <div class="field">
                     <label class="label">fname</label>
                     <div class="control">
                       <input class="input" type="text" placeholder="username" name="username">
                     </div>
                   </div>
                 </form>
                 Name : <?php echo $_SESSION['user']['fname'].' '.$_SESSION['user']['lname']; ?><br>
                 ID : <?php
                 if (isset($_SESSION['user']['idteacher'])) {
                   echo $_SESSION['user']['idteacher'];
                 }else{
                   echo $_SESSION['user']['idstudent'];
                   echo "Year : ".$_SESSION['user']['year']."<br>";
                 }?><br>

                 Major : <?php
                 $q = "SELECT * FROM major where idmajor = ".$_SESSION['user']['idmajor'].";";
                 $result = $mysqli->query($q);
                 $row = $result->fetch_assoc();
                 echo $row['majorname']; ?> <br>
                 <a href="timetable.php" class="button is-link">See my timetable</a>
                 <a href="editprofile.php" class="button is-warning">Edit my profile</a>


               </div>

             </div>
           </div>

         </div>
       </div>
       <div class="column is-2">

       </div>




     </div>

   </div>
 </section>


</body>

</html>
