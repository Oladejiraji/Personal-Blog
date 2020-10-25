<?php

include 'dbh.inc.php';

if (isset($_POST['save-quote'])) {
    $quote = $_POST['quote'];

    $sql = "UPDATE info SET profilequote='$quote' WHERE id=1 ";
    mysqli_query($conn, $sql);

    header("Location: ../editprofile.php?success");

}

