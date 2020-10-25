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

    <section id="welcome">
        <h1>All Posts</h1>

        <table>
            <tr>
                <th>Post Title</th>
                <th>Post Content</th>
            </tr>
            <?php
                 $sql = "SELECT * FROM posts;";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<tr>
                        <td class='cut-title'>".$row['postname']."</td>
                        <td><p class='cut-content'>".$row['postcontent']."</p><a href='profileadd.php?key=".$row['id']."'>Edit</a><a target='_blank' href='selectpost.php?key=".$row['id']."'>View</a><a href='include/deletepost.inc.php?key=".$row['id']."'>Delete</a></td>
                    </tr>";
                }
            ?>
            <!-- <tr>
                <td class="cut-title">Lorem, ipsum dolor.</td>
                <td><p class="cut-content">Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nulla eveniet distinctio modi inventore et
                    molestiae recusandae laborum</p></td>
            </tr> -->
        </table>
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
    <script src="js/long.js"></script>
</body>

</html>