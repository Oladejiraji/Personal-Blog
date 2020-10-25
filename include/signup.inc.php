<?php

if (isset($_POST['signup-submit'])) {


require 'dbh.inc.php';

$uid = $_POST['uid'];
$email = $_POST['email'];
$pwd = $_POST['pwd'];

$hashedPwd = password_hash($pwd, PASSWORD_DEFAULT);

$sql = "INSERT INTO users (uidUsers, emailUsers, pwdUsers) VALUES('$uid', '$email', '$hashedPwd');";

mysqli_query($conn, $sql);

header("Location:../index.php?success");

}