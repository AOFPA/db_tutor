<?php
include("config.php");

$cate_name = $_GET['cate_name'];
$subject_name = $_GET['subject_name'];
$system_name = $_GET['system_name'];
$class_name = $_GET['class_name'];
$check_date = $_GET['check_date'];

$sql05 = "SELECT course_id FROM tbcourse_view
        WHERE cate_name ='$cate_name' AND
        subject_name = '$subject_name' AND
        system_name = '$system_name' AND
        class_name = '$class_name';";

$course = $conn->query($sql05);
$c = $course->fetch_assoc();

$sql = "DELETE FROM tbcheck WHERE course_id='$c[course_id]' AND check_date = '$check_date';";

if ($conn->query($sql) === TRUE) {
  header("location: check_showDate.php?subject_name=$subject_name&system_name=$system_name&class_name=$class_name&cate_name=$cate_name");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
