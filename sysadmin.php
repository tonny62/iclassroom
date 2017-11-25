<?php
  session_start();
  // uncomment line below to test logged in UI
  // $_SESSION['userinfo'] = 1;
    require_once('components.php');
    // print_r($_SESSION['user']);

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

  <?php navbar_t(); ?>
  <nav class="breadcrumb is-centered" aria-label="breadcrumbs">
    <ul>
      <li><a href="tdashboard.php">Dashboard</a></li>
      <li class="is-active" aria-current="page"><a href="sysadmin.php">System Administration</a></li>
    </ul>
  </nav>

  <section class="section">
    <div class="container">
      <div class="columns">
        <div class="column">
          <div class="box">
            <div class="content">
              <h1><u>System Administration Zone</u></h1>
              <h3>All action done here will be recorded in <a href="log.php">log</a></h3>
              <ul>
                <a href="sysad_teacher.php"><li>Teacher Management</li></a>
                <a href="sysad_student.php"><li>Student Management</li></a>
                <a href="sysad_section.php"><li>Section Management</li></a>
                <a href="sysad_subject.php"><li>Subject Management</li></a>
                <a href="sysad_major.php"><li>Major Management</li></a>
                <a href="sysad_homework.php"><li>Homework Management</li></a>
              </ul>
            </div>
          </div>
        </div>


      </div>

    </div>
  </section>


</body>

</html>
