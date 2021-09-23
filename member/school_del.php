<?php
    include("config.php");
    $school_id = $_GET['school_id'];

$sql = "DELETE FROM tbschool WHERE school_id='$school_id';";

if ($conn->query($sql) === TRUE) {
  header("location: index_school_show.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>