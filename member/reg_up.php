<?php include('css.php');
include("config.php");
$reg_id = $_GET['reg_id'];
$sql = "SELECT * FROM tbregister_view 
        WHERE reg_id='$reg_id';";
$res = $conn->query($sql);
$row = $res->fetch_assoc();
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
        <?php include('menu_subject.php'); ?>
      </section>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          :: แก้ไข ::
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box-body">

                    <form method="POST" action="update.php">
                      <input type="hidden" id="optupdate" name="optupdate" value="tbreg">
                      <button type="sunmit" class="btn btn-danger">แก้ไข</button>
                      <button type="reset" class="btn btn-success">ล้าง</button>
                      <a href="index.php" class="btn btn-primary">ยกเลิก</a>

                      <div class="form-group">
                        <input style="width:50%;" type="hidden" class="form-control" id="reg_id" name="reg_id" value=<?php echo $row['reg_id']; ?>>
                        <label for="reg_id">รหัส</label>
                        <input style="width:50%;" type="text" class="form-control" id="reg_id" name="reg_id" value=<?php echo $row['reg_id']; ?> disabled>
                      </div>

                      <div class="form-group">
                        <input style="width:50%;" type="hidden" class="form-control" id="cus_fullname" name="cus_fullname" value=<?php echo $row['cus_fullname']; ?>>
                        <label for="reg_id">ชื่อ-สกุล</label>
                        <input style="width:50%;" type="text" class="form-control" id="cus_fullname" name="cus_fullname" value=<?php echo "\"" . $row['cus_fullname'] . "\""; ?> disabled>
                      </div>

                      <div class="form-group">
                        <input style="width:50%;" type="hidden" class="form-control" id="cus_fullname" name="cus_fullname" value=<?php echo $row['cus_fullname']; ?>>
                        <label for="reg_id">คอสที่ลง</label>
                        <input style="width:50%;" type="text" class="form-control" id="cus_fullname" name="cus_fullname" value=<?php echo $row['system_name'] . '/' . $row['cate_name'] . '/' .
                                                                                                                                  $row['subject_name'] . '/' . $row['class_name'] . '/ราคา=' .
                                                                                                                                  $row['course_price'] . '/ราคาหนังสือ=' . $row['course_bookprice'] . '/รวม=' . $row['course_total']; ?> disabled>
                      </div>

                      <div class="form-group">
                        <label for="status_id">สถานะการชำระเงิน</label>
                        <select id="status_id" name="status_id" class="form-control" style="width:200px;">
                          <?php

echo "<option value=" . '"' . $row['status_id'] . '"' . ">"
                                . $row['status_name'] . "</option>";

                          $usql = "SELECT * FROM tbstatus
                  ORDER BY status_id;";
                          $res = $conn->query($usql);
                          if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                              echo "<option value=" . '"' . $row['status_id'] . '"' . ">"
                                . $row['status_name'] . "</option>";
                            }
                          }
                          $res = $conn->query($sql);
                          $row = $res->fetch_assoc();
                          ?>
                        </select>
                      </div>

                    </form>
                    <br>
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