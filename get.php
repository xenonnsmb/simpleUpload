<?php
include 'uploader/config.php';
if (!isset($_GET["id"])) {
  die("Please specify a file ID.");
}
$id = $_GET["id"];
$db = getDb();
if ($db->connect_error) {
  die("Database error.");
}
$stmt = $db->prepare("SELECT * from uploads WHERE id = ?");
$stmt->bind_param("i", $id);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();
if (!isset($row["filename"])) {
  die("File not found.");
}
$filepath = 'uploader/' . $row["filename"];
$image = file_get_contents($filepath);

header('Content-type: ' . mime_content_type($filepath) . ';');
header("Content-Length: " . strlen($image));
echo $image;
?>
