<?php
    require("config/config.php");
    require("lib/db_manager.php");
    $conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);

    $sql = "INSERT INTO user_info(created_datetime, user_name, last_update_datetime, email, password) VALUES(now(),'". $_POST['user_name']."',now(),'". $_POST['email']."','".$_POST['password']."')";
    
    $class_user = insert_user($conn, $_POST['user_name'], $_POST['email'], $_POST['password']);

    if($class_user == false){        
        echo "<script>alert('오류가 발생했습니다. 관리자에게 문의해주세요'); location.href='login.php'</script>";
    }

        echo "<script>alert('회원가입 성공. 관리자에게 문의해주세요'); location.href='login.php'</script>";
?>