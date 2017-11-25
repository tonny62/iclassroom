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

    <?php if (isset($_SESSION['user']['idteacher'])): ?>
      <?php navbar_t(); ?>
    <?php else: ?>
      <?php navbar(); ?>
    <?php endif; ?>

    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column is-2">

          </div>
          <div class="column is-centered content">
            <div class="tabs is-centered">
              <ul>
                <?php
              for ($i=1; $i < 4; $i++) {
                  if (isset($_GET['subject']) and $_GET['subject']==$i) {
                      echo '<li class="is-active"><a href="?subject='.$i.'">SUBJECT '.$i.'</a></li>';
                  } else {
                      echo '<li><a href="?subject='.$i.'">SUBJECT '.$i.'</a></li>';
                  }
              }
              if (isset($_GET['messageid'])) {
                  echo '<li class="is-active"><a href="?subject='.$i.'">Message</a></li>';
              }
             ?>
              </ul>
            </div>
            <?php if (isset($_GET['messageid'])): ?>
              <article class="media">
                <figure class="media-left">
                  <p class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                  </p>
                </figure>
                  <div class="media-content">
                    <div class="content">
                      <p>
                        <strong>Wari M.</strong>
                        <br>
                        OMG WHO TOOK MY WALLET !!!??
                      </p>
                    </div>
                    <article class="media">
                      <figure class="media-left">
                        <p class="image is-64x64">
                          <img src="https://bulma.io/images/placeholders/128x128.png">
                        </p>
                      </figure>
                        <div class="media-content">
                          <div class="content">
                            <p>
                              <strong>Kriddanai R.</strong>
                              <br>
                              It's me lol
                            </p>
                          </div>
                        </div>

                    </article>
                  </div>

              </article>
              <article class="media">
                <figure class="media-left">
                  <p class="image is-64x64">
                    <img src="https://bulma.io/images/placeholders/128x128.png">
                  </p>
                </figure>
                <div class="media-content">
                  <div class="field">
                    <p class="control">
                      <textarea class="textarea" placeholder="Add a comment..."></textarea>
                    </p>
                  </div>
                  <nav class="level">
                    <div class="level-left">
                      <div class="level-item">
                        <a class="button is-info">Submit</a>
                      </div>
                    </div>
                    <div class="level-right">
                      <div class="level-item">
                        <label class="checkbox">
                          <input type="checkbox"> Press enter to submit
                        </label>
                      </div>
                    </div>
                  </nav>
                </div>
              </article>
            <?php else: ?>
            <table>
              <thead>
                <tr>
                  <th>topic</th>
                  <th>user</th>
                  <th>replies</th>
                  <th>timestamp</th>
                  <th>view</th>
                </tr>
              </thead>
              <tbody>
                <?php if (isset($_GET['subject']) and $_GET['subject']==1): ?>
                <tr>
                  <td>Need help with homework2</td>
                  <td>Kriddanai R.</td>
                  <td>3</td>
                  <td>2017-12-13</td>
                  <td><a href="?messageid=1" class="button is-link">view</a></td>
                </tr>
                <tr>
                  <td>Who took my wallet</td>
                  <td>Wari M.</td>
                  <td>0</td>
                  <td>2017-12-15</td>
                  <td><a href="" class="button is-link">view</a></td>
                </tr>
                <?php endif; ?>

              </tbody>
            </table>
            <?php endif; ?>


          </div>
          <div class="column is-2">

          </div>
        </div>

      </div>
    </section>


  </body>

  </html>
