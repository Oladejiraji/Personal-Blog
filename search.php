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
    <a href="adminLogin.php">login</a>
    <header id="header">
                <div id="logo"><a href="index.php">Oladeji.</a></div>
        <i id="bars" class="fas fa-bars fa-2x"></i>
        <div id="nav-bar">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
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
            <button name="search-submit" type="submit"><i class="fas fa-search"></i></button>
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
                <h3>Search Results</h3>
            </div>
           <?php
            if (isset($_POST['search-submit'])) {
                $search = $_POST['search'];
                $search = "%$search%";
                if (empty($_POST['search'])) {
                    echo "<div>
                    <h1 id='no-result'>Empty Search Field</h1>
                </div>";
                } else {
                    $sql = "SELECT * FROM posts WHERE postname LIKE ? OR postauthor LIKE ? OR postcontent LIKE ?;";
                    $stmt = mysqli_stmt_init($conn);
                    if (!mysqli_stmt_prepare($stmt, $sql)) {
                        echo "<div>
                                <h1 id='no-result'>Search Error</h1>
                            </div>";
                    } else {
                        mysqli_stmt_bind_param($stmt, "sss", $search, $search, $search);
                        mysqli_stmt_execute($stmt);
                        $result = mysqli_stmt_get_result($stmt);
                        $resultCheck = mysqli_num_rows($result);

                        if ($resultCheck > 0) {
                            while($row = mysqli_fetch_assoc($result)) {
                                echo "<article>
                                <div class='title'>".$row['postname']."</div>
                                <div class='info'>By ".$row['postauthor']." ".$row['postdate']."</div>
                                <div class='content'>".$row['postcontent']."</div>
                                <a id='read-more' href='selectpost.php?key=".$row['id']."'>Read More</a>
                                </article>";
                            }
                        } else {
                            echo "<div>
                                <h1 id='no-result'>No Result that Matches this Search</h1>
                            </div>";
                        }
                    }
                     
                }
               
            }
           ?>
            
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

    <div id="top"><i class="fas fa-angle-up fa-2x"></i></div>


    <script src="js/homes.js"></script>
    <script src="js/cutsearch.js"></script>
    
</body>

</html>