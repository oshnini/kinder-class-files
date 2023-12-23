<?php
session_start();
session_destroy();
session_start();

include "connect1.php";
if (isset($_POST["save-btn"])) {
  $item = $_POST["inputItem"];
  $score = $_POST["inputScore"];
  $average = $score / $item * 100;

  // Calculate the percentage in SQL using a formula
  $insertquery = "INSERT INTO progress (percent, item, score) VALUES ('$average', '$item', '$score')";
  $results = executesQuery($insertquery);
}
$query = "SELECT * FROM reg_info";
$results = mysqli_query($conn, $query);

?>


<!DOCTYPE html>
<html lang="en">

<head>
  <title>Class List</title>

  <link rel="stylesheet" href="style.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
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
        <a href="class_list.php">
          <i class="fa fa-address-book"></i>
          <span class="link_name">Class List</span>
        </a>
        <span class="tooltip">Class List</span>
      </li>
      <li>
        <a href="performance_tracker.html">
          <i class="fa fa-book"></i>
          <span class="link_name">Performance Tracker</span>
        </a>
        <span class="tooltip">Performance Tracker</span>
      </li>
      <li>
        <a href="eventscalendar.html">
          <i class="fa fa-calendar"></i>
          <span class="link_name">Events Calendar</span>
        </a>
        <span class="tooltip">Events Calendar</span>
      </li>
      <li>
        <a href="#">
          <i class="fa fa-gear"></i>
          <span class="link_name">Settings</span>
        </a>
        <span class="tooltip">Settings</span>
      </li>
      <li class="profile">
        <div class="profile_details">
          <img src="profile.jpeg" alt="profile image">
          <div class="profile_content">
            <div class="name">Anna Jhon</div>
            <div class="designation">Admin</div>
          </div>
        </div>
        <i class="fa fa-sign-out" id="log_out"></i>
      </li>
    </ul>
  </div>
  <section class="class_list-section">
    <div class="text">Class List</div>
    <div class="grid auto-fit">

    <?php
    if ($results) {
      while ($row = mysqli_fetch_assoc($results)) {
        $firstName = $row['stud_fname'];
        $mname = $row['stud_mname'];
        $surname = $row['stud_lname'];
        $idnumber = $row['studID_number'];
        $pfname = $row['parent_fullname'];
        $address = $row['address'];
        $contact = $row['contact_number'];
        $bday = $row['bday'];
    ?>

      <div class="container">
        <img src="https://i.pinimg.com/564x/fc/7a/1a/fc7a1aee0e1dd7f4acfe8b3347ac27c9.jpg">
        <h4>
        <h4><?php echo $firstName . " " . $mname . " " . $surname; ?></h4>
        </h4>
        <p><?php echo $idnumber ?></p>
        <div class="performance">
          <div class="progressbar-container">
            <div class="progressbar">
              <div class="progressbar-rate">
              </div>
            </div>
          </div>

          <button id="calcBtn" class="calcBtn">Grade Calculator</button>
          <div class="calcmodal" id="calc-modal">
            <div class="calcmodal-content">
              <div class="calcmodal-header">
                <span class="close-calc">&times;</span>
                <h2>Grade Calculator</h2>
                <div class="calcmodal-body">
                  <h4>Weekly Performance Rate</h4>
                  <div class="progress-container">
                    <div class="progress-rate">
                    </div>
                  </div>
                  <div class="input-container">
                    <form method="POST">
                      <div>
                        <h5>Total Score</h5>
                        <input type="number" name="inputScore" class="inputScore" id="inputScore">
                      </div>
                      <div>
                        <h5>Number of Items</h5>
                        <input type="number" class="inputItem" name="inputItem" id="inputItem">
                      </div>
                  </div>
                  <button class="progress-btn" id="progress-btn" type="button">Calculate</button>

                  <button class="save-btn" id="save-btn" name="save-btn" type="submit">Save</button>
                  </form>
                </div>
              </div>

            </div>
          </div>

        </div>
        <button id="myBtn" class="myBtn" name="myBtn">View Profile</button>
        <div class="modal" id="my-modal" name="modal">
          <div class="modal-content">
            <div class="modal-header">
              <span class="close">&times;</span>
              <h2>Profile Information</h2>
            </div>
            <div class="modal-body">
              <h4>Parents Information</h4>
              <li><span>Full Name: </span> <?php echo $pfname ?></li>
              <li><span>Full Address: </span><?php echo $address?> </li>
              <li><span>Contact Number: </span><?php echo $contact ?></li>

              <h4>Students Information</h4>
              <li><span>Birthday: </span><?php echo $bday ?></li>
            </div>
            <div class="modal-footer">
              <h3>Kinder-Class 2023</h3>
            </div>
          </div>
        </div>
      </div>
      <?php
      }
    }
    ?>
    </div>
  </section>

  <div class="container" id="add-container" style="display: none;">
    <img src="https://i.pinimg.com/564x/fc/7a/1a/fc7a1aee0e1dd7f4acfe8b3347ac27c9.jpg">
    <h4>
      <input type="text" id="first-name" class="name-input" placeholder="First Name">
      <input type="text" id="middle-name" class="name-input" placeholder="Middle Name">
      <input type="text" id="last-name" class="name-input" placeholder="Last Name">
    </h4>
    <p id="student-id" class="student-info"></p>
    <div class="performance">
      <div class="progressbar-container">
        <div class="progressbar">
          <div class="progressbar-rate"></div>
        </div>
      </div>
    </div>
  </div>


  </div>

  <!-- Scripts -->
  <script src="scripts.js"></script>
</body>

</html>