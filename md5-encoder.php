<!DOCTYPE HTML>

<?php
$password = ( ! empty($_GET['password']) ? $_GET['password'] : "" );

if( ! empty($_GET["password"]) ){
    $md5 = hash( "md5", $password );
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title> Dan Maia's MD5 Cracker - MD5 Encoder </title>
</head>

<body>
    <header>
    <h1> MD5 Encoder </h1>
        <p>
            A simple MD5 encoder. Use the hashes generated here as input for testing my MD5 crackers.
        </p>
    </header>

    <section>
    	<?php
        if( ! empty($_GET["password"]) ){
            echo "<p>";
            echo    "<strong>MD5 hash: </strong>" . $md5;
            echo "</p>";
        }
        ?>
    </section>

    <form method="get">
        <p>
            <label for="password">Password:</label><br>
            <input type="text" name="password" id="password" size="20" value="<?= htmlentities($password) ?? "" ?>">
        </p>
        <p>
            <input type="submit" class="button" value="Get MD5 hash">
        </p>
    </form>

    <nav>
        <ul>
            <li>
                <a href="md5-encoder.php"> Reset this page </a>
            </li>
            <li>
                <a href="index.php"> Dan's MD5 cracker - PIN mode</a>
            </li>
            <li>
                <a href="advanced.php"> Dan's MD5 cracker - advanced mode </a>
            </li>
        </ul>
    </nav>
</body>
</html>