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

 <?php navbar(); ?>

 <section class="section">
   <div class="container">
     <div class="columns">
       <div class="column is-2">

       </div>
       <div class="column is-centered content">
         <?php if (!isset($_GET['tab']) OR $_GET['tab']=='view'): ?>
           <!-- viewmessage  -->
           <div class="tabs">
            <ul>
              <li class="is-active"><a href="?tab=view">View Message</a></li>
              <li><a href="?tab=create">Create Message</a></li>
            </ul>
          </div>
          <?php if (isset($_GET['id'])): ?>
            <div class="card">
              <div class="card-header">
                <p class="card-header-title">Question about midterm</p>
              </div>
              <div class="card-content">
                <p class="content">
                  I have some question ...
                </p>
              </div>
            </div>
          <?php endif; ?>
          <table>
            <thead>
              <th>no</th>
              <th>type</th>
              <th>topic</th>
              <th>to</th>
              <th>message</th>
              <th>timestamp</th>
              <th>delete</th>
            </thead>
            <tbody>
              <tr>
                <th>1</th>
                <th>sent</th>
                <td>Question about Midterm score</td>
                <td>Prof Hung</td>
                <td><a class="button" href="?tab=view&id=2">View</a></td>
                <td>2017-11-15 10:12PM</td>
                <td>del</td>
              </tr>
            </tbody>
          </table>

         <?php else: ?>
           <!-- create message -->
           <div class="tabs">
            <ul>
              <li><a href="?tab=view">View Message</a></li>
              <li class="is-active"><a href="?tab=create">Create Message</a></li>
            </ul>
          </div>
          <div class="box">
            <div class="field">
              <label class="label">ID To</label>
              <div class="control">
                <input class="input" type="text" placeholder="ID">
              </div>
            </div>
            <div class="field">
              <label class="label">Topic</label>
              <div class="control">
                <input class="input" type="text" placeholder="Topic">
              </div>
            </div>
            <div class="field">
              <label class="label">Message</label>
              <div class="control">
                <textarea class="textarea" placeholder="Textarea"></textarea>
              </div>
            </div>
            <nav class="level">
              <div class="level-right">
                  <p class="level-item"><a class="button is-link">Submit</a></p>
              </div>
            </nav>
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
