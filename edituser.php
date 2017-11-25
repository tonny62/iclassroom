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
       <div class="column is-centered content">
         <div class="box">
           <div class="columns">
             <div class="column is-4">
               <figure class="image is-128x128">
                 <!-- <img src="https://bulma.io/images/placeholders/128x128.png"> -->
               </figure>
             </div>
             <div class="column is-8">
               <div class="content">
                 <form class="" action="editprofileaction.php" method="post">
                   <div class="field">
                     <label class="label">IDUSER</label>
                     <div class="control">
                       <?php if (isset($_SESSION['user']['idteacher'])): ?>
                         <input class="input" type="text" placeholder="username" name="idteacher" value="<?php echo $_SESSION['user']['idteacher']; ?>" DISABLED>
                       <?php else: ?>
                         <input class="input" type="text" placeholder="username" name="idstudent" value="<?php echo $_SESSION['user']['idstudent']; ?>" DISABLED>

                       <?php endif; ?>
                     </div>
                   </div>
                   <div class="field">
                     <label class="label">Firstname</label>
                     <div class="control">
                       <input class="input" type="text" placeholder="username" name="fname" value="<?php echo $_SESSION['user']['fname']; ?>">
                     </div>
                   </div>
                   <div class="field">
                     <label class="label">Lastname</label>
                     <div class="control">
                       <input class="input" type="text" placeholder="username" name="lname" value="<?php echo $_SESSION['user']['lname']; ?>">
                     </div>
                   </div>
                   <input type="submit" name="" value="Submit" class="button">
                 </form>

                 <br>



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
