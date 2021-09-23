<?php
include("config.php");
$sql = "SELECT DISTINCT cus_id,cus_fullname,cus_nname,cus_tel,class_name,school_name 
        FROM tbregister_view1
        WHERE status_name = 'ค้างชำระ'
        ORDER BY cus_id";
$result = $conn->query($sql);
?>

<table id="example1" class="table table-bordered  table-hover table-striped">
<thead>
        <tr>
          <th>รหัส</th>
          <th>ชื่อ-สกุล</th>
          <th>ชื่อเล่น</th>
          <th>เบอร์โทรผู้ปกครอง</th>
          <th>ระดับชั้น</th>
          <th>โรงเรียน</th>
          <!-- <th>คอสที่ลงเรียน</th>
          <th>วันที่สมัคร</th>
          <th>วันเริ่มเรียน</th>
          <th>วันจบคอร์ส</th>
          <th>ราคาสุทธิ</th>
          <th>สถานะการชำระเงิน</th> -->
          <th style="width:100px">ดำเนินการ</th>
        </tr>
      </thead>
      <tbody>
        <?php
        if ($result->num_rows > 0) {
          // output data of each row
          while ($row = $result->fetch_assoc()) {
        ?>
            <tr>
              <td><?php echo $row['cus_id'] ?></td>
              <td><?php echo $row['cus_fullname'] ?></td>
              <td><?php echo $row['cus_nname'] ?></td>
              <td><?php echo $row['cus_tel'] ?></td>
              <td><?php echo $row['class_name'] ?></td>
              <td><?php echo $row['school_name'] ?></td>
              <!-- <td><?php echo $row['cate_name'] . $row['subject_name'] . $row['system_name'] . $row['reg_class'] ?></td>
              <td><?php echo $row['reg_time'] ?></td>
              <td><?php echo $row['reg_start'] ?></td>
              <td><?php echo $row['reg_end'] ?></td>
              <td><?php echo $row['course_total'] ?></td>
              <td><?php echo $row['status_name'] ?></td> -->
              <td><a href="print.php?cus_id=<?php echo $row['cus_id'] ?>" class="btn btn-primary">พิมพ์</a></td>
              </tr>
        <?php
          }
        } else {
          echo "0 results";
        }
        ?>
      </tbody>
</table>

<?php
$conn->close();
?>