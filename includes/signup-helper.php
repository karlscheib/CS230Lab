<?php

if(isset($_POST['signup-submit'])){
    require 'dbhandler.php';
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirmPassword = $_POST['confirm-password'];
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];

    if($password !== $confirmPassword) {
        header("location: ../signup.php?error=diffPasswords");
        exit();
    }

    else{
        $sql = "SELECT username FROM users WHERE username=?";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)) {
            header("location: ../signup.php?error=SQLInjection");
            exit();
        }
        else {
            mysqli_stmt_bind_param($stmt, "s", $username);
            mysqli_stmt_execute($stmt);
            mysqli_stmt_store_result($stmt);
            $check = mysqli_stmt_num_rows($stmt);

            if($check > 0) {
                header("location: ../signup.php?error=UsernameTaken");
                exit();
            }
            else {
                $sql = "INSERT INTO users (lastname, firstname, email, username, password) VALUES (?, ?, ?, ?, ?)";
                $stmt = mysqli_stmt_init($conn);
                if(!mysqli_stmt_prepare($stmt, $sql)) {
                    header("location: ../signup.php?error=SQLInjection");
                    exit();
                }
                else {
                    $hashed = password_hash($password, PASSWORD_BCRYPT);
                    mysqli_stmt_bind_param($stmt, "sssss", $lastname, $firstname, $email, $username, $hashed);
                    mysqli_stmt_execute($stmt);
                    mysqli_stmt_store_result($stmt);
                    
                    $sqlImg = "INSERT INTO profiles (username, firstname) VALUES ('$username','$firstname')";
                    mysqli_query($conn, $sqlImg);

                    header("location: ../signup.php?signup=success");
                    exit();
                }
            }
        }
        mysqli_stmt_close($stmt);
        mysqli_close($conn);
    }
}
else {
    header("location: ../signup.php?");
    exit();
}