<?php
include("config.php");
$sql = "SELECT * FROM tbcustomer as a 
  INNER JOIN tbschool as b
  ON a.school_id = b.school_id
  INNER JOIN tbclass as c
  ON a.cass_id = c.class_id
  INNER JOIN tbprefix as d
  ON a.prefix_id = d.prefix_id
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
          <th>ชั้น</th>
          <th>โรงเรียน</th>
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
              <td><?php echo $row['prefix_name'] . $row['cus_fname'] . ' ' . $row['cus_lname'] ?></td>
              <td><?php echo $row['cus_nname'] ?></td>
              <td><?php echo $row['cus_tel'] ?></td>
              <td><?php echo $row['class_name'] ?></td>
              <td><?php echo $row['school_name'] ?></td>
              <td><a href="reg_add.php?cus_id=<?php echo $row['cus_id'] ?>" type="submit" class="btn btn-success">ลงเรียน</a></td>
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