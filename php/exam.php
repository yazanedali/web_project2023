<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: ../index.html");
    exit();
}
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "web_project";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}


if (isset($_POST['newBtn'])) {

    $student_name = $_POST['student_name'];
    $mark = $_POST['mark'];
    $date = $_POST['date'];
    $descriptions = $_POST['descriptions'];
    $teacher_id = $_SESSION['id'];

    $number = $_POST['number'];
    $query1 = "INSERT INTO exam (student_name, number,mark, date, descriptions, teachers_id) VALUES ('$student_name','$number', '$mark', '$date', '$descriptions', '$teacher_id')";

    $res1 = mysqli_query($conn, $query1);

    if (!$res1) {
        echo "Error: " . mysqli_error($conn);
    }
    header("Location:../exam.php");
}

if (isset($_POST['deleteExam'])) {
    $student_name = $_POST['student_name'];
    $mark = $_POST['mark'];
    $date = $_POST['date'];
    $descriptions = $_POST['descriptions'];
    $teacher_id = $_SESSION['id'];

    $stmt = $conn->prepare("DELETE FROM exam WHERE student_name = ? AND mark = ? AND date = ? AND descriptions = ? AND teachers_id = ?");
    $stmt->bind_param("ssssi", $student_name, $mark, $date, $descriptions, $teacher_id);

    if ($stmt->execute()) {
        header("Location: ../exam.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
if (isset($_POST['editExam'])) {
    $id = $_POST['id'];
    $student_name = $_POST['student_name'];
    $mark = $_POST['mark'];
    $date = $_POST['date'];
    $descriptions = $_POST['descriptions'];
    $number = $_POST['number'];
    $teacher_id = $_SESSION['id'];

    $stmt = $conn->prepare("UPDATE exam SET student_name = ?, mark = ?, date = ?, descriptions = ?, number = ? WHERE id = ? AND teachers_id = ?");
    $stmt->bind_param("ssssiii", $student_name, $mark, $date, $descriptions, $number, $id, $teacher_id);

    if ($stmt->execute()) {
        header("Location: ../exam.php");
    } else {
        echo "Error: " . $stmt->error;
    }
}
