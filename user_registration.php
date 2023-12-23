<?php
session_start();
session_destroy();
session_start();

include "connect1.php";


if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["submit-log"])) {
    $firstName = $_POST["student-firstname"];
    $mname = $_POST["student-midname"];
    $parentname = $_POST["parent-name"];
    $surname = $_POST["student-surname"];
    $address = $_POST["address"];
    $idnumber = $_POST ["student-idnumber"];
    $contact = $_POST ["contact-number"];
    $password = $_POST ["password"];
    $confirmpass = $_POST ["confirm-password"];

    $insertquery = "INSERT INTO reg_info (stud_fname, stud_mname, stud_lname, studID_number, parent_fullname, address, contact_number, password, confirm_pass) VALUES ('$firstName', '$mname', '$surname', '$idnumber', '$parentname', '$address', '$contact', '$password', '$confirmpass')";
    $results = executesQuery($insertquery);
    header("Location: parent_login.php");
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

        <style>
            body {
                margin: 0;
                padding: 0;
                background-color: #62969F;
                font-family: sans-serif;
            }
            .container-fluid{
                width: 60%;
                height: 480px;
                background: #fff;
                top: 50%;
                left: 50%;
                position: absolute;
                transform: translate(-50%, -50%);
                box-sizing: border-box;
                padding: 70px 30px;
                display: flex;
                flex-wrap: wrap;
            }
            .avatar {
                width: 130px;
                height: 130px;
                position: absolute;
                left: 41%;
                top: -2%;
            }
            h1 {
                margin: 0;
                padding: 0 0 20px;
                text-align: left;
                font-size: 18px;
                margin-top: 30px;
                color: #297582;
                margin-left: 10px;
                font-weight: bold;
            }
            .container-fluid p {
                margin: 0;
                padding: 0;
                font-weight: bold;
            }
            .container-fluid input {
                width: 100%;
                left: 10px;
                margin: 10px;
                
            }
            .container-fluid input[type="text"], input[type="password"] {
                border: none;
                border-bottom: 1px solid #fff;
                background: #D9D9D9;
                outline: none;
                height: 40px;
                width: 250px;
                color: #545454;
                font-size: 16px;
                border-radius: 10px;
                padding-left: 20px;
                padding-right: 20px;
                
            }
            .container-fluid input[type="date"] {
                border: none;
                border-bottom: 1px solid #fff;
                background: #D9D9D9;
                outline: none;
                height: 40px;
                width: 300px;
                color: #545454;
                font-size: 16px;
                border-radius: 10px;
                padding-left: 20px;
                padding-right: 20px;
                margin-left: 10px;
                text-transform: uppercase;
            }
            .container-fluid button {
                border: none;
                outline: none;
                height: 35px;
                width: 100px;
                background: #1c8adb;
                font-size: 18px;
                border-radius: 10px;
                margin-bottom: 10px;
                margin-top: 10px;
                margin-left: 260px;
                color: #fff;
            }
            .container-fluid button:hover {
                cursor: pointer;
                background: #39dc79;
                color: #000;
            }
            .container-fluid a {
                text-decoration: none;
                font-size: 14px;
                color: #62969F;
                
                
            }
            .container-fluid p span {
                font-size: 12px;
                text-decoration: none;
                color: gray;
                margin-left: 170px;
            }
            .container-fluid a:hover {
                color: #39dc79;
            }

            


        </style>
    </head>

    <body>
        <div class="container-fluid">
            <img src="https://i.ibb.co/vLvDRJ7/logo-2-1.png" class="avatar">
            <h1>Student Information</h1>
            <form class="row g-3">
                <div class="col-md-6">
                    <label for="student-firstname" class="student-firstname"></label>
                    <input type="text" class="stud-fname" id="stud-fname" placeholder="Student First Name" required>
                </div>
                <div class="col-md-6">
                    <label for="student-middlename" class="student-middlename"></label>
                    <input type="text" class="stud-mname" id="stud-mname" placeholder="Student Middle Name">
                </div>
                <div class="col-md-6">
                    <label for="student-lastname" class="student-lastname"></label>
                    <input type="text" class="stud-lname" id="stud-lname" placeholder="Student Last Name" required>
                </div>
                <div class="col-md-6">
                    <label for="student-ID" class="student-ID"></label>
                    <input type="text" class="stud-ID" id="stud-ID" placeholder="Student ID Number" required>
                </div>

            </form>
            
        </div>
        
    </body>
</html>