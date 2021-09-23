<?php
include("config.php");
$sql = "SELECT * FROM tbcategory
        ORDER BY cate_id";
$result = $conn->query($sql);
?>

<table id="example1" class="table table-bordered  table-hover table-striped">
<thead>
        <tr>
          <th>รหัส</th>
          <th>ประเภท</th>
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
              <td><?php echo $row['cate_id'] ?></td>
              <td><?php echo $row['cate_name'] ?></td>
              <td><a href="category_up.php?cate_id=<?php echo $row['cate_id'] ?>"><img src="img/edit.png"></a> <a href="category_del.php?cate_id=<?php echo $row['cate_id'] ?>" onclick="return confirm_delete()"><img src="img/del.png"></a></td>
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