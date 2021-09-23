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
        <?php include('menu_subject.php'); ?>
      </section>
      <!-- /.sidebar -->
    </aside>
    <div class="content-wrapper">
      <section class="content-header">
        <h1>
          :: เพิ่มข้อมูล ::
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box-body">

                    <form method="POST" action="insert.php">
                      <input type="hidden" id="optinsert" name="optinsert" value="tbcourse">

                      <div class="form-group">
                        <label for="cate_id">ประเภท</label>
                        <select id="cate_id" name="cate_id" class="form-control" style="width:200px;">
                          <?php
                          $usql = "SELECT cate_id, cate_name FROM tbcategory
                    WHERE cate_name IS NOT NULL ORDER BY cate_id;";
                          $res = $conn->query($usql);
                          if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                              echo "<option value=" . '"' . $row['cate_id'] . '"' . ">"
                                . $row['cate_name'] . "</option>";
                            }
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="subject_id">วิชา</label>
                        <select id="subject_id" name="subject_id" class="form-control" style="width:200px;">
                          <?php
                          $usql = "SELECT subject_id, subject_name FROM tbsubject
                    WHERE subject_name IS NOT NULL ORDER BY subject_id;";
                          $res = $conn->query($usql);
                          if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                              echo "<option value=" . '"' . $row['subject_id'] . '"' . ">"
                                . $row['subject_name'] . "</option>";
                            }
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="system_id">ระบบการสอน</label>
                        <select id="system_id" name="system_id" class="form-control" style="width:200px;">
                          <?php
                          $usql = "SELECT system_id, system_name FROM tbsystem
                    WHERE system_name IS NOT NULL ORDER BY system_id;";
                          $res = $conn->query($usql);
                          if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                              echo "<option value=" . '"' . $row['system_id'] . '"' . ">"
                                . $row['system_name'] . "</option>";
                            }
                          }
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="course_price">ราคาคอส</label>
                        <input style="width:50%;" type="text" class="form-control" id="course_price" name="course_price">
                      </div>

                      <div class="form-group">
                        <label for="course_bookprice">ราคาหนังสือ</label>
                        <input style="width:50%;" type="text" class="form-control" id="course_bookprice" name="course_bookprice">
                      </div>

                      <div class="form-group">
                        <label for="class_id">เลือกระดับชั้น</label>
                        <select id="class_id" name="class_id" class="form-control" style="width:200px;">
                          <?php
                          $usql = "SELECT class_id, class_name FROM tbclass
                    WHERE class_name IS NOT NULL ORDER BY class_name;";
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

                      <button type="sunmit" class="btn btn-primary">เพิ่ม</button>
                      <a href="index_course_show.php" class="btn btn-default">ยกเลิก</a>
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