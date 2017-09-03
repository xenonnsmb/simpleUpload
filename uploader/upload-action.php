<?php
include 'config.php';
$db = getDb();
if ($db->connect_error) {
  die("Database error.");
}
$basename = basename($_FILES["fileToUpload"]["name"]);
$target = $basename;
$imageFileType = pathinfo($target,PATHINFO_EXTENSION);

if (file_exists($target)) {
  die("A file by that name already exists.");
}
if ($_FILES["fileToUpload"]["size"] > 10000000) {
  die("That file is too big. Keep it under 10 megabytes.");
}
if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target)) {
        $getid = $db->query("SELECT `id` FROM uploads ORDER BY `id` DESC");
        $idrow = $getid->fetch_assoc();
        $stmt = $db->prepare("INSERT INTO `uploads`(`id`, `filename`) VALUES (?, ?)");
        $targetid = $idrow["id"] + 1;
        $stmt->bind_param("is", $targetid, $basename);
        if ($stmt->execute()) {
          echo("File uploaded.");
        }else{
          die("There was a database error.");
        }
      }else{
        die("There was an unknown error.");
      }
 ?>
