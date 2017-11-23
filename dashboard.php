<?php
  session_start();
  // uncomment line below to test logged in UI
  // $_SESSION['userinfo'] = 1;
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

  <?php navbar(); ?>

  <section class="section">
    <div class="container">
      <div class="columns is-multiline has-text-centered">
        <div class="column is-one-third">
            <a href="homework.php"><img src="pics/icon_homework.png" width="200" height="200"></a>
            <p>Homework</p>
        </div>
        <div class="column is-one-third">
            <a href="timetable.php"><img src="pics/icon_timetable.png" width="200" height="200"></a>
            <p>Timetable</p>
        </div>
        <div class="column is-one-third">
            <a href="mailbox.php?tab=view"><img src="pics/icon_mailbox.png" width="200" height="200"></a>
            <p>Mailbox</p>
        </div>
        <div class="column is-one-third">
            <a href="bulletin.php"><img src="pics/icon_messageboard.png" width="200" height="200"></a>
            <p>Bulletin Board</p>
        </div>
        <div class="column is-one-third">
            <a href="studentlist.php"><img src="pics/icon_student.png" width="200" height="200"></a>
            <p>Student Lists</p>
        </div>
        <div class="column is-one-third">
            <a href="stafflist.php"><img src="pics/icon_teacher.png" width="200" height="200"></a>
            <p>Teacher Lists</p>
        </div>
      </div>

    </div>
  </section>


</body>

</html>
