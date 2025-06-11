<?php
$pageTitle = 'Sign In';
include('includes/header.php');
require_once('connect.php');
function signUpForm() {
    echo "<p>
    <br>
            <form method='post' action>
                <label for='username'>username:</label>
                <input type='text' id = 'username' name = 'username' required>
                <br>
                <label for='email'>email</label>
                <input type='text' id='email' name='email' required>
                <br>
                <label for='password'>password:</label>
                <input type='text' id = 'password' name = 'password' required>
                <br>
                <input type='submit' value='submit'> 
            </form>
        </p>";
        include('includes/footer.php');
}
// Regex rules
$unameRegex = '/^[a-zA-Z0-9._-]{3,15}$/';
$passRegex = '/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,15}$/';
$emailRegex = '/[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+(?:\.[a-z0-9!#$%&\'*+\/=?^_`{|}~-]+)*@(?:[a-z0-9](?:[a-z0-9-]*[a-z0-9])?\.)+[a-z0-9](?:[a-z0-9-]*[a-z0-9])?/';

    if($_SERVER["REQUEST_METHOD"] === "POST")   {
        $username = $_POST["username"];
        $password = $_POST["password"];
        $email = $_POST["email"];
            // Validate input
        if (!preg_match($unameRegex, $username)) {
            echo "<span class='error'>*Invalid username: must be 3-15 characters</span><br>";
            signUpForm();
            exit();
        }

        if (!preg_match($passRegex, $password)) {
            echo "<span class='error'>*Invalid password: 8–15 chars, 1 uppercase, 1 number</span><br>";
            signUpForm();
            exit();
        }

        if(!preg_match($emailRegex, $email)) {
            echo "<span class='error'>*Invalid Email</span>";
            signUpForm();
            exit();
        }
        
        $sql = "INSERT INTO user (username, email, password) VALUES ('$username', '$email', '$password')";
        if($connection->query($sql)) {
    echo "<span class='error'>Your new account has been added to our database</span>";
    signUpForm();
    exit();
        }
    } else {
        signUpForm();
        exit();
    }
include('includes/footer');
?>