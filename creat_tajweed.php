
<?php
session_start();
if (!isset($_SESSION['id'])) {
    header("Location: index.html");
    exit();
}
?>


<!DOCTYPE html>
<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="cssfiels/creat_tajweed_css.css">

        <title>انشاء حلقة تجوييج</title>
    </head>

    <body>



        <div class="cont">
            <form action="./php/appointment.php" method="POST">
                <div class="top">
                    <h2>إنشاء حلقة تجويد</h2>
                </div>
                <input type="text" name="appointment_type" value="tajweed"
                    hidden>



                <div class="input-box">
                    <input type="text" class="input-field"
                        placeholder="اسم الحلقة" required name="name">

                    <ion-icon name="book-outline"></ion-icon>
                </div>
                <div class="input-box">
                    <input type="text" class="input-field"
                        placeholder="موعد الحلقة" required name="date">

                    <ion-icon name="calendar-outline"></ion-icon>
                </div>


                <div class="input-box">
                    <input type="email" class="input-field"
                        placeholder="البريد الإلكتروني للمشرف" required
                        name="user_email">

                    <ion-icon name="mail-outline"></ion-icon>

                </div>
                <div class="input-box">

                    <input type="submit" name="tajweed_btn" class="submit"
                        value="إنشاء">
                    <ion-icon name="add-circle-outline"></ion-icon>

                </div>
                <div class="two-col">

                </div>

            </form>
        </div>


        <script type="module"
            src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule
            src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>

</html>