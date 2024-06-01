
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

        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Cairo&display=swap"
            rel="stylesheet">

        <meta charset="UTF-8">
        <title>Title </title>
        <link rel="stylesheet" href="cssfiels/home_css.css">

        <link rel="stylesheet" href="css/home_css.css">

    </head>

    <style>

</style>

    <body>



        <div class="startline"></div>

        <div class="aa ">

            <h1>"الَّذِينَ آتَيْنَاهُمُ الْكِتَابَ يَتْلُونَهُ حَقَّ تِلَاوَتِهِ أُولَئِكَ يُؤْمِنُونَ بِهِ وَمَن يَكْفُرْ بِهِ فَأُولَئِكَ هُمُ الْخَاسِرُونَ"</h1>
        </div>
        <div class="container">
            <div class="verse">
            </div>
            <div class="image-container">
                <img src="img/quran-being-held-hands-close-up.jpg" alt="صورة">
            </div>

        </div>

        <div class="startline"></div>

        <h1>الخدمات الرئيسية</h1>

        <div class="head">



            <div class="item">
                <h3><a href="exam.php">الاختبارات </a>
                </h3>
                <img src="img/icons8-exam-50.png" alt>

            </div>

            <div class="item">
                <h3><a href="creat_tahfeez.php">إنشاء حلقة تحفيظ</a>
                    <ion-icon name="add-circle-outline"></ion-icon>
                </h3>

            </div>

            <div class="item">
                <h3><a href="creat_tajweed.php">إنشاء حلقة تجويد</a>
                    <ion-icon name="add-circle-outline" class="plus"></ion-icon>
                </h3>
            </div>

            <div class="item">
                <h3><a href="mytahfeez.php">حلقات التحفيظ</a>
                    <ion-icon name="book"></ion-icon>
                </h3>

            </div>

            <div class="item">
                <h3><a href="mytajweed.php"> حلقات التجويد

                    </a>
                    <ion-icon name="book"></ion-icon>
                </h3>
            </div>

        </div>



        <div class=" logout" >
            <h3><a href="logout.php"> تسجيل الخروج

            </a>
                <ion-icon name="log-out-outline"></ion-icon>
            </h3>
        </div>

        <div class="endline"></div>

        <script type="module"
            src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
        <script nomodule
            src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
    </body>

</html>