<?php
    include 'include/dbh.inc.php';
    session_start();
    if (!isset($_SESSION['userId'])) {
        header("Location:adminLogin.php");
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Blog</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="css/spec.css">
    <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.min.css">
</head>

<body>

    <i id="prof-bars" class="fas fa-bars fa-2x"></i>
    <section id="side-nav">
        <div id="prof-cancel">X</div>
        <div id="admin-info">
            <div id="admin-img">
            <?php
                $fileName = "image/profile*";
                $fileInfo = glob($fileName);
                $fileExt = explode(".", $fileInfo[0]);
                $fileActualExt = $fileExt[1];
                echo "<img src='image/profile.".$fileActualExt."?'".mt_rand().">";
            ?>
                <div id="admin-name">Admin</div>
            </div>
        </div>
        <div id="nav-options">
            <a href="adminprofile.php">Profile</a>
            <a href="profileall.php">All Articles</a>
            <a href="profileadd.php">Add Articles</a>
            <button id="author-button">Authors <i id="drop" class="fa fa-caret-down"></i></button>
            <div id="author-container">
                <a href="profileaddauthor.php">Add Author</a>
                <a href="profileeditaurhor.php">Edit Author</a>
            </div>
        </div>
    </section>

    <div id="logout-button">
        <form action="include/logout.inc.php">
            <button type="submit">Logout</button>
        </form>
    </div>

    <section id="welcome">
        <h1>Add Posts</h1>

        <?php

        if (isset($_GET['key'])) {
            
            $keyCheck = $_GET['key'];
            $sql = "SELECT * FROM posts WHERE id='$keyCheck';";
            $result = mysqli_query($conn, $sql);
            $row = mysqli_fetch_assoc($result);

            echo "<form action='include/addarticle.inc.php?key=".$keyCheck."' id='add-article' method='POST'>
            <div id='add-grid'>
            <input name='title' type='text' placeholder='Article Title...' value='".$row['postname']."'>
                    <input name='author' type='text' placeholder='Article Author...' value='".$row['postauthor']."'>
                    <textarea name='content' placeholder='Article Content...'>".$row['postcontent']."</textarea>
                    <input name='date' type='date' placeholder='Date' value='".$row['postdate']."'>
                <div>
                    <button name='add-submit' type='submit'>Add Article</button>
                </div>
            </div>
        </form>";
        } 
        
        else {
            echo ' <form action="include/addarticle.inc.php" id="add-article" method="POST">
            <div id="add-grid">

            <input name="title" type="text" placeholder="Article Title...">
            <input name="author" type="text" placeholder="Article Author...">
            <textarea name="content" placeholder="Article Content..."></textarea>
            <input name="date" type="date" placeholder="Date">

            <div>
                    <button name="add-submit" type="submit">Add Article</button>
                </div>

            </div>
        </form>';
        }

        if (!isset($_GET['error'])) {
            exit();
        } else{
            $check = $_GET['error'];

            if ($check == 'empty') {
                echo '<div class=error-grid><p class="error">Fill in All Fields</p></div>';
            } else if ($check == 'success') {
                echo '<div class=error-grid><p class="success">Article Added Successfully</p></div>';
            }
        }


        ?>


    </section>



    <script src="js/profilenav.js"></script>
</body>

</html>