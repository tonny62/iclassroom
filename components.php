<?php
  function navbar(){
    echo '<nav class="navbar" role="navigation" aria-label="main navigation">
      <!-- navbar items, navbar burger... -->
      <div class="navbar-brand">
        <a class="navbar-item" href="dashboard.php">
          <img src="pics/school.png">
        </a>
      </div>

      <div class="navbar-menu">
        <!-- navbar start, navbar end -->
        <div class="navbar-start">
          <div class="navbar-item">
            <a href="dashboard.php"><h2>iClassroom</h2></a>
          </div>
        </div>
        <div class="navbar-end">
          <!-- navbar items -->
          <div class="navbar-item">
          </div>
          <div class="navbar-item">
            <a href="dashboard.php">Dashboard</a>
          </div>
          <div class="navbar-item">
            <a href="profile.php">Profile</a>
          </div>
          <div class="navbar-item">
            <a href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>';
  }

  function navbar_t(){
    echo '<nav class="navbar" role="navigation" aria-label="main navigation">
      <!-- navbar items, navbar burger... -->
      <div class="navbar-brand">
        <a class="navbar-item" href="dashboard.php">
          <img src="pics/school.png">
        </a>
      </div>

      <div class="navbar-menu">
        <!-- navbar start, navbar end -->
        <div class="navbar-start">
          <div class="navbar-item">
            <a href="tdashboard.php"><h2>iClassroom</h2></a>
          </div>
        </div>
        <div class="navbar-end">
          <!-- navbar items -->
          <div class="navbar-item">
          </div>
          <div class="navbar-item">
            <a href="tdashboard.php">Dashboard</a>
          </div>
          <div class="navbar-item">
            <a href="profile.php">Profile</a>
          </div>
          <div class="navbar-item">
            <a href="logout.php">Logout</a>
          </div>
        </div>
      </div>
    </nav>';
  }


 ?>
