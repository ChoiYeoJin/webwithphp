<?php
    function db_init($host, $duser, $dpw, $dname){
        $conn = mysqli_connect($host, $duser, $dpw);
        mysqli_select_db($conn, $dname);
        return $conn;
    }

    function select_class_by_user_id($conn, $email){
        return mysqli_query($conn, "SELECT * FROM class WHERE class_id IN ( SELECT class_id FROM user_class WHERE email = '" . $email . "' )");
    }

    function select_class($conn, $class_id){
        $sql = 'SELECT * FROM class WHERE class_id=' . $class_id;
        $res = mysqli_query($conn, $sql);
        return  mysqli_fetch_assoc($res);
    }

    function insert_user($conn, $user_name, $email, $password){
        $sql = "INSERT INTO user_info(created_datetime, user_name, last_update_datetime, email, password) VALUES(now(),'" . $user_name . "',now(),'" . $email . "','" . $password. "')";
        return mysqli_query($conn, $sql);
    }
    
    function select_user($conn, $email, $password){
        $sql = "SELECT * FROM user_info WHERE email ='".$email."' and password = '".$password."'";
        $res = mysqli_query($conn, $sql);
        return mysqli_fetch_assoc($res);
    }
?>