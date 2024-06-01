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
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $father_phone = $_POST['father_phone'];
    $description = $_POST['description'];
    $type = 'tajweed';
    $teacher_id = $_SESSION['id'];
    $appointment_id = $_POST['appointment_id'];


    $query1 = "INSERT INTO students(name, phone, father_phone, description, type, teachers_id) VALUES ('$name', '$phone', '$father_phone', '$description', '$type', '$teacher_id')";
    $res1 = mysqli_query($conn, $query1);

    if ($res1) {

        $new_student_id = mysqli_insert_id($conn);


        $query2 = "INSERT INTO student_appointment(student_id, appointment_id) VALUES ('$new_student_id', '$appointment_id')";
        $res2 = mysqli_query($conn, $query2);

        if ($res2) {
            header("Location: ../tajweed.php?appointment_id=" . $appointment_id);
        } else {
            echo "Error linking student to appointment: " . mysqli_error($conn);
        }
    } else {
        echo "Error adding new student: " . mysqli_error($conn);
    }
}


if (isset($_POST['deleteUser'])) {

    $student_id = $_POST['id'];
    $appointment_id = $_POST['appointment_id'];


    $conn->begin_transaction();

    try {

        $stmt = $conn->prepare("DELETE FROM student_appointment WHERE student_id = ?");
        $stmt->bind_param("i", $student_id);
        $stmt->execute();


        $stmt = $conn->prepare("DELETE FROM students WHERE id = ?");
        $stmt->bind_param("i", $student_id);
        $stmt->execute();


        $conn->commit();
        header("Location: ../tajweed.php?appointment_id=" . $appointment_id);
    } catch (Exception $e) {

        $conn->rollback();
        echo "Error deleting student: " . $e->getMessage();
    }
}


if (isset($_POST['editUser'])) {

    $userId = $_POST['id'];
    $name = $_POST['name'];
    $phone = $_POST['phone'];
    $father_phone = $_POST['father_phone'];
    $description = $_POST['description'];
    $type = 'tajweed';
    $appointment_id = $_POST['appointment_id'];


    $stmt = $conn->prepare("UPDATE students SET name = ?, phone = ?, father_phone = ?, description = ?, type = ? WHERE id = ?");
    $stmt->bind_param("sssssi", $name, $phone, $father_phone, $description, $type, $userId);
    $stmt->execute();
    if ($stmt->execute()) {
        header("Location: ../tajweed.php?appointment_id=" . $appointment_id);
    } else {
        echo "Error: " . $stmt->error;
    }
}
