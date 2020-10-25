<?php
    include 'include/dbh.inc.php';
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Personal Blog</title>
    <link rel="stylesheet" href="css/styles.css">
    <link rel="stylesheet" href="fontawesome-free-5.13.0-web/css/all.min.css">
</head>

<body>
    <!-- <a href="adminLogin.php">login</a> -->
    <header id="header">
                <div id="logo"><a href="index.php">Oladeji.</a></div>
        <i id="bars" class="fas fa-bars fa-2x">Bars</i>
        <div id="nav-bar">
            <nav>
                <ul>
                    <li class="current"><a href="index.php">Home</a></li>
                    <li><a href="post.php">Posts</a></li>
                    <li><a href="author.php">Author</a></li>
                    <li><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <div id="search">
                <a href="#"><i class="fas fa-search"></i></a>
                <form id="search-form" action="search.php" method="POST">
                    <input name="search" type="text" placeholder="Search...">
                    <button name="search-submit" type="submit"><i class="fas fa-search"></i></button>
                    <div id="search-cancel">X</div>
                </form>
            </div>
        </div>
    </header>
    <div id="small-nav">
        <div id="cancel">X</div>
        <form id="small-search-form" action="search.php" method="POST">
            <input name=search type="text" placeholder="Search...">
            <button name="search-submit" type="submit"><i class="fas fa-search">Search</i></button>
        </form>
        <nav id="small">
            <ul>
                <li><a href="index.php">Home</a></li>
                <li><a href="post.php">Posts</a></li>
                <li><a href="author.php">Author</a></li>
                <li><a href="contact.php">Contact</a></li>
            </ul>
        </nav>
    </div>




    <main>
        <div class="main-wrap">
            <div id="h3-wrap">
                <h3>Latest Stories</h3>
            </div>
            <?php
                $sql = "SELECT * FROM posts;";
                $result = mysqli_query($conn, $sql);
                while ($row = mysqli_fetch_assoc($result)) {
                    echo "<article>
                    <div class='big-l'></div>
                    <div class='title'>".$row['postname']."</div>
                    <div class='info'>By ".$row['postauthor']." ".$row['postdate']."</div>
                    <div class='content'>".$row['postcontent']."</div>
                    <a id='read-more' href='selectpost.php?key=".$row['id']."'>Read More</a>
                    </article>";
                }
            ?>
            <a href="post.php" id="load-more">Load More Articles</a>
        </div>
    </main>



    <footer>
        <div id="create">Oladeji.</div>
        <div id="add-info">Created and Authored by Raji Oladeji</div>
        <div id="social">
            <a href="#"><i class="fab fa-twitter fa-2x"></i></a>
            <a href="#"><i class="fas fa-envelope fa-2x"></i></a>
            <a href="#"><i class="fab fa-instagram fa-2x"></i></a>
        </div>
    </footer>

    <div id="top"><i class="fas fa-angle-up fa-2x">Top</i></div>


    <script src="js/homes.js"></script>
    <script src="js/cutsearch.js"></script>
</body>

</html>