<?php
    include("config.php");
    $subject_id = $_GET['subject_id'];

$sql = "DELETE FROM tbsubject WHERE subject_id='$subject_id';";

if ($conn->query($sql) === TRUE) {
  header("location: index_subject_show.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>