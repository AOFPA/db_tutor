<?php
    include("config.php");
    $s_id = $_GET['s_id'];

$sql = "DELETE FROM tbstudy WHERE s_id='$s_id';";

if ($conn->query($sql) === TRUE) {
  header("location: index_study_show.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>