<?php
include("config.php");
$cate_name = $_GET['cate_name'];
$subject_name = $_GET['subject_name'];
$system_name = $_GET['system_name'];
$class_name = $_GET['class_name'];

$sql = "SELECT * FROM tbregister_view
        WHERE cate_name ='$cate_name' AND
        subject_name LIKE '%$subject_name%' AND
        system_name = '$system_name' AND
        reg_class LIKE '%$class_name%'
        ;";

// $usql = "SELECT * FROM tbcourse_view
//         WHERE course_id='$course_id'";

$res = $conn->query($sql);
$row = $res->fetch_assoc();

$result = $conn->query($sql);
$n = 0;
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Print</title>
  <link rel="stylesheet" href="css/print.css" media="print">
  <link rel="stylesheet" href="css/style.css">

  <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Sarabun:wght@100;200&display=swap" rel="stylesheet">
    <style>
        * {
            font-family: 'Sarabun', sans-serif;
        }

        th{
            font-family: 'Sarabun', sans-serif;
        }
    </style>

</head>

<body>
  <div class="center">
    <button  id="print" onclick="window.print()">Print</button>
  </div>
  <div class="container">
    <header>
      <br><br><br>
      <img src="img/logo.jpg" width="150px" height="150px">
      <br><br>
      <h4>สวนตูลติวเตอร์</h4><br>
      <h5>ใบรายชื่อนักเรียน วิชา <?php echo $row['subject_name']; ?> ชั้น <?php echo $row['reg_class']; ?></h5>
    </header>
    <section>
      <div class="date">
        <p>วันที่ <span id="datetime"></span></p>
        <script>
          var dt = new Date();
          document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
        </script>
      </div>

      <br>
      <table class="table table-bordered" style="width:85%">
        <thead>
          <tr>
            <th style="width:20px">ลำดับ</th>
            <th>ชื่อ-สกุล</th>
            <th style="width:80px">ชื่อเล่น</th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:35px"></th>
            <th style="width:120px">หมายเหตุ</th>
          </tr>
        </thead>
        <tbody>
          <?php
          if ($result->num_rows > 0) {
            // output data of each row
            while ($row = $result->fetch_assoc()) {
          ?>
              <tr>
                <td class="price">
                  <pre><?php echo $n = $n + 1 ?> </pre>
                </td>
                <td>
                  <pre>   <?php echo $row['cus_fullname'] ?></pre>
                </td>
                <td>
                  <pre>   <?php echo $row['cus_nname'] ?></pre>
                </td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>
                <td></td>

              </tr>
          <?php
            }
          } else {
            echo "0 results";
          }
          ?>
        </tbody>
      </table>
    </section>
  </div>
</body>

</html>