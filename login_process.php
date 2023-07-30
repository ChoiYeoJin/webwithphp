<?php
//유저가 입력한 login정보를 받아 user_info table 에서 조회하여 유저를 확인한다.
//조회에 성공했다면 index.php에 유저아이디와 함께 전달한다.
//조회에 실패했다면 안내 알림창을 띄우고 다시 로그인 창으로 돌아간다.\
    if(!session_id()){
        session_name("login_session");
        session_start();
    }
    require("config/config.php");
    require("lib/db_manager.php");
    $conn = db_init($config["host"], $config["duser"], $config["dpw"], $config["dname"]);

    $res = select_user($conn, $_POST['email'], $_POST['upw']);
    


    if($res == NULL){
        session_destroy();
        echo "<script>alert('아이디 또는 패스워드 오류.'); location.href='login.php'</script>";     
        //header('Location: http://localhost/webwithphp/login.php');
    }
    else{
         
        $_SESSION['email']= $res['email'];
        $_SESSION['user_name'] = $res['user_name'];
        $_SESSION['user_level'] = $res['user_level'];
        echo "<script>alert('로그인 성공'); location.href='index.php'</script>";
    }
?>