<?php
    session_start();
    session_destroy();
    header("Location: https://localhost/project2/index.html", true, 301);
    exit();
?>