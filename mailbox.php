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
      <?php navbar_t();
      $_SESSION['uid'] = $_SESSION['user']['idteacher'];
      ?>
    <?php else: ?>
      <?php navbar();
      $_SESSION['uid'] = $_SESSION['user']['idstudent'];
       ?>
    <?php endif; ?>

    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-2">

          </div>
          <div class="column is-centered content">
            <?php if (!isset($_GET['tab']) or $_GET['tab']=='view'): ?>
            <!-- viewmessage  -->
            <div class="tabs">
              <ul>
                <li class="is-active"><a href="?tab=view">View Recieved Message</a></li>
                <li><a href="?tab=viewsent">View Sent Message</a></li>
                <li><a href="?tab=create">Create Message</a></li>
              </ul>
            </div>
                  <?php if (isset($_GET['id'])): ?>
                <div class="card">
                  <?php
                  $q1= "SELECT * FROM message WHERE idmessage = '".$_GET['id']."';";
                  $result1 = $mysqli->query($q1);
                  $row1 = $result1->fetch_assoc();
                  echo '<div class="card-header">
                          <p class="card-header-title">Topic : '.$row1['topic'].'</p>
                        </div>
                        <div class="card-content">
                        <p class="card-content">From : '.$row1['idfrom'].'
                        <br>Timestamp : '.$row1['timestamp'].'
                        <br>Message : <br><br>
                            '.$row1['message'].'
                          </p>
                        </div>';?>

                    <div class="card-content">
                      <a href="mailbox.php?tab=create&id=<?php echo $row1['idfrom']?>&topic=RE:<?php echo $row1['topic'] ?>" class="button is-link">Reply</a>
                      <a href="deletemessage.php?id=<?php echo $_GET['id'] ?>" class="button is-danger">Delete</a>

                    </div>
                </div>
                <?php endif; ?>
            <table>
              <thead>
                <th>no</th>
                <th>topic</th>
                <th>from</th>
                <th>to</th>
                <th>message</th>
                <th>timestamp</th>
                <th>delete</th>
              </thead>
              <tbody>
                <?php
              $q = "SELECT * FROM message WHERE idto =".$_SESSION['uid']." ORDER BY timestamp ";
              $result=$mysqli->query($q);
              $i=0;
              while ($row = $result->fetch_assoc()) {
                  $i+=1;
                  echo "<tr>
                  <th>".$i."</th>
                  <td>".$row['topic']."</td>
                  <td>".$row['idfrom']."</td>
                  <td>".$row['idto']."</td>
                  <td><a class='button' href='?tab=view&id=".$row['idmessage']."'>View</a></td>
                  <td>".$row['timestamp']."</td>
                  <td><a href='deletemessage.php?id=".$row['idmessage']."' class='button is-danger'>Delete</a></td>
                </tr>";
              }
               ?>

              </tbody>
            </table>


          <?php elseif ($_GET['tab']=='viewsent') :?>
          <!-- viewmessage  -->
          <div class="tabs">
            <ul>
              <li><a href="?tab=view">View Recieved Message</a></li>
              <li class="is-active"><a href="?tab=viewsent">View Sent Message</a></li>
              <li><a href="?tab=create">Create Message</a></li>
            </ul>
          </div>
          <?php if (isset($_GET['id'])): ?>
          <div class="card">
            <?php
           $q1= "SELECT * FROM message WHERE idmessage = '".$_GET['id']."';";
           $result1 = $mysqli->query($q1);
           $row1 = $result1->fetch_assoc();
           echo '<div class="card-header">
                   <p class="card-header-title">Topic : '.$row1['topic'].'</p>
                 </div>
                 <div class="card-content">
                 <p class="card-content">From : '.$row1['idfrom'].'
                 <br>Timestamp : '.$row1['timestamp'].'
                 <br>Message : <br><br>
                     '.$row1['message'].'
                   </p>
                 </div>';
           ?>

              <div class="card-content">
                <a href="mailbox.php?tab=create&id=<?php echo $row1['idfrom']?>&topic=RE:<?php echo $row1['topic'] ?>" class="button is-link">Reply</a>
                <a href="deletemessage.php?id=<?php echo $_GET['id'] ?>" class="button is-danger">Delete</a>

              </div>
          </div>
          <?php endif; ?>
          <table>
          <thead>
           <th>no</th>
           <th>topic</th>
           <th>from</th>
           <th>to</th>
           <th>message</th>
           <th>timestamp</th>
           <th>delete</th>
          </thead>
          <tbody>
           <?php
           $q = "SELECT * FROM message WHERE idfrom = ".$_SESSION['uid']." ORDER BY timestamp ";
           $result=$mysqli->query($q);
           $i=0;
           while ($row = $result->fetch_assoc()) {
               $i+=1;
               echo "<tr>
               <th>".$i."</th>
               <td>".$row['topic']."</td>
               <td>".$row['idfrom']."</td>
               <td>".$row['idto']."</td>
               <td><a class='button' href='?tab=view&id=".$row['idmessage']."'>View</a></td>
               <td>".$row['timestamp']."</td>
               <td><a href='deletemessage.php?id=".$row['idmessage']."' class='button is-danger'>Delete</a></td>
             </tr>";
           }
            ?>

          </tbody>
          </table>
            <?php else: ?>

            <!-- create message -->
            <div class="tabs">
              <ul>
                <li><a href="?tab=view">View Message</a></li>
                <li><a href="?tab=viewsent">View Sent Message</a></li>
                <li class="is-active"><a href="?tab=create">Create Message</a></li>
              </ul>
            </div>
            <div class="box">
              <form class="" action="newmessage.php" method="post">
                <div class="field">
                  <label class="label">ID To</label>
                  <div class="control">
                    <?php if (isset($_GET['id'])): ?>
                    <input class="input" name="idto" type="text" placeholder="ID" value="<?php echo $_GET['id']; ?>">
                    <?php else: ?>
                    <input class="input" name="idto" type="text" placeholder="ID">
                    <?php endif; ?>
                  </div>
                </div>
                <div class="field">
                  <label class="label">Topic</label>
                  <div class="control">
                    <?php if (isset($_GET['topic'])): ?>
                    <input class="input" name="topic" type="text" placeholder="Topic" value="<?php echo $_GET['topic']; ?>">
                    <?php else: ?>
                    <input class="input" name="topic" type="text" placeholder="Topic">
                    <?php endif; ?>
                  </div>
                </div>
                <div class="field">
                  <label class="label">Message</label>
                  <div class="control">
                    <textarea class="textarea" name="message" placeholder="Textarea"></textarea>
                  </div>
                </div>
                <nav class="level">
                  <div class="level-right">
                    <input type="submit" name="" value="Send" class="button is-link">

                  </div>
                </nav>
              </form>

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
