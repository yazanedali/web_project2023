<?php


$username = "root";
$pass = "";
$db = "localhost";
$dbn = "web_project";
$con = mysqli_connect($db, $username, $pass, $dbn);
if ($con) {
} else {
    echo "not";
}

if (isset($_POST['btn_signup'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $password = $_POST['password'];
    $email = $_POST['email'];
    $cpassword = $_POST['cpassword'];
    $role = $_POST['role'];

    $query = "select * from teachers where email='$email' ";
    $res = mysqli_query($con, $query);

    if (mysqli_num_rows($res) > 0) {
        echo "<script>alert('user already exists'); window.location.href='../Sign_up.html';</script>";
    } else if ($password != $cpassword) {
        echo "<script>alert('passwords do not match'); window.location.href='../Sign_up.html';</script>";
    } else {
        $query1 = "insert into teachers(first_name,last_name,email,password,role) values('$first_name','$last_name','$email','$password','$role')";
        $res1 = mysqli_query($con, $query1);
        $row = mysqli_fetch_array($res);
        $_SESSION['id'] = $row['id'];
        $_SESSION['email'] = $row['email'];
        $_SESSION['name'] = $row['first_name'] . " " . $row['last_name'];
        header("Location:../home_page.php");
    }
}
