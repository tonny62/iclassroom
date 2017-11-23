<?php
  require_once('components.php');
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
 <section class="section">
   <div class="container">
     <div class="columns">
       <div class="column is-2">

       </div>

         <div class="column is-centered content">
           <form action="registeraction.php" method="post">
            <div class="box">
              <div class="field">
                <label class="label">Student ID/ Teacher ID</label>
                <div class="control">
                  <input class="input" type="text" placeholder="ID" name="id">
                </div>
              </div>
              <div class="field">
                <label class="label">Personal ID</label>
                <div class="control">
                  <input class="input" type="text" placeholder="personalID" name="pid">
                </div>
              </div>
              <div class="field">
                <label class="label">Password</label>
                <div class="control">
                  <input class="input" placeholder="Password" name="password"></input>
                </div>
              </div>

              <div class="columns is-centered">
                <div class="column is-6">
                  <input type="submit" name="submit" value="Register" class="button is-primary"></input>

                </div>
                <div class="column is-6">
                  <a href="index.php" class="button is-link">Go Back</a>

                </div>
              </div>

              <?php if (isset($_GET['status'])): ?>
                <div class="field">
                  <p><?php echo $_GET['status']; ?></p>
                </div>
              <?php endif; ?>

            </div>
          </form>

         </div>
       <div class="column is-2">

       </div>
     </div>

   </div>
 </section>


</body>

</html>
