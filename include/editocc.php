<?php

include 'dbh.inc.php';

if (isset($_POST['save-occ'])) {
    $occ = $_POST['occ'];

    $sql = "UPDATE info SET profileocc='$occ' WHERE id=1 ";
    mysqli_query($conn, $sql);

    header("Location: ../editprofile.php?success");

}

