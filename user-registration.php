<?php
session_start();
session_destroy();
session_start();

include "connect1.php";

if (isset($_POST["submit-log"])) {
  $fName = $_POST["student-firstname"];
  $mInitial = $_POST["student-minitial"];
  $lName = $_POST["student-lastname"];
  $studID = $_POST["student-id"];
  $bday = $_POST["birthday"];
  $section = $_POST["stud-section"];
  $gender = $_POST["stud-gender"];
  $healthcondi = $_POST["asthma"];

  $insertquery = "INSERT INTO reg_info (stud_fname, stud_mname, stud_lname, studID_number, bday, gender, section, health_condi ) 
  VALUES ('$fName', '$mInitial', '$lName', '$studID', '$bday', '$section', '$gender', '$healthcondi')";
  $results = executesQuery($insertquery);
  header("Location: user-registration2.php");

}

?>

<html>
  <head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <title>Sign Up</title>
  </head>

    <style>
        body {
          margin: 0;
          padding: 0;
          background-color: #62969F;
          font-family: sans-serif;
          min-height: 100vh;
          display: flex;
          align-items: center;
          justify-content: center;
        }
        .container-fluid {
          max-width: 700px;
          width: 100%;
          background: #fff;
          left: 50%;
          top: 50%;
          position: absolute;
          transform: translate(-50%, -50%);
          box-sizing: border-box;
          display: flex;
          flex-direction: column;
        }
        .avatar {
          width: 110px;
          height: 110px;
          position: absolute;
          left: 41%;
          top: -2%;
        }
        h1{
          margin: 0;
          padding: 0 0 20px;
          text-align: left;
          font-size: 18px;
          margin-top: 100px;
          color: #297582;
          font-weight: bold;
        }
        .col-12 p{
          font-size: 15px;
        }
        .col-12 span {
          color: red;
          font-style: italic;
        }
        .col-12 label {
          margin-left: 8px;
        }
        .col-12 .form-check4,.form-check5,
        .form-check6, .form-check8 {
          box-sizing: border-box;
          margin: 5px;
        }
        .btn {
          color: #fff;
          background: #297582;
          border: none;
        }
        .btn:hover {
          background: #3bafda !important;
          color: #fff;
        }
    </style>

    <body>
        <div class="container-fluid">
            <img src="https://i.ibb.co/vLvDRJ7/logo-2-1.png" class="avatar">
            <h1>Student Information</h1>

            <form class="row g-3" method="POST">
                <div class="col-md-4">
                  <label for="student-fname" class="student-firstname"></label>
                  <input type="text" class="form-control" id="stud-fname" name="student-firstname" placeholder="First Name" required>
                </div>
                <div class="col-md-4">
                  <label for="student-nitial" class="student-middleinitial"></label>
                  <input type="text" class="form-control" id="stud-mname" name="student-minitial" placeholder="Middle Initial">
                </div>
                <div class="col-md-4">
                    <label for="student-lname" class="student-lastname"></label>
                    <input type="text" class="form-control" id="stud-lname" name="student-lastname" placeholder="Last Name" required>
                </div>
                <div class="col-12">
                <label for="stud-ID" class="student-ID"></label>
                  <input type="text" class="form-control" id="stud-id" name="student-id" placeholder="Student ID Number" required>
                </div>
                <div class="col-md-4">
                  <label for="bday" class="Bday"></label>
                  <input type="date" class="form-control" id="bday" name="birthday" placeholder="DD/MM/YYYY" required>
                </div>
                <div class="col-md-4">
                  <label for="section" class="Section"></label>
                  <select id="section" class="form-select" name="stud-section" required>
                    <option selected>Choose Section</option>
                    <option>Charity</option>
                    <option>Honesty</option>
                  </select>
                </div>
                <div class="col-md-4">
                  <label for="gender" class="Gender"></label>
                  <select id="gender" class="form-select" name="stud-gender" required>
                    <option selected>Choose Gender</option>
                    <option>Male</option>
                    <option>Female</option>
                  </select>
                </div>
                <div class="col-12">
                    <label for="health-condi" class="Health-condition" name="health-condi"></label>
                    <p>Please select your child's health condition: <span>(select all necessary)</span></p>
                    <input type="checkbox"  name="health-condi" id="health" class="form-check7">
                    <label for="No">None</label>
                    <input type="checkbox"  name="health-condi" id="health" class="form-check1">
                    <label for="asthma" name="asthma" value="asthma">Asthma</label>
                    <input type="checkbox"  value="Poor Eyesight" name="health-condi" id="health" class="form-check2">
                    <label for="eyesight">Poor Eyesight</label>
                    <input type="checkbox"  value="Epilepsy" name="health-condi" id="health" class="form-check3">
                    <label for="epilepsy">Epilepsy</label><br>
                    
                    <label for="allergy">Allergy <span>(e.g. peanuts, shellfish, milk)</span>:</label>
                    <input type="text" name="health-condi" id="health" class="form-check4"> <br>

                    <label for="heart">Heart Disease <span>(e.g. congenital, pericardial)</span>:</label>
                    <input type="text" name="health-condi" id="health" class="form-check5"> <br>

                    <label for="pulmonary">Pulmonary Disease <span>(e.g. bronchitis, pneumonia)</span>:</label>
                    <input type="text" name="health-condi" id="health"  class="form-check6"> <br>

                    <label for="others">Others (specify):</label>
                    <input type="text" name="health-condi" id="health" class="form-check8"> <br>
                </div>
                <div class="col-12">
                    <nav aria-label="Page navigation example">
                        <ul class="pagination">
                        <button type="submit" class="btn btn-success" name="submit-log">Next</button>
                        </ul>
                      </nav>
                </div>
              </form>
        </div>
    </body>
</html>