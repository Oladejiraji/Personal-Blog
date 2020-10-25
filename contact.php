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
    <header id="header">
                <div id="logo"><a href="index.php">Oladeji.</a></div>
        <i id="bars" class="fas fa-bars fa-2x">Bars</i>
        <div id="nav-bar">
            <nav>
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="post.php">Posts</a></li>
                    <li><a href="author.php">Author</a></li>
                    <li class="current"><a href="contact.php">Contact</a></li>
                </ul>
            </nav>
            <div id="search">
                <a href="#"><i class="fas fa-search"></i></a>
                <form id="search-form" action="#">
                    <input type="text" placeholder="Search...">
                    <button type="submit"><i class="fas fa-search"></i></button>
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
                <h3>Contact Us</h3>


                <form id="contact-form">
                    <div id="form-grid">

                        <input type="text" placeholder="Full Name....">

                        <input type="email" placeholder="Email...">

                        <input type="text" placeholder="Phone No...">

                        <input type="text" placeholder="Subject...">

                        <textarea placeholder="Message..."></textarea>

                        <button type="submit">Submit</button>

                    </div>
                </form>



            </div>
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
</body>

</html>