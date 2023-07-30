<!DOCTYPE html>
<html>

<?php
//나중에 로그인 하면
$user_id = 1;
$conn = mysqli_connect("localhost", "root", 1111);
mysqli_select_db($conn, "study_project");
$class_res = mysqli_query($conn, "SELECT * FROM class WHERE class_id IN ( SELECT class_id FROM user_class WHERE user_id = " . $user_id . " )");


?>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://localhost/webwithphp/css/style.css">
</head>

<body id="target">
    <header>
        <img src="./img/icon_19.png" alt="공부">
        <h1>Sign in</a></h1>
    </header>

    <article>
        <form action="process.php" method="POST">
            <p>
                name : <input type = "text" name = "user_name">                
            </p>
            <p>
                email : <input type = "text" name = "email">                
            </p>
            <p>
                password : <input type = "text" name = "password">
            </p>
            <input type="submit" name="name">
        </form>
    </article>
</body>

</html>