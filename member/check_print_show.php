<?php
include("config.php");
$sql = "SELECT * FROM course_select
        ORDER BY system_name,cate_name,class_name,subject_name";
$result = $conn->query($sql);
?>

<table id="example1" class="table table-bordered  table-hover table-striped">
<thead>
        <tr>
          <th>รหัส</th>
          <th>ประเภท</th>
          <th>วิชา</th>
          <th>ระบบการสอน</th>
          <th>ชั้น</th>
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
              <td><?php echo $row['course_id'] ?></td>
              <td><?php echo $row['cate_name'] ?></td>
              <td><?php echo $row['subject_name'] ?></td>
              <td><?php echo $row['system_name'] ?></td>
              <td><?php echo $row['class_name'] ?></td>
              <td><a href="check_print1.php?cate_name=<?php echo $row['cate_name'] ?>&subject_name=<?php echo $row['subject_name'] ?>&system_name=<?php echo $row['system_name'] ?>&class_name=<?php echo $row['class_name'] ?>" class="btn btn-primary">พิมพ์</a></td></td>
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