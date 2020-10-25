<?php

include 'dbh.inc.php';

if (isset($_POST['save-name'])) {
    $name = $_POST['name'];

    $sql = "UPDATE info SET profilename='$name' WHERE id=1 ";
    mysqli_query($conn, $sql);

    header("Location: ../editprofile.php?success");

}

