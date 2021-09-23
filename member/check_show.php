<?php include('css.php');
include("config.php");
$cate_name = $_GET['cate_name'];
$subject_name = $_GET['subject_name'];
$system_name = $_GET['system_name'];
$class_name = $_GET['class_name'];
$check_date = $_GET['check_date'];
$sql = "SELECT check_id,cus_fullname,cus_nname,scheck_name FROM check_view
        WHERE cate_name ='$cate_name' AND
        subject_name LIKE '%$subject_name%' AND
        system_name = '$system_name' AND
        class_name LIKE '$class_name' AND
        check_date = '$check_date'
        ORDER BY check_id";
$result = $conn->query($sql);
$i = 0;
?>

<body class="hold-transition skin-blue sidebar-mini">
  <div class="wrapper">
    <!-- Main Header -->
    <?php include('menutop.php'); ?>
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="main-sidebar">
      <!-- sidebar: style can be found in sidebar.less -->
      <section class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel">
          <div class="pull-left image">
            <img src="../dist/img/user2-160x160.jpg" class="img-circle" alt="User Image">
          </div>
          <div class="pull-left info">
            <p>คุณ</p>
            <!-- Status -->
            <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
          </div>
        </div>
        <?php include('menu_check.php'); ?>
      </section>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          :: <?php echo $check_date ?> ::
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box-body">
                  <a class="btn btn-primary" href="check_showDate.php?subject_name=<?php echo $subject_name ?>&system_name=<?php echo $system_name ?>&class_name=<?php echo $class_name ?>&cate_name=<?php echo $cate_name ?>" >ย้อนกลับ</a>
                  <br><br>
                    <table id="example1" class="table table-bordered  table-hover table-striped">
                      <thead>
                        <tr>
                          <th>ลำดับ</th>
                          <th>ชื่อ-สกุล</th>
                          <th>ชื่อเล่น</th>
                          <th>สถานะ</th>
                          <th style="width:100px;">ดำเนินการ</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        if ($result->num_rows > 0) {
                          // output data of each row
                          while ($row = $result->fetch_assoc()) {
                        ?>
                            <tr>
                              <td><?php echo $i = $i + 1 ?></td>
                              <td><?php echo $row['cus_fullname'] ?></td>
                              <td><?php echo $row['cus_nname'] ?></td>
                              <td>
                              <form method="POST" action="check_up.php?check_id=<?php echo $row['check_id'] ?>&check_date=<?php echo $check_date ?>&subject_name=<?php echo $subject_name ?>&system_name=<?php echo $system_name ?>&class_name=<?php echo $class_name ?>&cate_name=<?php echo $cate_name ?>">
                                <select id="scheck_id" name="scheck_id" class="form-control" style="width:100px;">
                                  <?php
                                  echo "<option value=" . '"' . $row['scheck_id'] . '"' . ">"
                                    . $row['scheck_name'] . "</option>";
                                  $usql = "SELECT scheck_id, scheck_name FROM tbscheck
                                  WHERE scheck_name IS NOT NULL ORDER BY scheck_id;";
                                  $res = $conn->query($usql);
                                  if ($res->num_rows > 0) {
                                    while ($row = $res->fetch_assoc()) {
                                      echo "<option value=" . '"' . $row['scheck_id'] . '"' . ">"
                                        . $row['scheck_name'] . "</option>";
                                    }
                                  }
                                  $conn->query($sql);
                                  ?>
                                </select>
                                
                              
                              </td>
                              <td>
                              <button type="sunmit" class="btn btn-success" onclick="return confirm_up()">บันทึก</button>
                              <!-- <a class="btn btn-danger" href="check_del.php?check_id=<?php echo $row['check_id'] ?>&check_date=<?php echo $check_date ?>&subject_name=<?php echo $subject_name ?>&system_name=<?php echo $system_name ?>&class_name=<?php echo $class_name ?>&cate_name=<?php echo $cate_name ?>" onclick="return confirm_delete()">ลบ</a> -->
                              </td>
                              </form>
                            </tr>
                        <?php
                          }
                        } else {
                          echo "0 results";
                        }

                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>

</html>
<?php include('footerjs.php');
$conn->close(); ?>