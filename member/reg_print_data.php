<?php
include("config.php");
$today = date("Y-m-d");

$sql = "SELECT * FROM tbregister_view 
        WHERE DATEDIFF(NOW(),reg_start)>=-1
        ORDER BY cus_fullname";
$result = $conn->query($sql);

// $usql = "SELECT * FROM tbcourse_view
//         WHERE course_id='$course_id'";

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

    th {
      font-family: 'Sarabun', sans-serif;
    }
  </style>

</head>

<body>
  <div class="center">
    <button id="print" onclick="window.print()">Print</button>
  </div>
  <div class="container">
    <header>
      <br><br><br>
      <img src="img/logo.jpg" width="150px" height="150px">
      <br><br>
      <h4>สวนตูลติวเตอร์</h4><br>
      <h5>ใบรายชื่อนักเรียนที่กำลังศึกษาอยู่ ณ วันที่ <?php echo date("d/m/Y"); ?></h5>
    </header>
    <section>
      <!-- <div class="date">
        <p>วันที่ <span id="datetime"></span></p>
        <script>
          var dt = new Date();
          document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
        </script>
      </div> -->

      <br>
      <table class="table table-bordered" style="width:85%">
        <thead>
          <tr>
            <th style="width:20px">ลำดับ</th>
            <th>ชื่อ-สกุล</th>
            <th>ชื่อเล่น</th>
            <!-- <th>เบอร์โทรผู้ปกครอง</th>
            <th>ระดับชั้น</th>
            <th>โรงเรียน</th> -->
            <th>คอสที่ลงเรียน</th>
            
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
              <td><pre> <?php echo $row['cus_fullname'] ?></pre></td>
              <td><pre> <?php echo $row['cus_nname'] ?></pre></td>
              <!-- <td><?php echo $row['cus_tel'] ?></td>
              <td><?php echo $row['class_name'] ?></td>
              <td><?php echo $row['school_name'] ?></td> -->
              <td><pre> <?php echo $row['cate_name'] . $row['subject_name'] . $row['system_name'] . $row['reg_class'] ?></pre></td>

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