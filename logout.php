<?php
    session_unset();
    session_destroy();
    echo "<script>alert('로그아웃 되었습니다.'); location.href='login.php'</script>";
    //header('Location: http://localhost/webwithphp/login.php');
?>