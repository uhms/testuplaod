<?php

$link = new mysqli( 'localhost', 'root', '', 'skputm' );
if ( $link->connect_errno ) {
    die( "Failed to connect to MySQL: (" . $link->connect_errno . ") " . $link->connect_error );
}

?>
