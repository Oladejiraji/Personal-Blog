<?php

include 'dbh.inc.php';

$title = $_POST['title'];
$author = $_POST['author'];
$content = $_POST['content'];
$date = $_POST['date'];


if (isset($_POST['add-submit'])) {

    if (isset($_GET['key'])) {
        if(empty($date) || empty($title) || empty($author) || empty($content)){
            header("Location:../profileadd.php?error=empty");
            exit();
        } else {
            $keyCheck = $_GET['key'];
            $sql = "UPDATE posts SET postname='$title', postauthor='$author', postcontent='$content', postdate='$date' WHERE id='$keyCheck';";
            mysqli_query($conn, $sql);
            header("Location:../profileadd.php?error=success");
            exit();

        }
    } else {

        if(empty($date) || empty($title) || empty($author) || empty($content)){
            header("Location:../profileadd.php?error=empty");
            exit();
        } else {
            $sql = "INSERT INTO posts (postname, postauthor, postcontent, postdate) VALUES ('$title', '$author', '$content', '$date');";
            mysqli_query($conn, $sql);
            header("Location:../profileadd.php?error=success");
            exit();

        }
    }
}

