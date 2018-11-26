<!DOCTYPE HTML>

<?php
$startTime = microtime(TRUE);

$given_md5 = ( ! empty($_GET['md5']) ? $_GET['md5'] : "" );
$initial = ( ! empty($_GET['initial']) ? $_GET['initial'] : 3 );
$final = ( ! empty($_GET['final']) ? $_GET['final'] : 7 );
$charDomain = ( ! empty($_GET['charDomain']) ? $_GET['charDomain'] : '0123456789AaBbCcDdEeFfGgHhIiJjKkLlMmNnOoPpQqRrSsTtUuVvWwXxYyZz_-.' );
$maxTime = ( ! empty($_GET['maxTime']) ? $_GET['maxTime'] : 600 );

if( ! empty($_GET["md5"]) ){
    include 'functions.php';

    ini_set( 'max_execution_time', $maxTime );
    $found = FALSE;
    $outputMsg = "Not found";
    $numberOfChecks = 0;

    $numberOfChars = $initial;
    while( $found == FALSE && $numberOfChars <= $final ){
        concatenateChar_or_checkString( $numberOfChars );
        $numberOfChars += 1;
    }

    // Sets PHP value back to default.
    ini_set( 'max_execution_time', 30 );

    $endTime = microtime(TRUE) - $startTime;
}
?>

<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title> Dan Maia's MD5 Cracker - advanced mode </title>
</head>

<body>
    <header>
    <h1> Dan Maia's MD5 Cracker - advanced mode </h1>
        <p>
            This application takes an MD5 hash of a password and checks all possible combinations with the given character domain and password length to determine the password. It runs until it finds the right one or checks all possible combinations. It uses a recursive brute force technique.
        </p>
        <p>
            For wider password scopes it may take some time to execute, so please be patient. The maximum execution time can be also be customized. Futurely a loading gif will be added so the user can be informed of the search progress.
        </p>
    </header>

    <section>
    	<?php 
        if( ! empty($_GET["md5"]) ){
            echo "<p> <pre>";
            echo    "Debug Output:\n";
            echo    "Total checks: $numberOfChecks\n";
            echo    "Ellapsed time: $endTime seconds";
            echo "</pre> </p>";

            echo "<p>";
            echo    "<strong>Password: </strong>" . $outputMsg;
            echo "</p>"; 
        }
        ?>
    </section>

    <form method="get">
        <p>
            <label for="md5">MD5 hash:</label><br>
            <input type="text" name="md5" id="md5" size="50" value="<?= htmlentities($given_md5) ?>">
        </p>
        <p>
            <label for="initial">Initial password length:</label><br>
            <input type="text" name="initial" id="initial" size="3" value="<?= htmlentities($initial) ?>">
        </p>
        <p>
            <label for="final">Final password length:</label><br>
            <input type="text" name="final" id="final" size="3" value="<?= htmlentities($final) ?>">
        </p>
        <p>
            <label for="charDomain">Character domain:</label><br>
            <input type="text" name="charDomain" id="charDomain" size="100" value="<?= htmlentities($charDomain) ?>">
        </p>
        <p>
            <label for="maxTime">Maximum execution time (in seconds):</label><br>
            <input type="text" name="maxTime" id="maxTime" size="5" value="<?= htmlentities($maxTime) ?>">
        </p>
        <p>
            <input type="submit" class="button" value="Crack MD5">
        </p>
    </form>

    <nav>
        <ul>
            <li>
                <a href="advanced.php"> Reset this page </a>
            </li>
            <li>
                <a href="index.php"> Dan's MD5 cracker - PIN mode </a>
            </li>
            <li>
                <a href="md5-encoder.php"> MD5 encoder </a>
            </li>
        </ul>
    </nav>
</body>
</html>