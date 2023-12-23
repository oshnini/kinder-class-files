<?php
    session_start();
    session_destroy();
    session_start();

    error_reporting(E_ALL);
    ini_set("display_errors", 1);

    include "connect.php";

    $error =""; //FOR ERROR MESSAGE

    if (isset($_POST["submit-log"])) {
        $username = $_POST["username"];
        $password = $_POST["password"];

        $query = "SELECT * FROM admin_login WHERE email = '$username' AND password = '$password'";
        $results = executesQuery($query);
        $row = mysqli_fetch_assoc($results);

        if(mysqli_num_rows($results) > 0) {
            $_SESSION["loggedin"] = "true";
            $_SESSION["username"] = $username;
            header('Location: home.php');
        } else {
            $error = "Wrong username or password";
        }
    }
?>
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">

        <title>Admin Login</title>

        <style>
            body {
                margin: 0;
                padding: 0;
                background-color: #62969F;
                font-family: sans-serif;
            }
            .login-box {
                width: 480px;
                height: 390px;
                background: #fff;
                top: 50%;
                left: 50%;
                position: absolute;
                transform: translate(-50%, -50%);
                box-sizing: border-box;
                padding: 70px 30px;
            }
            .avatar {
                width: 250px;
                height: 250px;
                position: absolute;
                left: 25%;
                top: -10%;
            }
            h1 {
                margin: 0;
                padding: 0 0 20px;
                text-align: center;
                font-size: 15px;
                margin-top: 70px;
                color: #297582;
                margin-left: 10px;
            }
            .login-box p {
                margin: 0;
                padding: 0;
                font-weight: bold;
            }
            .login-box input {
                width: 100%;
                margin-bottom: 20px;
                
            }
            .login-box input[type="text"], input[type="password"] {
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
                margin-left: 60px;
            }
            .login-box button {
                border: none;
                outline: none;
                height: 35px;
                width: 100px;
                background: #1c8adb;
                font-size: 18px;
                border-radius: 10px;
               margin-bottom: 10px;
                margin-left: 160px;
                color: #fff;
            }
            .login-box button:hover {
                cursor: pointer;
                background: #39dc79;
                color: #000;
            }
            .login-box a {
                text-decoration: none;
                font-size: 14px;
                color: #62969F;
                
                
            }
            .login-box p span {
                font-size: 12px;
                text-decoration: none;
                color: gray;
                margin-left: 70px;
            }
            .login-box a:hover {
                color: #39dc79;
            }


        </style>

    </head>

    <body>
        <div class="login-box">
        <form method="POST" action = "<?php echo htmlspecialchars($_SERVER['PHP_SELF']);?>">
                <img src="https://i.ibb.co/vLvDRJ7/logo-2-1.png" class="avatar">
                <h1>Login</h1> 
                
                <!--<p>Student ID Number</p> -->
                <input type="text" name="username" id="username" placeholder=" Email" required>
                <!-- <p>Password</p> -->
                <input type="password" name="password" id="password" placeholder=" Password" required>
                 
                <button class="submit-log" type="submit" name="submit-log" id="submit-log" value="Login">Login</button><br>
                <!--<p><span>Don't have an account?</span> <a href="registration.php">Register Here</a></p> -->
            </form>
        </div>
        
    </body>
</html>