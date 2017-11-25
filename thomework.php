<?php
  require_once('components.php');
  require_once('connect.php');
  session_start();
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

 <section class="section">
   <div class="container">
     <div class="columns">
       <div class="column is-2">

       </div>
       <div class="column is-centered content">
         <?php if (!isset($_GET['tab']) OR $_GET['tab']=='create'): ?>
           <!-- viewmessage  -->
           <div class="tabs">
            <ul>
              <li class="is-active"><a href="?tab=create">Create Homework</a></li>
              <li><a href="?tab=manage">Manage Homework</a></li>
            </ul>
          </div>
          <div class="box">
            <div class="field">
              <label class="label">Subject</label>
                <form action="thomework.php" method="get">

                    <?php if (isset($_GET['sid'])): ?>
                      <?php
                      $q = "SELECT * FROM subject WHERE idsubject = ".$_GET['sid'].";";
                      $result = $mysqli->query($q);
                      $row = $result->fetch_assoc();
                      echo "<div class='content'><h2>".$row['code']." ".$row['name']."</h2></div>";
                      // while ($row = $result->fetch_assoc()) {
                      //   echo "<option value='".$row['idsubject']."'>".$row['code']." ".$row['name']."</option>";
                      // }?>
                    <?php else: ?>
                      <?php
                      echo '<div class="select">
                      <select class="" name="sid">';
                      $q = "SELECT * FROM subject";
                      $result = $mysqli->query($q);
                      while ($row = $result->fetch_assoc()) {
                        echo "<option value='".$row['idsubject']."'>".$row['code']." ".$row['name']."</option>";
                      }?>
                    </select>
                  </div>
                  <input type="submit" name="" value="select" class="button">

                    <?php endif; ?>



                </form>

            </div>
            <div class="field">
              <label class="label">Section</label>
              <form action="uphw.php" method="post" enctype="multipart/form-data">
                <div class="select">
                <select class="" name="sectid">
                <?php
                $q = "SELECT * FROM section WHERE idsubject ='".$_GET['sid']."'";
                $result = $mysqli->query($q);
                while ($row = $result->fetch_assoc()) {
                  echo "<option value='".$row['idsection']."'>".$row['numbersection']."</option>";
                }?>
                </select>
              </div>


            </div>
            <div class="field">
              <label class="label">Duedate</label>
              <div class="control">
                  <input class="input" type="datetime-local" name="duedate" placeholder="Duedate">
              </div>
            </div>
            <div class="field">
              <label class="label">Topic</label>
              <div class="control">
                  <input class="input" type="text" placeholder="Topic" name="topic">
              </div>
            </div>
            <div class="field">
              <label class="label">File</label>
              <input type="file" name="file" class="button">

            </div>
            <div class="field">
              <label class="label">Submit</label>
              <div class="control">
                  <input class="button" type="submit" value="Submit">
                  <a href="thomework.php" class="button">RESET</a>

              </div>
              </form>
            </div>
          </div>
        <?php elseif ($_GET['tab']=='grade'): ?>
          <div class="tabs">
           <ul>
             <li><a href="?tab=create">Create Homework</a></li>
             <li class=""><a href="?tab=manage">Manage Homework</a></li>
             <li class="is-active"><a href="?tab=grade">Grade</a></li>
           </ul>
         </div>

           <div class="box">
             <table>
               <thead>
                 <tr>
                   <th>studentid</th>
                   <th>file</th>
                   <th>grade/score</th>
                   <th>submit</th>
                 </tr>
               </thead>
               <tbody>
                 <?php
                 // $q = "SELECT * FROM section_has_student WHERE idsection = ".$_GET['id'].";";
                 $q = "SELECT * FROM section_has_student WHERE idsection = 1;";
                 // echo "$q";
                 $result = $mysqli->query($q);
                 while ($row = $result->fetch_assoc()) {
                   $q2 = "SELECT * FROM submithistory WHERE idstudent = ".$row['idstudent']." AND idhomework = ".$_GET['id'].";";
                   $result2 = $mysqli->query($q2);
                   if($row2=$result2->fetch_assoc()){
                     echo "<tr>";
                     echo "<td>".$row['idstudent']."</td><td><a href='homework/".$_GET['id']."/".$row['idstudent'].".pdf' class='button'>VIEW</a></td>";
                     echo "<form action='setscore.php' method='get'><td><input type='text' class='input' name='score'  placeholder='Current score = ".$row2['score']."' /><input type='hidden' name='studentid' value='".$row['idstudent']."'/><input type='hidden' name='hwid' value='".$_GET['id']."' /></td><td><input type='submit' class='button' /></td> </form>";
                     echo "</tr>";
                   }else{
                     echo "<tr>";
                     echo "<td>".$row['idstudent']."</td><td>notsubmitted</td><td>notsubmitted</td><td>notsubmitted</td>";
                     echo "</tr>";
                   }

                 }
                  ?>
                 <td></td>
                 <td></td>
                 <td></td>
               </tbody>
             </table>
           </div>

        <?php else: ?>
          <div class="tabs">
           <ul>
             <li><a href="?tab=create">Create Homework</a></li>
             <li class="is-active"><a href="?tab=manage">Manage Homework</a></li>
           </ul>
         </div>
         <div class="box">
           <table>
             <thead>
               <th>subject</th>
               <th>section</th>
               <th>topic</th>
               <th>duedate</th>
               <th>grade</th>
               <th>delete</th>
             </thead>
            <?php
            $q = "SELECT * FROM homework LEFT JOIN subject ON subject.idsubject = homework.idsubject LEFT JOIN section ON section.idsection = homework.idsection WHERE homework.idteacher ='".$_SESSION['user']['idteacher']."';";
            // echo "$q";
            $result = $mysqli->query($q);
            while ($row = $result->fetch_assoc()) {
              echo "<tr>";
              echo "<td>".$row['code']."</td><td>".$row['numbersection']."</td><td>".$row['topic']."</td><td>".$row['duedate']."</td><td><a href='?tab=grade&id=".$row['idhomework']."' class='button is-primary'>GRADE</a></td><td><a class='button is-danger'>DELETE</a></td>";
              echo "</tr>";
            }
             ?>
           </table>
         </div>

         <?php endif; ?>
       </div>
       <div class="column is-2">

       </div>
     </div>

   </div>
 </section>


</body>

</html>
