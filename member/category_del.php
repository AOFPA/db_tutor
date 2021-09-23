<?php
    include("config.php");
    $cate_id = $_GET['cate_id'];

$sql = "DELETE FROM tbcategory WHERE cate_id='$cate_id';";

if ($conn->query($sql) === TRUE) {
  header("location: index_category_show.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>