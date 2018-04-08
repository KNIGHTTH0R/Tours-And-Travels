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
        
        if (isset($_POST['view'])) {
            $sql = "SELECT * FROM booking WHERE userid = '$userid'";
            $res = mysqli_query($conn,$sql);
            $result = $res->fetch_all(MYSQLI_ASSOC);
            mysqli_close($conn);
        }
    }
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <title>Tours And Travels</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="styles/indexStyle.css" />
</head>
<body>
    <div class="header">
        <div class="containerHeader">
            <div class="navbar">
                <ul>
                    <li style="float:left; font-weight:600;" class="brand" ><a href="#">Tours and Travels</a></li>
                    <li style="float:right; font-size:15px;" class="brand"><a href="modules/logout.php" class="session" style="color:#f44336">Sign Out</a></li>
                    <li style="float:right; font-size:15px;" class="brand"><a href="#"><?= $_SESSION['name'] ?></a></li>
                </ul>
            </div>
        </div>
    </div>
    <div class="container2">
        <h3>Welcome To Tours And Travels</h3>
        <div class="posbutton">
            <a href="modules/book.php">
                <button class="button">Book a tour</button>
            </a>
            <form action="success.php" method="post">
                <button type="submit" class="button" name="view">View Bookings</button>
            </form>
        </div>
    </div>
    
           
            
            <?php
                if (isset($_POST['view'])) {
            ?>       
                    <div class="container2">
                    <div class="posbutton">
                    <h3>Your Bookings</h3><br>
            <?php
                    foreach ($result as $book) {
            ?>      <div class="card">
                        <h1><?= $book['name']?><h1>
                        <h4 style="margin-top:10px"><?= $book['source'] ?> -> <?= $book['dest'] ?></h4>
                        <h4><?= $book['date'] ?></h4>
                        <h4>Booking ID: <?= $book['bookid'] ?><h4>
                    </div>
            <?php
                    }
                }
            ?>
        </div>
    </div>
    <!-- <div class="footer">
        <div class="containerHeader">
            <h3><a>Tours and Guide</a></h3>
            <p style="margin:10px 5px;">&copy;2018 Sarvpriya</p>
        </div>
    </div> -->
</body>
</html>