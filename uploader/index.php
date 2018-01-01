<?php
include 'config.php';
$db = getDb();
if ($db->connect_error) {
  die("Error connecting to the database. Are you sure you have the right username, password, hostname, and database in config.php?");
}
?>
<!DOCTYPE html>
<html><head><title>simpleUpload</title></head>
<body><h1>simpleUpload</h1><p>
  <form action="upload-action.php" method="post" enctype="multipart/form-data">
      Select image to upload:
      <input type="file" name="fileToUpload" id="fileToUpload">
      <input type="submit" value="Upload Image" name="submit">
  </form>
<?php
$stmt = $db->query("SELECT * FROM `uploads`");
while ($row = $stmt->fetch_assoc()) {
  $getpath = constant("rootdir");
  $id = $row["id"];
  echo("<br><a href='$getpath/get.php?id=$id'>");
  echo($row["filename"]);
  echo("</a> ");
  echo("<br><sup><sup>Path to this file, for embedding: <span style='font-family:monospace;'>get.php?id=$id</span></sup></sup>");
}
 ?></p><br><br><p>simpleUpload by XenonNSMB. MIT licensed</p></body></html>
