<?php
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
            <button id="author-button" >Authors <i id="drop" class="fa fa-caret-down"></i></button>
            <div id="author-container">
                <a href="profileaddauthor.php">Add Author</a>
                <a href="profileeditaurhor.php">Edit Author</a>
            </div>
        </div>
    </section>

    <section id="welcome">
        <h1>Profile Page</h1>

        <div id="edit-form-grid">
            <form class="save-forms" action="include/editprofile.inc.php" method="POST" enctype="multipart/form-data">
                <label for="">New Profile Picture:</label>
                <input id="file" name="file" type="file">
                <button name="save-changes" type="submit">Save</button>
            </form>

            <form action="include/editname.inc.php" method="POST">
                <label for="">New Profile Name:</label>
                <input name="name" type="text" placeholder="New Name...">
                <button name="save-name" type="submit">Save</button>
            </form>

            <form action="include/editocc.php" method="POST">
                <label for="">New Occupation:</label>
                <input name="occ" type="text" placeholder="New Occupation...">
                <button name="save-occ" type="submit">Save</button>
            </form>

            <form action="include/editquote.php" method="POST">
                <label for="">New Quote:</label>
                <textarea name="quote" placeholder="New Quote..."></textarea>
                <button name="save-quote" type="submit">Save</button>
            </form>
        </div>

    </section>



    <div id="logout-button">
        <form action="include/logout.inc.php">
            <button type="submit">Logout</button>
        </form>
    </div>


    <!-- <footer>
        <div id="create">Oladeji.</div>
        <div id="add-info">Created and Authored by Raji Oladeji</div>
        <div id="social">
            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="#"><i class="fas fa-envelope fa-2x"></i></a>
            <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
        </div>
    </footer>

    <div id="top"><i class="fas fa-angle-up fa-2x"></i></div> -->

    <script src="js/profilenav.js"></script>
</body>

</html>