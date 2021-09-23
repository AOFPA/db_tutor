<?php include('css.php');
include("config.php");
$course_id = $_GET['course_id'];
$sql = "SELECT * FROM tbcourse as a
        left JOIN tbcategory as b
  ON a.cate_id = b.cate_id
  left JOIN tbsubject as c
  ON a.subject_id = c.subject_id
  left JOIN tbsystem as d
  ON a.system_id = d.system_id
  left JOIN tbclass as e
  ON a.class_id = e.class_id
        WHERE course_id='$course_id';";
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
                      <input type="hidden" id="optupdate" name="optupdate" value="tbcourse">
                      <button type="sunmit" class="btn btn-danger">แก้ไข</button>
                      <button type="reset" class="btn btn-success">ล้าง</button>
                      <a href="index_course_show.php" class="btn btn-primary">ยกเลิก</a>

                      <div class="form-group">
                        <input style="width:50%;" type="hidden" class="form-control" id="course_id" name="course_id" value=<?php echo $row['course_id']; ?>>
                        <label for="course_id">รหัส</label>
                        <input style="width:50%;" type="text" class="form-control" id="course_id" name="course_id" value=<?php echo $row['course_id']; ?> disabled>
                      </div>

                      <!-- <div class="form-group">
                        <label for="cus_tel">เดิม</label>
                        <input style="width:50%;" type="text" class="form-control" id="cus_tel" name="cus_tel" value=<?php echo $row['cate_name']; ?> disabled>
                      </div> -->

                      <div class="form-group">
                        <label for="cate_id">เปลี่ยนเป็นประเภท</label>
                        <select id="cate_id" name="cate_id" class="form-control" style="width:200px;">
                          <?php
                          echo "<option value=" . '"' . $row['cate_id'] . '"' . ">"
                          . $row['cate_name'] . "</option>";

                          $usql = "SELECT cate_id, cate_name FROM tbcategory
                    WHERE cate_name IS NOT NULL ORDER BY cate_id;";
                          $res = $conn->query($usql);
                          if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                              echo "<option value=" . '"' . $row['cate_id'] . '"' . ">"
                                . $row['cate_name'] . "</option>";
                            }
                          }
                          $res = $conn->query($sql);
                          $row = $res->fetch_assoc();
                          ?>
                        </select>
                      </div>

                      <!-- <div class="form-group">
                        <label for="cus_tel">เดิม</label>
                        <input style="width:50%;" type="text" class="form-control" id="cus_tel" name="cus_tel" value=<?php echo $row['subject_name']; ?> disabled>
                      </div> -->

                      <div class="form-group">
                        <label for="subject_id">เปลี่ยนเป็นวิชา</label>
                        <select id="subject_id" name="subject_id" class="form-control" style="width:200px;">
                          <?php
                          echo "<option value=" . '"' . $row['subject_id'] . '"' . ">"
                          . $row['subject_name'] . "</option>";

                          $usql = "SELECT subject_id, subject_name FROM tbsubject
                    WHERE subject_name IS NOT NULL ORDER BY subject_id;";
                          $res = $conn->query($usql);
                          if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                              echo "<option value=" . '"' . $row['subject_id'] . '"' . ">"
                                . $row['subject_name'] . "</option>";
                            }
                          }
                          $res = $conn->query($sql);
                          $row = $res->fetch_assoc();
                          ?>
                        </select>
                      </div>

                      <!-- <div class="form-group">
                        <label for="cus_tel">เดิม</label>
                        <input style="width:50%;" type="text" class="form-control" id="cus_tel" name="cus_tel" value=<?php echo $row['system_name']; ?> disabled>
                      </div> -->

                      <div class="form-group">
                        <label for="system_id">เปลี่ยนเป็นระบบการสอน</label>
                        <select id="system_id" name="system_id" class="form-control" style="width:200px;">
                          <?php
                          echo "<option value=" . '"' . $row['system_id'] . '"' . ">"
                          . $row['system_name'] . "</option>";

                          $usql = "SELECT system_id, system_name FROM tbsystem
                    WHERE system_name IS NOT NULL ORDER BY system_id;";
                          $res = $conn->query($usql);
                          if ($res->num_rows > 0) {
                            while ($row = $res->fetch_assoc()) {
                              echo "<option value=" . '"' . $row['system_id'] . '"' . ">"
                                . $row['system_name'] . "</option>";
                            }
                          }
                          $res = $conn->query($sql);
                          $row = $res->fetch_assoc();
                          ?>
                        </select>
                      </div>

                      <div class="form-group">
                        <label for="course_price">ราคาคอส</label>
                        <input style="width:50%;" type="text" class="form-control" id="course_price" name="course_price" value=<?php echo $row['course_price']; ?>>
                      </div>

                      <div class="form-group">
                        <label for="course_bookprice">ราคาหนังสือ</label>
                        <input style="width:50%;" type="text" class="form-control" id="course_bookprice" name="course_bookprice" value=<?php echo $row['course_bookprice']; ?>>
                      </div>

                      <!-- <div class="form-group">
                        <label for="cus_tel">เดิม</label>
                        <input style="width:50%;" type="text" class="form-control" id="cus_tel" name="cus_tel" value=<?php echo $row['class_name']; ?> disabled>
                      </div> -->

                      <div class="form-group">
                        <label for="class_id">เปลี่ยนเป็นระดับชั้น</label>
                        <select id="class_id" name="class_id" class="form-control" style="width:200px;">
                          <?php
                           echo "<option value=" . '"' . $row['class_id'] . '"' . ">"
                           . $row['class_name'] . "</option>";
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