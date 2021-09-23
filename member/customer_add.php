<?php include('css.php');
include("config.php"); ?>

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
        <?php include('menu_customer.php'); ?>
      </section>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <section class="content-header">
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box-body">
                    <div class="container">
                      <h2>เพิ่มข้อมูลลูกค้า</h2>
                      <form method="POST" action="insert.php">
                        <input type="hidden" id="optinsert" name="optinsert" value="tbcustomer">
                        <div class="form-group">
                          <label for="prefix_id">เลือกคำนำหน้าชื่อ:</label>
                          <select id="prefix_id" name="prefix_id" class="form-control" style="width:200px;">
                            <?php
                            $usql = "SELECT prefix_id, prefix_name FROM tbprefix
                    WHERE prefix_name IS NOT NULL ORDER BY prefix_id;";
                            $res = $conn->query($usql);
                            if ($res->num_rows > 0) {
                              while ($row = $res->fetch_assoc()) {
                                echo "<option value=" . '"' . $row['prefix_id'] . '"' . ">"
                                  . $row['prefix_name'] . "</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="cus_fname">ชื่อ</label>
                          <input style="width:50%;" type="text" class="form-control" id="cus_fname" name="cus_fname">
                        </div>

                        <div class="form-group">
                          <label for="cus_lname">นามสกุล</label>
                          <input style="width:50%;" type="text" class="form-control" id="cus_lname" name="cus_lname">
                        </div>

                        <div class="form-group">
                          <label for="cus_nname">ชื่อเล่น</label>
                          <input style="width:50%;" type="text" class="form-control" id="cus_nname" name="cus_nname">
                        </div>

                        <div class="form-group">
                          <label for="cus_tel">เบอร์โทรผู้ปกครอง</label>
                          <input style="width:50%;" type="text" class="form-control" id="cus_tel" name="cus_tel">
                        </div>

                        <div class="form-group">
                          <label for="cass_id">เลือกระดับชั้น</label>
                          <select id="cass_id" name="cass_id" class="form-control" style="width:200px;">
                            <?php
                            $usql = "SELECT class_id, class_name FROM tbclass
                    WHERE class_name IS NOT NULL ORDER BY class_id;";
                            $res = $conn->query($usql);
                            if ($res->num_rows > 0) {
                              while ($row = $res->fetch_assoc()) {
                                echo "<option value=" . '"' . $row['class_id'] . '"' . ">"
                                  . $row['class_name'] . "</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>

                        <div class="form-group">
                          <label for="school_id">เลือกโรงเรียน</label>
                          <select id="school_id" name="school_id" class="form-control" style="width:600px;">
                            <?php
                            $usql = "SELECT school_id, school_name FROM tbschool
                    WHERE school_name IS NOT NULL ORDER BY school_id;";
                            $res = $conn->query($usql);
                            if ($res->num_rows > 0) {
                              while ($row = $res->fetch_assoc()) {
                                echo "<option value=" . '"' . $row['school_id'] . '"' . ">"
                                  . $row['school_name'] . "</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>

                        <button type="sunmit" class="btn btn-primary">เพิ่ม</button>
                        <a href="index_customer_show.php" class="btn btn-default">ยกเลิก</a>
                      </form>
                      <br>

                    </div>
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