<?php
include("config.php");
$sql = "SELECT * FROM tbregister_view 
        ORDER BY reg_id";
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
      <th>คอร์สที่ลงเรียน</th>
      <th>วันที่สมัคร</th>
      <th>เริ่มเรียน</th>
      <th>ปิดคอร์ส</th>
      <th>ราคาสุทธิ</th>
      <th>สถานะการชำระเงิน</th>
      <th style="width:50px">ดำเนินการ</th>
    </tr>
  </thead>
  <tbody>
    <?php
    if ($result->num_rows > 0) {
      // output data of each row
      while ($row = $result->fetch_assoc()) {
    ?>
        <tr>
          <td><?php echo $row['reg_id'] ?></td>
          <td><?php echo $row['cus_fullname'] ?></td>
          <td><?php echo $row['cus_nname'] ?></td>
          <td><?php echo $row['cus_tel'] ?></td>
          <td><?php echo $row['class_name'] ?></td>
          <td><?php echo $row['school_name'] ?></td>
          <td><?php echo $row['cate_name'] . $row['subject_name'] . $row['system_name'] . $row['reg_class'] ?></td>
          <td><?php echo $row['reg_time'] ?></td>
          <td><?php echo $row['reg_start'] ?></td>
          <td><?php echo $row['reg_end'] ?></td>
          <td><?php echo $row['course_total'] ?></td>
          <td><?php echo $row['status_name'] ?></td>
          <td><a href="reg_up.php?reg_id=<?php echo $row['reg_id'] ?>"><img src="img/edit.png"></a> <a href="reg_del.php?reg_id=<?php echo $row['reg_id'] ?>" onclick="return confirm_delete()"><img src="img/del.png"></a></td>
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