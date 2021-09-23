<?php
    include("config.php");
    $course_id = $_GET['course_id'];

$sql = "DELETE FROM tbcourse WHERE course_id = '$course_id';";

if ($conn->query($sql) === TRUE) {
  header("location: index_course_show.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>