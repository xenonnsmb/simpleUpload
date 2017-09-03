<?php
function getDb() {
  $conn = new mysqli("localhost", "username", "password", "uploader");
  return $conn;
}
define("rootdir", "/phpuploader"); // Path to directory with get.php and /uploader in it
 ?>
