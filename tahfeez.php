<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.html");
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
if (isset($_GET['appointment_id'])) {
    $appointment_id = $_GET['appointment_id'];
    $teacher_id = $_SESSION['id'];
    $select_pro = $conn->prepare("
        SELECT s.* 
        FROM students s 
        JOIN student_appointment sa ON s.id = sa.student_id 
        WHERE sa.appointment_id = ? AND s.teachers_id = ? 
    ");
    $select_pro->bind_param("ii", $appointment_id, $teacher_id);
    $select_pro->execute();
    $result = $select_pro->get_result();
} else {
    echo "<p></p>";
}

?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جدول الطلاب</title>
    <link rel="stylesheet" href="css/tah_css.css">
    <link rel="stylesheet" href="css/tah2_css.css">
</head>

<body>

    <div class="line"></div>

    <div class=" logout" >
        <h3><a href="mytahfeez.php">العودة للصفحة السابقة

            </a>
            <ion-icon name="arrow-back-circle-outline"></ion-icon>
        </h3>
    </div>

    <div class="header-info">
        <h1> جدول الطلاب في حلقات التحفيظ</h1>
        <p>اسم المشرف: <?php echo $_SESSION['name'] ?></p>
    </div>
    <form action="./php/users_tahfeez.php" method="POST">
        <input type="hidden" name="appointment_id" value="<?php echo $appointment_id ?>">
        <table>
            <thead>
                <tr>
                    <th>اسم الطالب</th>
                    <th>رقم الهاتف</th>
                    <th>رقم هاتف ولي الأمر</th>
                    <th>ملاحظات</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php

                if ($result->num_rows == 0) {
                    echo '<tr class="new-student">
                        <td>لا يوجد طلاب في هذه الحلقة</td>
                    </tr>';
                } else {
                    while ($student_tahfeez = $result->fetch_assoc()) {

                        echo ' <tr class="new-student">
                <td><input type="text" name="name" value="' . $student_tahfeez['name'] . '" placeholder="اسم الطالب" style="border: none; height: 40px;"></td>
                <td><input type="text" name="phone" value="' . $student_tahfeez['phone'] . '" placeholder="رقم الهاتف" style="border: none; height: 40px;"></td>
                <td><input type="text" name="father_phone" value="' . $student_tahfeez['father_phone'] . '" placeholder="رقم هاتف ولي الأمر" style="border: none; height: 40px;"></td>
                <td><input type="text" name="description" value="' . $student_tahfeez['description'] . '" placeholder="ملاحظات" style="border: none; height: 40px;"></td>
                <td>
                    <input type="hidden" name="id" value="' . $student_tahfeez['id'] . '">                    
                         <button class="confirm-button" type="submit" name="editUser""><img src="img/icons8-done-24.png" alt ></button>
                    <button class="confirm-button" type="submit"  name="deleteUser""><img src="img/icons8-delete-24.png" alt"></button>
                </td>
            </tr>';
                    }
                }

                ?>


            </tbody>
        </table>
    </form>


    <div class="button-container">
        <button class="add-button" onclick="addStudent()">إضافة
            طالب</button>
    </div>

    <script>
    </script>

</body>
<script>
    function addStudent() {
        var table = document.querySelector("table tbody");
        var newRow = table.insertRow(table.rows.length);
        newRow.classList.add("new-student");

        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        var cell4 = newRow.insertCell(3);
        var cell5 = newRow.insertCell(4);

        cell1.innerHTML =
            '<input type="text" name="name" placeholder="اسم الطالب" style="border: none; height: 40px;">';
        cell2.innerHTML =
            '<input type="text" name="phone" placeholder="رقم الهاتف" style="border: none; height: 40px;">';
        cell3.innerHTML =
            '<input type="text" name="father_phone" placeholder="رقم هاتف ولي الأمر" style="border: none; height: 40px;">';
        cell4.innerHTML =
            '<input type="text"  name="description" placeholder="ملاحظات" style="border: none; height: 40px;">';
        cell5.innerHTML =
            '<button class="confirm-button" type="submit" name="newBtn"><img src="img/icons8-done-24.png" alt=""></button>';
    }

</script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>