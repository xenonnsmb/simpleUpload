<?php
// Add your database host, username, password, and database name.
function getDb() {
    return new mysqli("localhost", "username", "password", "database");
}
define("rootdir", "/phpuploader"); // Replace "/phpuploader" with the path to the directory with get.php and /uploader in it
 ?>
