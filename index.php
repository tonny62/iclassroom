<?php
  session_start();
  // uncomment line below to test logged in UI
  // $_SESSION['userinfo'] = 1;

  ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Log in</title>
    <link rel="stylesheet" href="css/font-awesome-4.7-1.0/css/font-awesome.min.css">
    <link rel="stylesheet" href="css/bulma.min.css">
  </head>
  <body>
    <nav class="navbar" role="navigation" aria-label="main navigation">
      <!-- navbar items, navbar burger... -->
      <div class="navbar-brand">
        <a class="navbar-item" href="#">
        <img src="pics/school.png" height="50">
      </a>
      </div>
    </nav>
    <section class="section">
      <div class="container">
        <div class="columns">
          <div class="column"></div>
          <div class="column is-one-third">
            <div class="box">

              <article class="media">
                <div class="media-content">

                  <div class="content">
                    <center><img src="pics/school.png" width="260"></center>

                    <form action="loginaction.php" method="POST">
                      <div class="field">
                        <label class="label">Username</label>
                        <div class="control">
                          <input class="input" type="text" placeholder="username" name="username">
                        </div>
                      </div>

                      <div class="field">
                        <label class="label">Password</label>
                        <div class="control">
                          <input class="input" type="password" placeholder="********" name="password">
                        </div>
                      </div>
                      <div class="columns">
                        <div class="column is-4"></div>
                        <div class="column is-4">
                          <input type="submit" value="login" class="button is-primary">
                        </div>
                        <div class="column is-4"></div>
                      </div>
                      <?php if (isset($_GET['status'])): ?>
                        <div class="columns">
                          <div class="column">
                            <p>Incorrect username or password</p>
                          </div>
                        </div>
                      <?php endif; ?>
                      <div class="columns">
                        <div class="column is-4"></div>
                        <div class="column is-4">
                          <!-- <a class="button is-link" href="register.php">Register</a> -->
                        </div>
                        <div class="column is-4"></div>
                      </div>
                    </form>
                  </div>
                </div>
              </article>

            </div>
          </div>
          <div class="column"></div>
        </div>

      </div>
    </section>
  </body>
</html>
