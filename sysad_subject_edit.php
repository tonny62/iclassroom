<?php
  session_start();
  // uncomment line below to test logged in UI
  // $_SESSION['userinfo'] = 1;
    require_once('components.php');
    require_once('connect.php')
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
      <li><a href="sysadmin.php">System Administration</a></li>
      <li><a href="sysad_subject.php">subject Management</a></li>
      <li class="is-active" aria-current="page"><a href=".php">Edit subject</a></li>
    </ul>
  </nav>

  <section class="section">
    <div class="container">
      <div class="columns">
        <div class="column is-2"></div>
        <div class="column">
          <div class="box">
            <div class="content">
              <h1>subject Management : Edit</h1>
              <form class="" action="edit.php" method="POST">
                <?php
                $q = "SELECT * FROM subject WHERE subject.idsubject = ".$_GET['id'].";";
                $result = $mysqli->query($q);
                $row = $result->fetch_assoc();
                foreach ($row as $key => $value) {
                  if($key == 'personalid'){
                    echo '<div class="field is-horizontal">
                            <div class="field-label is-normal">
                              <label class="label">'.$key.'</label>
                            </div>
                          <div class="field-body">
                            <input class="input" type="text" placeholder="Text input" value="*********" DISABLED>
                          </div>
                        </div>';
                  }else{
                    echo '<div class="field is-horizontal">
                            <div class="field-label is-normal">
                              <label class="label">'.$key.'</label>
                            </div>
                          <div class="field-body">
                            <input class="input" type="text" placeholder="Text input" value="'.$value.'" name="'.$key.'">
                          </div>
                        </div>';
                  }

                }
                 ?>
                 <div class="field is-grouped is-grouped-centered">
                   <p class="control">  <input type="submit" name="" value="Submit" class="button is-danger"></p>
                   <p class="control"><a href="sysad_subject.php" class="button">Back</a></p>
                 </div>
                 <input type="hidden" name="totable" value="subject">
              </form>



              </ul>
            </div>
          </div>
        </div>

        <div class="column is-2"></div>

      </div>

    </div>
  </section>


</body>

</html>
