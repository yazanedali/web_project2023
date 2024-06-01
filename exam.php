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
// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>جدول العلامات</title>
    <link rel="stylesheet" href="css/exam_css.css">
    <link rel="stylesheet" href="css/exam2_css.css">
</head>

<body>

    <div class="line"></div>
    <h1>جدول العلامات</h1>

    <div class=" logout" >
        <h3><a href="home_page.php">العودة للصفحة الرئيسية

            </a>
            <ion-icon name="arrow-back-circle-outline"></ion-icon>
        </h3>
    </div>

    <div class="header-info">

        <p>اسم المشرف:
            <?php echo $_SESSION['name'] ?>
        </p>
    </div>
    <form action="./php/exam.php" method="POST">
        <table>
            <thead>
                <tr>
                    <th>اسم الطالب</th>
                    <th>رقم الجزء</th>
                    <th> علامة الامتحان (من 100)</th>
                    <th>تاريخ الامتحان</th>
                    <th>ملاحظات</th>
                    <th>إجراءات</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $id = $_SESSION['id'];
                $select_pro =
                    $conn->prepare("SELECT * FROM exam WHERE teachers_id='$id'");
                $select_pro->execute();
                $result = $select_pro->get_result();

                if ($result->num_rows == 0) {
                    echo '<tr class="new-student">
                        <td>لا يوجد امتحانات</td>
                    </tr>';
                } else {
                    while ($fetch_exam = $result->fetch_assoc()) {

                        echo ' <tr class="new-student">
                        <td><input name="student_name" type="text" value="' . $fetch_exam['student_name'] . '" placeholder="اسم الطالب" style="border: none; height: 40px;"></td>
            <td><input type="text" name="number" value="' . $fetch_exam['number'] . '" placeholder="رقم الجزء" style="border: none; height: 40px;"></td>
            <td><input type="text" name="mark" value="' . $fetch_exam['mark'] . '" placeholder="علامة الامتحان" style="border: none; height: 40px;"></td>
            <td><input type="text" name="date" value="' . $fetch_exam['date'] . '" placeholder="تاريخ الامتحان" style="border: none; height: 40px;"></td>
            <td><input type="text" name="descriptions" value="' . $fetch_exam['descriptions'] . '" placeholder="ملاحظات" style="border: none; height: 40px;"></td>
            <td>      <input type="hidden" name="id"
                                value="' . $fetch_exam['id'] . '">
                                <button class="confirm-button" type="submit" name="editExam""><img src="img/icons8-done-24.png" alt ></button>
                                <button class="confirm-button" type="submit"  name="deleteExam""><img src="img/icons8-delete-24.png" alt"></button>
                                

                        </td>
                    </tr>';
                    }
                }
                ?>


            </tbody>
        </table>
    </form>

    <div class="button-container">
        <button class="add-button" onclick="addMark()">إضافة
            امتحان</button>
    </div>

    <script>
    </script>

</body>

<script>
    function addMark() {
        var table = document.querySelector("table tbody");
        var newRow = table.insertRow(table.rows.length);
        newRow.classList.add("new-student");

        var cell1 = newRow.insertCell(0);
        var cell2 = newRow.insertCell(1);
        var cell3 = newRow.insertCell(2);
        var cell4 = newRow.insertCell(3);
        var cell5 = newRow.insertCell(4);
        var cell6 = newRow.insertCell(5);


        cell1.innerHTML =
            '<input type="text" name="student_name" placeholder="اسم الطالب" style="border: none; height: 40px;">';
        cell2.innerHTML =
            '<input type="text" name="number" placeholder="رقم الجزء" style="border: none; height: 40px;">';
        cell3.innerHTML =
            '<input type="text" name="mark" placeholder="علامة الامتحان" style="border: none; height: 40px;">';
        cell4.innerHTML =
            '<input type="text" name="date" placeholder="تاريخ الامتحان" style="border: none; height: 40px;">';
        cell5.innerHTML =
            '<input type="text" name="descriptions" placeholder="ملاحظات" style="border: none; height: 40px;">';
        cell6.innerHTML =
            '<button class="confirm-button" type="submit" name="newBtn"><img src="img/icons8-done-24.png" alt=""></button>';
    }

</script>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>

</html>