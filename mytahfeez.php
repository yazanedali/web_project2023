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
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap" rel="stylesheet">
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="cssfiels/mytahfeez.css">
    <link rel="stylesheet" href="css/mytahfeez.css">
    <link rel='stylesheet' href='https://cdn-uicons.flaticon.com/uicons-regular-straight/css/uicons-regular-straight.css' />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@10/swiper-bundle.min.css" />

    <style>

    </style>

</head>

<body>

    <div class="line"></div>

    <h1> حلقات التحفيظ</h1>

    <div class=" logout" >
        <h3><a href="home_page.php">العودة للصفحة الرئيسية

            </a>
            <ion-icon name="arrow-back-circle-outline"></ion-icon>
        </h3>
    </div>

    <div class="products__container grid">

        <?php
        $email = $_SESSION['email'];
        $select_pro = $conn->prepare("SELECT * FROM appointment WHERE appointment_type='tahfeez' AND user_email='$email'");
        $select_pro->execute();
        $result = $select_pro->get_result();

        if ($result->num_rows == 0) {
            echo '<h2 class="text-center">لا يوجد حلقات لك</h2>';
        } else {
            while ($fetch_mytahfeez = $result->fetch_assoc()) {

                echo '<form action="tahfeez.php" method="GET">
                <div class="product__item">
                    <div class="product__banner">
                    <button type="submit" class="product__images">
                    <img src="img/387415700_1283862482297793_7168023069405008623_n.png" alt class="product__img default">
                    <img src="img/387415700_1283862482297793_7168023069405008623_n.png" alt class="product__img hover">
                    </button>
                        <div class="product__actions">
                        </div>
                    </div>
                    <input type="hidden" name="appointment_id" value="' . $fetch_mytahfeez['id'] . '">
                    <h2 class="product__title">' . $fetch_mytahfeez['name'] . '' . $fetch_mytahfeez['date'] . '</h2>
                </div>
            </form>';
            }
        }
        ?>

    </div>
    <script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
    <script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
</body>

</html>