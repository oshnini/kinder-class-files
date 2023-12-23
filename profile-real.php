<?php
session_start();


if (!isset($_SESSION['loggedin'])) {
  header("Location: index.php");
  exit();
}

include "connect1.php";

$userId = $_SESSION["username"];

$query = "SELECT * FROM reg_info WHERE studID_number = '$userId'";
$result = mysqli_query($conn, $query) or die("Error in query: " . mysqli_error($conn));
$row = mysqli_fetch_assoc($result) or die("No user found with the given ID.");


  $firstName = $row['stud_fname'];
  $mname = $row['stud_mname'];
  $surname = $row['stud_lname'];
  $idnumber = $row['studID_number'];
  $pfname = $row['parent_fullname'];
  $address = $row['address'];
  $contact = $row['contact_number'];
  $bday = $row['bday'];
  $section = $row['section'];
  $gender = $row['gender'];


mysqli_close($conn);

if (isset($_POST["edit-save"])) {
  $gname = $_POST['gname'];
  $rel = $_POST['relation'];
  $con = $_POST['contact'];
  $add = $_POST['address'];
  $ocu = $_POST['ocupation'];

  $query = " UPDATE reg_info SET
          parent_fullname = $gname, relation = $rel, contact_number = $con, address= $address, ocupation=$ocu";
           $results = executesQuery($query);
           header("Location: profile-real.php");
}
?>
<html>

  <head>
    <title>Kinder Class Website</title>
    <link rel="stylesheet" href="styles.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,700,900&display=swap" rel="stylesheet">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.min.css'>
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.12.1/css/all.min.css'>

    <style>
      .edit-modal {
        display: none;
        position: fixed;
        z-index: 1;
        left: 0;
        top: 0;
        height: 100%;
        width: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.5);
      }
      .edit-content {
        margin: 10% auto;
        width: 50%;
        box-shadow: 0 5px 8px 0 rgba(0, 0, 0, 0.2), 0 7px 20px 0 rgba(0, 0, 0, 0.17);
        animation-name: modalopen;
        animation-duration: 1s;
      }
      .edit-modal h4{
        margin: 0;
        font-size: 20px;
        color: #e6e6e6;
      }
      .edit-header{
        background: #277699;
        padding: 10px;
        color: #e6e6e6;
        border-top-left-radius: 5px;
        border-top-right-radius: 5px;
      }
      .close {
        color: white;
        float: right;
        font-size: 30px;
        cursor: pointer;
      }

      .close:hover,
      .close:focus {
        color: #000;
        text-decoration: none;
        cursor: pointer;
      }
      .edit-body {
        padding: 10px;
        background: #fff;
        text-align: justify;
      } 
      .edit-modal input[type="text"] {
        border-color: #41444B;
        background: transparent;
        outline: solid;
        height: 40px;
        width: 300px;
        color: #545454;
        font-size: 16px;
        border-radius: 10px;
        padding-right: 20px;
        
        flex-flow: row wrap;
      }
      .edit-modal .edit-save {
        background: #297582;
        color: white;
        text-align: center;
        display: inline;
        cursor: pointer;
        line-height: normal;
        font-weight: bold;
        padding: 10px 20px;
        font-size: 16px;
        border-radius: 10px;
        border: none;
        transition: all 0.3s ease 0s;
        box-shadow: rgba(0, 0, 0, 0) 0px 0px 0px 0px
      }
      .edit-modal .edit-save:hover {
        background: #2c8dab;
        box-shadow: rgba(0, 0, 0, 0.1) 0px 0px 0px
      }
    </style>
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
          <a href="profile.php">
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

    <section class="settings-section">
      <div class="text-settings">Profile Settings</div>
      <div class="student-profile py-4">
        <div class="container">
          <div class="row">
            <div class="col-lg-4">
              <div class="card shadow-sm">
                <div class="card-header bg-transparent text-center">
                  <img class="profile_img" src="https://i.pinimg.com/564x/fc/7a/1a/fc7a1aee0e1dd7f4acfe8b3347ac27c9.jpg" alt="student dp">
                  <h3><?php echo $firstName . ' ' . $mname . ' ' . $surname ?></h3>
                </div>
                <div class="card-body">
                  <p class="mb-0"><strong class="pr-1"><span>Student ID:</span></strong><?php echo $idnumber ?></p>
                  <p class="mb-0"><strong class="pr-1"><span>Section:</span></strong><?php echo $section ?></p>
                  <p class="mb-0"><strong class="pr-1"><span>Gender:</span></strong><?php echo $gender ?></p>
                  <p class="mb-0"><strong class="pr-1"><span>Birthday:</span></strong><?php echo $bday ?></p>
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
                  <input type="button" name="btn-edit" class="btn-edit" id="btn-edit" value="edit profile"
                  style="color:#277699; padding: 5px; border-radius: 5px; border: solid #277699; background: transparent;
                  font-size: 14px; margin-top: 15px">
                </div>
                <div class="card-body pt-0">
                  <table class="table table-bordered">
                    <tr>
                      <th width="30%">Guardian's Full Name</th>
                      <td width="2%">:</td>
                      <td><?php echo $pfname ?> <!--<input type="button" class="edit-btn" name="edit-btn" id="edit-btn" value="edit" 
                        style="color:#277699; padding: 2px; border-radius: 5px; border: none; background: transparent;
                        margin-left: 250px;" -->
                      </td>
                    </tr>
                    <tr>
                      <th width="30%">Relationship to the student</th>
                      <td width="2%">:</td>
                      <td>Mother</td>
                    </tr>
                    <tr>
                      <th width="30%">Contact Number</th>
                      <td width="2%">:</td>
                      <td><?php echo $contact ?></td>
                    </tr>
                    <tr>
                      <th width="30%">Complete Address</th>
                      <td width="2%">:</td>
                      <td><?php echo $address ?></td>
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
      <div class="edit-modal" id="my-editmodal" name="modal-edit" style="display: none;">
        <div class="edit-content">
          <div class="edit-header">
            <span class="close" id="close">&times;</span>
            <h4><i class="fas fa-user-circle pr-1"></i>Edit Profile</h4>
          </div>
          <div class="edit-body">
            <form class="edit-form" action="/action_page.php">
              <label for="gname">Guardian's Full Name:</label>
              <input type="text" id="fname" name="gname" placeholder=""><br>

              <label for="relationship">Relation to student:</label>
              <input type="text" id="relation" name="relation" placeholder=""><br>

              <label for="contact">Contact Number:</label>
              <input type="text" id="contact" name="contact" placeholder=""><br>

              <label for="address">Complete Address:</label>
              <input type="text" id="address" name="address" placeholder=""><br>

              <label for="occupation">Occupation:</label>
              <input type="text" id="occupation" name="occupation" placeholder=""><br>

              <input type="submit" id="edit-save" name="edit-save" class="edit-save" value="Save">
            </form>
          </div>
        </div>
      </div>
    </section>
    <script src="script.js"></script>
    <script>
      const editBtn = document.getElementsByClassName('btn-edit');
const modalEdit = document.getElementsByClassName('edit-modal');
const modalClose = document.querySelectorAll('.close');

for (let i = 0; i < editBtn.length; i++) {
    editBtn[i].addEventListener("click", function() {
        openModal(i);
    });
    modalClose[i].addEventListener("click", function() {
        closeModal(i);
    });

    function openModal(index) {
        modalEdit[index].style.display = "block";
    }

    function closeModal(index) {
        modalEdit[index].style.display = "none";
    }
}
</script>
  </body>
</html>