<?php
    session_start();
    $userid = $_SESSION['userid'];
    if( !isset($_SESSION['name']) ){
        header("Location: https://localhost/project2/modules/login.php", true, 301);
        exit();
    } 
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

        
        
        $sql = "INSERT INTO booking (source, dest, name, date, userid) VALUES('$user', '$pass', '$email', '$date', '$userid')";


        if(mysqli_query($conn,$sql)) {
            header("Location: http://localhost/project2/success.php", true, 301);
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
        <title>Booking Portal</title>
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
                        <li style="float:right; font-size:15px;" class="brand"><a href="modules/logout.php" class="session" style="color:#f44336">Sign Out</a></li>
                        <li style="float:right; font-size:15px;" class="brand"><a href="#"><?= $_SESSION['name'] ?></a></li>
                    </ul>
                </div>
            </div>
        </div>
        <div class="container2">
            <h2>Book a Tour</h2>
            <form action="book.php" method="post">
                    <input class="inputstyle" type="text" name="user" placeholder="Enter Source" required><br>
                    <input class="inputstyle" type="text" name="pass" placeholder="Enter Destination" required><br>
                    <input class="inputstyle" type="text" name="email" placeholder="Enter Name" required><br>
                    <label>Enter Date of Travel</label><br>
                    <input class="inputstyle" type="date" name="date" required><br>
                    <input type="submit" value="Book" name="adduser"><br>
            </form>
        </div>
    </body>