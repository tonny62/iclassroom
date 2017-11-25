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
      <li class="is-active" aria-current="page"><a href=".php">section Management</a></li>
    </ul>
  </nav>

  <section class="section">
    <div class="container">
      <div class="columns">
        <div class="column">
          <div class="box">
            <div class="content">
              <h1>section Management</h1>
              <form class="" action="sysad_section.php" method="post">
                <label class="label">Search</label>
                <div class="field has-addons">
                  <p class="control">
                    <span class="select">
                      <select name="column">
                        <?php
                        $q = "SELECT * FROM section;";
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
                      Search
                    </a>
                  </p>
                </div>
              </form>

              <?php if (isset($_POST['searchentry'])): ?>
                <table>
                  <?php
                  $q = "SELECT * FROM section WHERE ".$_POST['column']." = ".$_POST['searchentry'].";";
                  $result = $mysqli->query($q);
                  $i = 0;
                  while ($row = $result->fetch_assoc()) {
                    if($i == 0){
                      echo "<tr>";
                      foreach ($row as $key => $value) {
                        echo "<th>".$key."</th>";
                      }
                      echo "<th>Edit</th>";
                      echo "<th>Delete</th>";
                      echo "</tr>";
                    }
                    echo "<tr>";
                    foreach ($row as $key => $value) {
                      if($key == 'personalid'){
                        echo "<td>**********</td>";
                      }else{
                        echo "<td>".$value."</td>";
                      }
                    }
                    echo "<td><a href='sysad_section_edit.php?id=".$row['idsection']."' class='button is-danger is-outlined'>Edit</a></td>";
                    echo "<td><a href='delete.php?id=".$row['idsection']."&table=section' class='button is-danger'>Delete</a></td>";

                    echo "</tr>";
                    $i+=1;
                  }
                   ?>
                </table>
              <?php else: ?>
                <table>
                  <?php
                  $q = "SELECT * FROM section;";
                  $result = $mysqli->query($q);
                  $i = 0;
                  while ($row = $result->fetch_assoc()) {
                    if($i == 0){
                      echo "<tr>";
                      foreach ($row as $key => $value) {
                        echo "<th>".$key."</th>";
                      }
                      echo "<th>Edit</th>";
                      echo "<th>Delete</th>";

                      echo "</tr>";
                    }
                    echo "<tr>";
                    foreach ($row as $key => $value) {
                      if($key == 'personalid'){
                        echo "<td>**********</td>";
                      }else{
                        echo "<td>".$value."</td>";
                      }
                    }
                    echo "<td><a href='sysad_section_edit.php?id=".$row['idsection']."' class='button is-danger is-outlined'>Edit</a></td>";
                    echo "<td><a href='delete.php?id=".$row['idsection']."&table=section' class='button is-danger'>Delete</a></td>";
                    echo "</tr>";
                    $i+=1;
                  }


                   ?>
                </table>
              <?php endif; ?>


              </ul>
            </div>
          </div>
        </div>


      </div>

    </div>
  </section>


</body>

</html>
