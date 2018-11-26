<?php
// Concatenates a new char to a string or, if the string is fully formed, checks its hash.
function concatenateChar_or_checkString( $charsLeft, $char="", $string="" ){
    // If the char to be concatenated ISN'T the last, just concatenates it and proceeds to an inner while loop.
    if( $charsLeft > 0 ){
    	$string = $string . $char;
    }
    // If the char to be concatenated IS the last, checks the hash of the full string.
    // If the check is successful, proceeds to leave the functions and loops.
    if( $charsLeft == 0 ){
    	$string = $string . $char;
        $string_md5 = hash( "md5", $string );
        if( $string_md5 == $GLOBALS['given_md5'] ){
            $GLOBALS['found'] = TRUE;
            $GLOBALS['outputMsg'] = $string;
        }
        $GLOBALS['numberOfChecks'] += 1;
        return;
    }
    $i = 0;
    //  Loops through possible chars and applies a recursion.
    // MAYBE REMOVE THE FIRST CHECK OF THE WHILE LOOP
    while( $i < strlen($GLOBALS['charDomain']) ){
        $char = $GLOBALS['charDomain'][$i];
        concatenateChar_or_checkString( $charsLeft - 1, $char, $string );
        // If hash was found, leaves the function and then the outer functions.
        if( $GLOBALS['found'] == TRUE ) {
            return;
        }
        $i++;
    }
}
?>