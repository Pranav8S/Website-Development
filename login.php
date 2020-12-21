<?php

session_start();
$connect = mysqli_connect('localhost', 'root', '');
$select = mysqli_select_db($connect, 'miniproject');



if (isset($_POST['submit'])) {
    $email = $_POST['email'];
    $pwd = $_POST['pwd'];

    if ($email == "admin") {
        chckusername0($email, $pwd);
    } else {
        chckusername($email, $pwd);
    }
}

function chckusername0($email, $pwd) {
    $connect = mysqli_connect('localhost', 'root', '');
    $select = mysqli_select_db($connect, 'miniproject');
    $check = "SELECT uname,pwd FROM login WHERE uname='$email'";
    $check_q = mysqli_query($connect, $check) or die("<div class='loginmsg'>Error on checking Username<div>");
    if (mysqli_num_rows($check_q) > 0) {
        chcklogin0($email, $pwd);
    } else {
        echo "<div id='loginmsg'>Wrong username</div>";
    }
}

function chcklogin0($email, $pwd) {
    $connect = mysqli_connect('localhost', 'root', '');
    $select = mysqli_select_db($connect, 'miniproject');
    $login = "SELECT uname,pwd FROM login WHERE uname='$email'  and pwd='$pwd'";
    $login_q = mysqli_query($connect, $login) or die('Error on checking Username and Password');
    if (mysqli_num_rows($login_q) > 0) {
        $_SESSION['email'] = $email;
        //echo $_SESSION['email'];
        header("location: homepage.php");
    } else {
        echo "<div id='loginmsg'>Wrong Password </div>";
    }
}

function chckusername($email, $pwd) {
    $connect = mysqli_connect('localhost', 'root', '');
    $select = mysqli_select_db($connect, 'miniproject');
    $check = "SELECT email,pwd FROM customer_details WHERE email='$email'";
    $check_q = mysqli_query($connect, $check) or die("<div class='loginmsg'>Error on checking Username<div>");
    if (mysqli_num_rows($check_q) > 0) {
        chcklogin($email, $pwd);
    } 
    else {
        echo "<div id='loginmsg'>Wrong username</div>";
    }
}

function chcklogin($email, $pwd) {
    $connect = mysqli_connect('localhost', 'root', '');
    $select = mysqli_select_db($connect, 'miniproject');
    $login = "SELECT email,pwd FROM customer_details WHERE email='$email'  and pwd='$pwd'";
    $login_q = mysqli_query($connect, $login) or die('Error on checking Username and Password');
    if (mysqli_num_rows($login_q) > 0) {
        $_SESSION['email'] = $email;
        header("location: homepage.php");
    } 
    else {
        echo "<div id='loginmsg'>Wrong Password </div>";
    }
}

?>