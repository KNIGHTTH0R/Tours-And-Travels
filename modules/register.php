<?php
    
    $server = 'localhost';
    $username = 'root';
    $password = '';
    $dbname = 'project';
    
    extract($_POST);
    if($_SERVER["REQUEST_METHOD"] == "POST"){
        $conn = mysqli_connect($server, $username, $password, $dbname);

        if(!$conn) {
            die("Connection failed: ".mysqli_connect_error());
        }

        
        
        $sql = "INSERT INTO user (name, psw, email, date) VALUES('$user', '$pass', '$email', '$date')";


        if(mysqli_query($conn,$sql)) {
            header("Location: http://localhost/project2/index.html", true, 301);
            exit();
        }
        else {
            echo "Error".$sql."<br>".mysqli_error($conn);
        }
        mysqli_close($conn);
    }
    
?>
<!DOCTYPE html>
<html>
    <head>
        <title>Register</title>
        <meta charset="utf-8">
        <link rel="stylesheet" href="../styles/login.css">
        <link rel="stylesheet" href="../styles/indexstyle.css" />
    </head>
    
    <body>
        <div class="header">
            <div class="containerHeader">
                <div class="navbar">
                    <ul>
                        <li style="float:left; font-weight:600;" class="brand" ><a href="http://localhost/project2/index.html">Tours And Travels</a></li>
                        <li style="float:right;" class="brand"><a href="#">Registration Portal</a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="login">
            <h1>Sign Up</h1>
            <form action="register.php" method="post">
                    <input class="inputstyle" type="text" name="user" placeholder="Enter name" required><br>
                    <input class="inputstyle" type="password" name="pass" placeholder="Enter Password" required><br>
                    <input class="inputstyle" type="email" name="email" placeholder="Enter email" required><br>
                    <label>Enter Date of Birth</label><br>
                    <input class="inputstyle" type="date" name="date" required><br>
                    <input type="submit" value="Sign Up" name="adduser"><br>
            </form>
        </div>
    </body>