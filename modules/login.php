<?php
  session_start();
  $server = 'localhost';
  $username = 'root';
  $password = '';
  $dbname = 'project';
  $usernameErr = $passwordErr = $user = $pass = $loginError = $userid = "";
  $countuser = $countpass = 0;

  $conn = mysqli_connect($server, $username, $password, $dbname);

  if($_SERVER["REQUEST_METHOD"] == "POST"){
    if(empty($_POST['user'])) {
      $countuser = $countuser+1;
      $usernameErr= "Please Enter email";
    } else {
      $user = trim($_POST["user"]);
    }
    if(empty($_POST['pass'])) {
      $countpass = $countpass + 1;
      $passwordErr = "PLease Enter Password";
    } else {
      $pass = trim($_POST["pass"]);
    }
  }
  if(!$conn) {
      die("Connection failed: ".mysqli_connect_error());
  }

  if(!empty($user) && !empty($pass)) {
    $sql = "SELECT * FROM  user WHERE email = '$user' AND psw = '$pass'";
    $result = mysqli_query($conn, $sql);
    $count = mysqli_num_rows($result);
    if($count == 1) {
        $result = $result->fetch_all(MYSQLI_ASSOC);
        foreach($result as $names){
            $_SESSION['name'] = $names['name'];
            $_SESSION['userid'] = $names['userid'];
        }
        // $_SESSION['username'] = $user;
        // $_SESSION['userid'] = $userid;
        // $_SESSION['name'] = $res['name'];
        header("Location: http://localhost/project2/success.php", true, 301);
    } else {
      $loginError = "Username Or Password Doesn`t Match.";
    }
  }
  mysqli_close($conn);
?>

<!DOCTYPE HTML>
<html>
    <head>
        <title>Librarian Login Portal</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="../styles/login.css">
        <link rel="stylesheet" href="../styles/indexstyle.css" />
    </head>

    <body>
    <div class="header">
        <div class="containerHeader">
            <div class="navbar">
                <ul>
                    <li style="float:left; font-weight:600;" class="brand" ><a href="http://localhost/project2/index.html">Tours And Travels</a></li>
                    <li style="float:right;" class="brand"><a>Login Portal</a></li>
                </ul>
            </div>
        </div>
    </div>
        <div class="login">
            <h1>Login</h1>
            <form action="login.php" method="post">
                <!-- <label for="user">Username</label><br> -->
                <input class="inputstyle" type="email" name="user" placeholder="Enter Email-id"><br>
                <?php

                    echo "<p style='color:red; margin:0;'>$usernameErr</p>";
                ?>
                <!-- <label for="pass">Password</label><br> -->
                <input class="inputstyle" type="password" name="pass" placeholder="Enter Password"><br>
                <?php

                    echo "<p style='color:red;margin: 0;'>$passwordErr</p>";
                ?><br>
                
                <input type="submit" value="Login" class="loginstyle"><br>
                <?php
                  echo "<p style='color:red;'>$loginError</p>";
                ?>
            </form>
        </div>
    </body>
</html>
