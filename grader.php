<!DOCTYPE HTML>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title> Dan Maia's MD5 Cracker - grader version </title>
</head>

<body>
    <h1> Dan Maia's MD5 Cracker - grader version </h1>
    <p>
        This application takes an MD5 hash of a four digit pin and checks all 10.000 possible four digit PINs to determine the PIN.
    </p>
    <p>
        This is a simple version made for the grader, limited for PINs. <a href="Dan-advanced.php"> Check the advanced mode </a>, that searches for a user-defined scope of passwords.
    </p>

	<?php
    if( isset($_GET["md5"]) ) {
        echo "<p> <pre>";
        $startTime = microtime(TRUE);
        echo "Debug Output:\n";
        $md5 = $_GET["md5"];

        $found = FALSE;
        for( $i=0; $i<=9999; $i++) {
            $check = hash( "md5", sprintf("%04d",$i) );
            if( $i < 15 )
                echo $check . " " . sprintf("%04d",$i) . "\n";
            if( $check == $md5 ) {
                $found = TRUE;
                $foundPIN = sprintf("%04d",$i);
            }
        }
        echo "Total checks: $i\n";
        $endTime = microtime(TRUE) - $startTime;
        echo "Ellapsed time: $endTime";
        echo "</pre> </p>";

        echo "<p> <strong>";
        if( $found == TRUE )
            echo "PIN: " . $foundPIN;
        else
            echo "PIN: Not found";
        echo "</strong> </p>";
    }
    ?>

    <form>
        <input type="text" name="md5" size="50" value="<?php echo $_GET["md5"] ?? "" ?>">
        <input type="submit" value="Crack MD5">
    </form>

    <ul>
        <li>
            <a href="index.php"> Reset this page </a>
        </li>
        <li>
            <a href="Dan-advanced.php"> Dan's MD5 cracker - advanced mode </a>
        </li>
    </ul>
</body>
</html>