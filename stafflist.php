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
          <form class="" action="stafflist.php" method="post">
            <label class="label">Search</label>
            <div class="field has-addons">
              <p class="control">
                <span class="select">
                  <select name="column">
                    <?php
                    $q = "SELECT * FROM teacher;";
                    $result = $mysqli->query($q);
                    $row = $result->fetch_assoc();
                    foreach ($row as $key => $value) {
                      echo "<option>".$key."</option>";
                    }
                     ?>
                  </select>
                </span>
              </p>
              <p class="control">
                <input class="input" type="text" placeholder="Value To Search" name="searchentry">
              </p>
              <p class="control">
                <a class="button">
                 <input type="submit" name="" value="Search" class="button">
                </a>
              </p>
            </div>
          </form>
          <!-- <table class="table">
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
              // $q = "SELECT * FROM student WHERE idmajor='".$_SESSION['user']['idmajor']."';";
              // $result = $mysqli->query($q);
              // while ($row = $result->fetch_array()) {
              //   echo "<tr><td>".$row['idstudent']."</td><td>".$row['fname']." ".$row['lname']."</td><td><a href='otimetable.php?id=".$row['idstudent']."' class='button is-link'>See Schedule</a></td><td><a href='mailbox.php?tab=create&id=".$row['idstudent']."' class='button is-primary'>Send Message</a></td></tr>";
              // }
               ?>
            </tbody>
          </table> -->
          <?php if (isset($_POST['searchentry'])): ?>
            <table>
              <?php
              $q = "SELECT * FROM teacher WHERE ".$_POST['column']." = '".$_POST['searchentry']."';";
              // echo "$q";
              $result = $mysqli->query($q);
              $i = 0;
              while ($row = $result->fetch_assoc()) {
                if($i == 0){
                  echo "<tr>";
                  foreach ($row as $key => $value) {
                    if($key == 'personalid'){
                      // echo "<td>**********</td>";
                    }else{
                      echo "<th>".$key."</th>";

                    }
                  }
                  echo "<th>See Schedule</th>
                  <th>Sent Message</th>";
                  // echo "<th>Edit</th>";
                  echo "</tr>";
                }
                echo "<tr>";
                foreach ($row as $key => $value) {
                  if($key == 'personalid'){
                    // echo "<td>**********</td>";
                  }else{
                    echo "<td>".$value."</td>";

                  }
                }
                echo "</td><td><a href='otimetable.php?id=".$row['idteacher']."' class='button is-link'>See Schedule</a></td><td><a href='mailbox.php?tab=create&id=".$row['idteacher']."' class='button is-primary'>Send Message</a></td></tr>";
                // echo "<td><a href='sysad_student_edit.php?id=".$row['idstudent']."' class='button is-danger is-outlined'>Edit</a></td>";
                echo "</tr>";
                $i+=1;
              }
               ?>
            </table>
          <?php else: ?>
            <table>
              <?php
              $q = "SELECT * FROM teacher;";
              $result = $mysqli->query($q);
              $i = 0;
              while ($row = $result->fetch_assoc()) {
                if($i == 0){
                  echo "<tr>";
                  foreach ($row as $key => $value) {
                    if($key == 'personalid'){
                      // echo "<td>**********</td>";
                    }else{
                      echo "<th>".$key."</th>";

                    }
                  }
                  echo "<th>See Schedule</th>
                  <th>Sent Message</th>";

                  // echo "<th>Edit</th>";
                  echo "</tr>";
                }
                echo "<tr>";
                foreach ($row as $key => $value) {
                  if($key == 'personalid'){
                    // echo "<td>**********</td>";
                  }else{
                    echo "<td>".$value."</td>";
                  }
                }
                echo "</td><td><a href='otimetable.php?id=".$row['idteacher']."' class='button is-link'>See Schedule</a></td><td><a href='mailbox.php?tab=create&id=".$row['idteacher']."' class='button is-primary'>Send Message</a></td>";
                // echo "<td><a href='sysad_student_edit.php?id=".$row['idstudent']."' class='button is-danger is-outlined'>Edit</a></td>";
                echo "</tr>";
                $i+=1;
              }


               ?>
            </table>
          <?php endif; ?>
        </div>
        <div class="columns is-2">

        </div>




      </div>

    </div>
  </section>


</body>

</html>
