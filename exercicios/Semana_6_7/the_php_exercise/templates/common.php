<?php

function output_header()
{ ?>
    <!DOCTYPE html>
    <html lang="en-US">

    <head>
        <title>Super Legit News</title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="css/style.css" rel="stylesheet">
        <link href="css/layout.css" rel="stylesheet">
        <link href="css/responsive.css" rel="stylesheet">
        <link href="css/comments.css" rel="stylesheet">
        <link href="css/forms.css" rel="stylesheet">
    </head>

    <body>
        <header>
            <h1><a href="index.php">Super Legit News</a></h1>
            <h2><a href="index.php">Where fake news are born!</a></h2>
            <div id="signup">
                <?php if (isset($_SESSION['username'])): ?>
                    <span><?php echo htmlspecialchars($_SESSION['username']); ?></span>
                    <a href="action_logout.php">Logout</a>
                <?php else: ?>
                    <a href="../html/register.html">Register</a>
                    <a href="login.php">Login</a>
                <?php endif; ?>
            </div>
        </header>

        <nav id="menu">
            <input type="checkbox" id="hamburger">
            <label class="hamburger" for="hamburger"></label>

            <ul>
                <li><a href="index.php">Local</a></li>
                <li><a href="index.php">World</a></li>
                <li><a href="index.php">Politics</a></li>
                <li><a href="index.php">Sports</a></li>
                <li><a href="index.php">Science</a></li>
                <li><a href="index.php">Weather</a></li>
            </ul>
        </nav>
    <?php }

function output_footer()
{ ?>
        <footer>
            <p>&copy; Fake News, 2022</p>
        </footer>
    </body>

    </html>
<?php }
