<?php

include 'dbh.inc.php';

$keyCheck = $_GET['key'];
$sql = "DELETE FROM posts WHERE id='$keyCheck';";
mysqli_query($conn, $sql);

header("Location:../profileall.php?success");
exit();