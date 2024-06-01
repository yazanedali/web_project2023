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

if (isset($_POST['tahfeez_btn']) || isset($_POST['tajweed_btn'])) {

    $name = $_POST['name'];
    $date = $_POST['date'];
    $appointment_type = $_POST['appointment_type'];
    $user_email = $_POST['user_email'];

    $query1 = "insert into appointment(name,date,appointment_type,user_email) values('$name','$date','$appointment_type','$user_email')";
    $res1 = mysqli_query($con, $query1);

    if ($res1) {
        if ($appointment_type == "tahfeez")
            header("Location:../mytahfeez.php");
        else
            header("Location:../mytajweed.php");
    } else {
        echo "not";
    }
}
