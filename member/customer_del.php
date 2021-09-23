<?php
    include("config.php");
    $cus_id = $_GET['customer_id'];

$sql = "DELETE FROM tbcustomer WHERE cus_id = '$cus_id';";

if ($conn->query($sql) === TRUE) {
  header("location: index_customer_show.php");
} else {
  echo "Error deleting record: " . $conn->error;
}

$conn->close();
?>