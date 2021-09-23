<?php
include("config.php");
$sql = "SELECT * FROM tbcourse as a 
  left JOIN tbcategory as b
  ON a.cate_id = b.cate_id
  left JOIN tbsubject as c
  ON a.subject_id = c.subject_id
  left JOIN tbsystem as d
  ON a.system_id = d.system_id
  left JOIN tbclass as e
  ON a.class_id = e.class_id
  ORDER BY course_id";
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
          <th>ราคา</th>
          <th>ราคาหนังสือ</th>
          <th>รวม</th>
          
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
              <td><?php echo $row['course_price'] ?></td>
              <td><?php echo $row['course_bookprice'] ?></td>
              <td><?php echo $row['course_total'] ?></td>
              
              <td><a href="course_up.php?course_id=<?php echo $row['course_id'] ?>"><img src="img/edit.png"></a> 
              <a href="course_del.php?course_id=<?php echo $row['course_id'] ?>" onclick="return confirm_delete()"><img src="img/del.png"></a></td>
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