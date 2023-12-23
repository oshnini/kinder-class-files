<?php
  session_start();


  if (!isset($_SESSION['loggedin'])) {
      header("Location: index.php");
      exit();
  }

  include "connect1.php";

  $userId = $_SESSION["username"]; 

  $query = "SELECT * FROM reg_info WHERE studID_number = ?";
  $stmt = mysqli_prepare($conn, $query);
  mysqli_stmt_bind_param($stmt, "s", $userId); 
  mysqli_stmt_execute($stmt);
  $result = mysqli_stmt_get_result($stmt);

  if ($result && $row = mysqli_fetch_assoc($result)) {
      $firstName = $row['stud_fname'];
      $mname = $row['stud_mname'];
      $surname = $row['stud_lname'];
      $idnumber = $row['studID_number'];
      $pfname = $row['parent_fullname'];
      $address = $row['address'];
      $contact = $row['contact_number'];
      $bday = $row['bday'];


  } else {
      echo "Error in executing the query: " . mysqli_error($conn);
  }

  mysqli_close($conn);
?>

<html>

  <head>
    <title>Kinder Class Website</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>
  </head>

  <body>
    <div class="sidebar">
      <div class="logo_details">
        <i class="fa fa-navicon" id="btn"></i>
      </div>
      <ul class="nav-list">

        <li>
          <a href="home.php" class="active">
            <i class="fa fa-home"></i>
            <span class="link_name">Home</span>
          </a>
          <span class="tooltip">Home</span>
        </li>
        <li>
          <a href="perf_tracker_US.php">
            <i class="fa fa-book"></i>
            <span class="link_name">Performance Tracker</span>
          </a>
          <span class="tooltip">Performance Tracker</span>
        </li>
        <li>
          <a href="#">
            <i class="fa fa-calendar"></i>
            <span class="link_name">Events Calendar</span>
          </a>
          <span class="tooltip">Events Calendar</span>
        </li>
        <li>
          <a href="profile.html">
            <i class="fa fa-gear"></i>
            <span class="link_name">Profile Settings</span>
          </a>
          <span class="tooltip">Profile Settings</span>
        </li>
        <li class="profile">
          <div class="profile_details">
            <img src="" alt="profile image">
            <div class="profile_content">
              <div class="name">Anna Jhon</div>
              <div class="designation">Parent</div>
            </div>
          </div>
          <i class="fa fa-sign-out" id="log_out"></i>
        </li>
      </ul>
    </div>

    <?php
    echo '<section class="settings-section">
      <div class="text-settings">Profile Settings</div>
      <div class="student-profile py-4">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="card shadow-sm">
                <div class="card-header bg-transparent text-center">
                  <img class="profile_img" src="https://i.pinimg.com/564x/fc/7a/1a/fc7a1aee0e1dd7f4acfe8b3347ac27c9.jpg" alt="student dp">
                  <h3>'.$firstName.' '.$mname. ' '.$surname.'</h3>
                </div>
                <div class="card-body">
                  <p class="mb-0"><strong class="pr-1"><span>Student ID:</span></strong>'.$idnumber.'</p>
                  <p class="mb-0"><strong class="pr-1"><span>Birthday:</span></strong>'.$bday.'</p>
                  <p class="mb-0"><strong class="pr-1"><span>Health Condition:</span></strong>
                    <li>Asthma</li>
                    <li>Eyesight</li>
                  </p>
                </div>
              </div>
            </div>
            <div class="col-lg-8">
              <div class="card shadow-sm">
                <div class="card-header bg-transparent border-0">
                  <h3 class="mb-0"><i class="far fa-clone pr-1"></i>Guardian Information</h3>
                </div>
                <div class="card-body pt-0">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">Guardians Full Name</th>
                      <td width="2%">:</td>
                      <td>'.$pfname.'</td>
                    </tr>
                    <tr>
                      <th width="30%">Relationship to the student</th>
                      <td width="2%">:</td>
                      
                    </tr>
                    <tr>
                      <th width="30%">Contact Number</th>
                      <td width="2%">:</td>
                      <td>'.$contact.'</td>
                    </tr>
                    <tr>
                      <th width="30%">Complete Address</th>
                      <td width="2%">:</td>
                      <td>'.$address.'</td>
                    </tr>
                    <tr>
                      <th width="30%">Occupation</th>
                      <td width="2%">:</td>
                      <td>Employee</td>
                    </tr>
                </div>
              </div>
              <div style="height: 26px"></div>
            </div>
          </div>
        </div>
      </div>
    </section> ';
    ?>
  </body>

  <script src="script.js"></script>

</html>