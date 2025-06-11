<?php session_start() ?>
<!doctype html>
<html>
<head>
    <title><?php echo isset( $pageTitle ) ? $pageTitle : "timer" ?></title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <nav>
            <ul class="nav-links">
                <li><a href="landing.php"><h1>landing</h1></a></li>
                <li><a href="login.php"><h1>login</h1></a></li>
                <li><a href="signup.php"><h1>sign up</h1></a></li>
                <?php if($_SESSION['admin'] == 1) {
                echo "<li><a href='admin.php'><h1>admin</h1></a></li>";
                }
                ?>
            </ul>
        </nav>
    </header>