<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/style.css">
    <title> Dan Maia's MD5 Cracker - simple version </title>
</head>

<body>
    <header>
        <h1> Dan Maia's MD5 Cracker - simple version </h1>
        <p>
            This application takes an MD5 hash of a four digit pin and checks four digit PINs to determine the PIN until it finds the right one or checks all 10.000 possible ones. It uses a simple nested loops brute force technique.
        </p>
        <p>
            This is a simple version made for the grader, limited for PINs. <a href="advanced.php"> Check the advanced version</a>, which searches for a user-defined scope of passwords.
        </p>
    </header>

    <section>
        <?php
        $md5 = ( ! empty($_GET['md5']) ? $_GET['md5'] : "" );

        if( ! empty($_GET["md5"]) ) {
            echo "<p> <pre>";
            $startTime = microtime(TRUE);
            echo "Debug Output:\n";
            $md5 = $_GET["md5"];

            $i = 0;
            $found = FALSE;
            while( $i <= 9999 && $found == FALSE ) {
                $check = hash( "md5", sprintf("%04d",$i) );
                if( $i < 15 )
                    echo $check . " " . sprintf("%04d",$i) . "\n";
                if( $check == $md5 )
                    $found = TRUE;
                $i++;
            }

            echo "Total checks: $i\n";
            $i--;
            $endTime = microtime(TRUE) - $startTime;
            echo "Ellapsed time: $endTime";
            echo "</pre> </p>";

            echo "<p> <strong>";
            if( $found == TRUE )
                echo "PIN: " . sprintf("%04d",$i);
            else
                echo "PIN: Not found";
            echo "</strong> </p>";
        }
        ?>
    </section>

    <form method="get">
        <p>
            <label for="md5">MD5 hash:</label><br>
            <input type="text" name="md5" id="md5" size="50" value="<?= htmlentities($md5) ?>">
        </p>
        <p>
            <input type="submit" class="button" value="Crack MD5">
        </p>
    </form>

    <nav>
        <ul>
            <li>
                <a href="index.php"> Reset this page </a>
            </li>
            <li>
                <a href="advanced.php"> Dan's MD5 cracker - advanced mode </a>
            </li>
            <li>
                <a href="md5-encoder.php"> MD5 encoder </a>
            </li>
        </ul>
    </nav>
</body>
</html>