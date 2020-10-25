<?php

include 'dbh.inc.php';

if (isset($_POST['login-submit'])) {

    $mailuid = $_POST['mailuid'];
    $pwd = $_POST['pwd'];

    if (empty($mailuid) || empty($pwd)) {
        header("Location:../adminLogin.php?error=empty");
        exit();
    } else {
        $sql = "SELECT * FROM users WHERE uidUsers=? OR emailUsers=?;";
        $stmt = mysqli_stmt_init($conn);

        if (!mysqli_stmt_prepare($stmt, $sql)) {
            header("Location:../adminLogin.php?error=sql");
            exit();
        } else{
            mysqli_stmt_bind_param($stmt, "ss", $mailuid, $mailuid);
            mysqli_stmt_execute($stmt);
            $result = mysqli_stmt_get_result($stmt);

            if ($row = mysqli_fetch_assoc($result)) {
                $pwdCheck = password_verify($pwd, $row['pwdUsers']);

                if ($pwdCheck === false) {
                    header("Location:../adminLogin.php?error=wrongpwd");
                    exit();
                } else if ($pwdCheck === true) {
                    session_start();
                    $_SESSION['userId'] = $row['idUsers'];
                    $_SESSION['userUid'] = $row['uidUsers'];

                    header("Location:../adminindex.php?login=success");
                    exit();
                } else {
                    header("Location:../adminLogin.php?error=wrongpwd");
                    exit();
                }
            } else {
                header("Location:../adminLogin.php?error=nouser");
                exit();
            }
        }
    }


} else{
    header("Location:../adminLogin.php");
    exit();
}