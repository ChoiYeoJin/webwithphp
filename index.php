<?php
require("config/config.php");
require("lib/db_manager.php");
$conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);
//$email = "test@email.com";
session_name("login_session");
session_start();
$email = $_SESSION['email'];
$user_name = $_SESSION['user_name'];
$user_level = $_SESSION['user_level'];
$class_res = select_class_by_user_id($conn, $email);
echo "<h2>" . $user_name . "님 어서 오세요.</h2>";
echo "<h3> 학습 레벨 : " . $user_level . "</h3>";
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <link rel="stylesheet" type="text/css" href="http://localhost/webwithphp/css/style.css">
</head>

<body id="target">
    <a href="./logout.php">로그아웃</a>
    <header>
        <img src="./img/icon_19.png" alt="공부">
        <h1><a href="http://localhost/webwithphp/javascript/test.php">Study Project</a></h1>
    </header>

    <nav>
        <h3>수강 리스트</h3>
        <ol>
            <?php
            while ($row = mysqli_fetch_assoc($class_res)) {
                echo '<li><a href="http://localhost/webwithphp/index.php?id=' . $row['class_id'] . '">' . $row['class_name'], '</a></li>' . "\n";
            }
            ?>
        </ol>
    </nav>
    <div id="control">
        <input type="button" value="white" onclick="document.getElementById('target').className='white'" />
        <input type="button" value="black" onclick="document.getElementById('target').className='black'" />
        <input type="button" value="blue" onclick="document.getElementById('target').className='blue'" />
        <input type="button" value="logout" onclick="" />
    </div>
    <article>
        <?php
        if (empty($_GET['id']) === false) {
            $row = select_class($conn, $_GET['id']);
            echo '<h2>' . $row['class_name'] . '</h2>';
            echo $row['description'];
        }
        ?>
    </article>
</body>

</html>