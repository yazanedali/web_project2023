<?php

session_start();



$username = "root";
$pass = "";
$db = "localhost";
$dbn = "web_project";

$con = mysqli_connect($db, $username, $pass, $dbn);

if ($con) {
} else {
    echo "no con";
}
$res = "";
$error = "";

$stmt = "";
if (isset($_POST['btn_login'])) {
    $email = $_POST['email'];
    $password = $_POST['password'];

    $query = "select * from teachers where email='$email' and password='$password'";
    $res = mysqli_query($con, $query);
    $row = mysqli_fetch_array($res);
    if (@$row["role"] == "admin") {

        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['first_name'] . " " . $row['last_name'];

        $error = "0";

        header("Location:../home_page.php");
    } else {
        $error = "Invalid username or password";
        echo "<script>alert('$error'); window.location.href='../index.html';</script>";
    }
}
