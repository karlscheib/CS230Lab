<?php

if(isset($_POST['login'])){
    require 'dbhandler.php';

    $uname = $_POST['username-email'];
    $password = $_POST['password'];

    if(empty($uname)||empty($password)) {
        header("location: ../login.php?error=EmptyField");
        exit();
    }

    $sql = "SELECT * FROM users WHERE username=? OR email=?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)) {
        header("Location: ../login.php?error=SQLInjection");
        exit();
    }
    else{
        mysqli_stmt_bind_param($stmt, "ss", $uname, $uname);
        mysqli_stmt_execute($stmt);
        $result = mysqli_stmt_get_result($stmt);
        $data = mysqli_fetch_assoc($result);

        if(empty($data)) {
            header("Location: ../login.php?error=UserDNE");
            exit();
        }
        else {
            $pass_check = password_verify($password, $data['password']);
            if($pass_check == true) {
                session_start();
                $_SESSION['uid'] = $data['uid'];
                $_SEESION['firstname'] = $data['firstname'];
                $_SESSION['username'] = $data['username'];
                echo "<h1>Success</h1><p>.$uname</p>"; 
            }
            else{
                header("Location: ../login.php?error=WrongPassword");
                exit();
            }
        }
    }


}
else {
    header("location: ../login.php?");
    exit();
}