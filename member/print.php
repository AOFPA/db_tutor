<?php
include("config.php");
$cus_id = $_GET['cus_id'];
$sql = "SELECT * FROM tbregister_view1
        WHERE cus_id='$cus_id'AND status_name='ค้างชำระ';";

$usql = "SELECT sum(course_total) as total FROM tbregister_view1
        WHERE cus_id='$cus_id'AND status_name='ค้างชำระ';";

$res = $conn->query($sql);
$row = $res->fetch_assoc();
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
            padding: 5px;
            text-align: center;

        }
        td{
            font-family: 'Sarabun', sans-serif;
            padding: 5px;
            text-align: left;
            font-size: 14px;

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
            <h5>8/315 (ปากซอยกัลยาณมิตร หมู่ 5 ถ ตำบล เขารูปช้าง อำเภอเมืองสงขลา สงขลา 90000</h5>
            <br><br><br>
            <h2>ใบเสร็จรับเงิน</h2>
            <br><br><br>
        </header>
        <section>
            <div class="date">
                <p>วันที่ <span id="datetime"></span></p>

                <script>
                    var dt = new Date();
                    document.getElementById("datetime").innerHTML = dt.toLocaleDateString();
                </script>
            </div>
            <br><br>
            <div class=""><p style="font-size: 15px;text-align: left; text-indent: 4em;">
            ได้รับเงินจาก...<?php echo $row['cus_fullname']; ?>........................ชื่อเล่น...<?php echo $row['cus_nname']; ?>................................ </p>
            <br><p style="font-size: 15px;text-align: left; text-indent: 4em;">โรงเรียน...<?php echo $row['school_name']; ?>......................ชั้น...<?php echo $row['class_name']; ?>................
            </p></div>
            <br>
            <table style="width:85%">
                <thead>
                    <tr>
                        <th>รายการ</th>
                        <th>จำนวนเงิน</th>
                    </tr>
                </thead>

                <tbody>

                <?php

        $res1 = $conn->query($sql);

        if ($res1->num_rows > 0) {
          // output data of each row
          while ($row = $res1->fetch_assoc()) {
        ?>
            <tr>
              <td><?php echo "คอร์ส" . " " .$row['cate_name'] . " " . $row['subject_name'] . " " . $row['system_name'] . " " . $row['reg_class'] ?></td>
              <td class="price"><?php echo $row['course_price'] ?></td>
              
             </tr>
             <tr>
             <td><?php echo "ค่าหนังสือ" . $row['subject_name']?></td>
             <td class="price"><?php echo $row['course_bookprice'] ?></td>
             </tr>
        <?php
          }
        } else {
          echo "0 results";
        }
        $res2 = $conn->query($usql);
        $row = $res2->fetch_assoc();
        ?>
            <tr>
                <td><b>ยอดเงินสุทธิ</b></td>
                <td class="price"><b><?php echo $row['total'] ?></b></td>
            </tr>

                </tbody>
            </table>
            <pre style="font-size: 15px;text-align: left; text-indent: 4em;">
            
            ** หมายเหตุ ....................................................................................................................................................................
            </pre>
            <pre>




                                                                                                ...............................................ผู้รับเงิน

                                                                                                 (...................................................)



</pre>
        </section>
    </div>
</body>

</html>