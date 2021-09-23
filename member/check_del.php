<?php
    include("config.php");
    $check_id = $_GET['check_id'];
    $cate_name = $_GET['cate_name'];
    $subject_name = $_GET['subject_name'];
    $system_name = $_GET['system_name'];
    $class_name = $_GET['class_name'];
    $check_date = $_GET['check_date'];

$sql = "DELETE FROM tbcheck WHERE check_id = '$check_id'; ";

if ($conn->query($sql) === TRUE) {
  header("location: check_show.php?check_date=$check_date&subject_name=$subject_name&system_name=$system_name&class_name=$class_name&cate_name=$cate_name");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
