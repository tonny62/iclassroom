<?php
  require_once('components.php');
  require_once('helperfunctions.php');
  session_start();
  require_once('connect.php');
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
       <div class="column content is-centered">
         <table class="table">
           <thead>
             <th>no</th>
             <th>subject</th>
             <th>duedate</th>
             <th>topic</th>
             <th>file</th>
             <th>upload</th>
             <th>status</th>
             <th>grade/score</th>
           </thead>
           <tbody>
             <?php
             $q = "SELECT subject.code, homework.duedate, homework.topic, homework.filename, submithistory.score, homework.idhomework from homework left join section on homework.idsection = section.idsection left join subject on subject.idsubject = section.idsubject left join submithistory on submithistory.idstudent = '".$_SESSION['user']['idstudent']."' AND submithistory.idhomework = homework.idhomework where section.idsection in (select section_has_student.idsection from section_has_student where idstudent = '".$_SESSION['user']['idstudent']."') ORDER BY homework.duedate;";
             $result = $mysqli->query($q);
             $i = 1;
             // $_SESSION['hwcount'] = 0;
             while ($row = $result->fetch_assoc()) {
               $q = "";
               $status = returntime($row['duedate']);
               // print_r($row);
               echo '<tr>
                 <th>'.$i.'</th>
                 <td>'.$row['code'].'</td>
                 <td>'.$row['duedate'].'</td>
                 <td>'.$row['topic'].'</td>
                 <td>
                 <a href="file/'.$row['filename'].'">
                   <span class="file-cta">
                     <span class="file-icon">
                       <i class="fa fa-download"></i>
                     </span>
                   </span>
                   </a>
                 </td>
                 <td>';

                 if ($row['score'] == '') {
                   echo ' <form action="upload.php" method="POST" enctype="multipart/form-data">
                       <input type="file" name="file">
                       <input type="hidden" name="hwid" value="'.$row['idhomework'].'">';
                 if ($status) {
                   // $_SESSION['hwcount'] += 1;
                  echo '<td><a class="button is-warning">Not Submitted</a></td><td></td></tr>';
                  echo '<input name="btnSubmit" type="submit" value="Submit"></td>
                </form>';
                 }else {
                   echo '<td><a class="button is-danger">Over Due</a></td><td></td></tr>';
                   echo '</form>';
                 }
                 }else{
                   echo "submitted</td>";
                   echo '</form>';
                   echo '<td><a class="button is-primary">Submitted</a></td><td>'.$row['score'].'</td></tr>';

                 }
               $i++;
             }




              ?>

           </tbody>
         </table>
       </div>
       <div class="column is-2">

       </div>
     </div>

   </div>
 </section>


</body>

</html>
