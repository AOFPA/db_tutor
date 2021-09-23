<?php include('css.php'); 
include("config.php");
$cus_id = $_GET['cus_id'];
$sql = "SELECT * FROM tbcustomer_view
        WHERE cus_id='$cus_id';";



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
        <?php include('menu_reg.php'); ?>
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
                      <h2>ลงทะเบียนเรียน</h2>
                      <form method="POST" action="reg_insert.php">
                        <input type="hidden" id="optinsert" name="optinsert" value="tbregister">

                        <div class="form-group">
                          <input style="width:50%;" type="hidden" class="form-control" id="cus_id" name="cus_id" value=<?php echo $row['cus_id']; ?>>
                          <label for="cus_id">รหัสนักเรียน</label>
                          <input style="width:50%;" type="text" class="form-control" id="cus_id" name="cus_id" value=<?php echo $row['cus_id']; ?> disabled>
                        </div>

                        <div class="form-group">
                          <label for="show_id">ชื่อ-สกุล</label>
                          <input style="width:50%;" type="text" class="form-control" id="show_id" name="show_id" value=<?php echo "\"" . $row['cus_fullname'] . "\""; ?> disabled>
                        </div>


                        <div class="form-group">
                          <label for="course_id">เลือกคอร์ส</label>
                          <select id="course_id" name="course_id" class="form-control" style="width:700px;">
                            <?php
                            $usql = "SELECT * FROM course_select";
                            $res = $conn->query($usql);
                            if ($res->num_rows > 0) {
                              while ($row = $res->fetch_assoc()) {
                                echo "<option value=" . '"' . $row['course_id'] . '"' . ">"
                                  . $row['system_name'] . '/' . $row['cate_name'] . '/' .
                                  $row['subject_name'] . '/' . $row['class_name'] . '/ราคา=' .
                                  $row['course_price'] . '/ราคาหนังสือ=' . $row['course_bookprice'] . '/รวม=' . $row['course_total'] . "</option>";
                              }
                            }
                            ?>
                          </select>
                        </div>
                        <div class="form-group">
                          <label for="course_start">วันที่เริ่มเรียน</label>
                          <input id="demo" name="course_start" type="date">
                        </div>
                        <div class="form-group">
                          <label for="course_end">วันที่สิ้นสุดคอร์สเรียน</label>
                          <input id="demo" name="course_end" type="date">
                        </div>
                        <br>
                        <button onclick="myFunction()" type="sunmit" class="btn btn-success">ลงทะเบียน</button>
                
                        <a href="index_reg_showcus.php" class="btn btn-default">ยกเลิก</a>
                      </form>
                      <br>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box-body">
                    <div class="container">
                    <h2>ลงทะเบียนด้วยประวัติ</h2>
                  <?php
                      
                  ?>
                    <table id="example1" class="table table-bordered  table-hover table-striped">
  <thead>
    <tr>
      <th>รหัส</th>
      <!-- <th>ชื่อ-สกุล</th>
      <th>ชื่อเล่น</th>
      <th>เบอร์โทรผู้ปกครอง</th>
      <th>ระดับชั้น</th>
      <th>โรงเรียน</th> -->
      <th>คอร์สที่ลงเรียน</th>
      <th>วันที่สมัคร</th>
      
      
      <th>ราคาสุทธิ</th>
      <th>สถานะการชำระเงิน</th>
      <th style="width:50px">ดำเนินการ</th>
    </tr>
  </thead>
  <tbody>
    <?php
    $xsql = "SELECT * FROM `tbregister_view1` WHERE cus_id = $cus_id;";
    $xresult = $conn->query($xsql);
    if ($xresult->num_rows > 0) {
      // output data of each row
      while ($xrow = $xresult->fetch_assoc()) {
    ?>
        <tr>
          <td><?php echo $xrow['reg_id'] ?></td>
          <!--<td><?php echo $xrow['cus_fullname'] ?></td>
          <td><?php echo $xrow['cus_nname'] ?></td>
          <td><?php echo $xrow['cus_tel'] ?></td>
          <td><?php echo $xrow['class_name'] ?></td> -->
          <!-- <td><?php echo $xrow['school_name'] ?></td> -->
          <td><?php echo $xrow['cate_name'] . $xrow['subject_name'] . $xrow['system_name'] . $xrow['reg_class'] ?></td>
          <td><?php echo $xrow['reg_time'] ?></td>
          
          
          <td><?php echo $xrow['course_total'] ?></td>
          <td><?php echo $xrow['status_name'] ?></td>
          <td><a class="btn btn-success" href="reg_add1.php?cus_id=<?php echo $cus_id ?>&cate_name=<?php echo $xrow['cate_name'] ?>&subject_name=<?php echo $xrow['subject_name'] ?>&system_name=<?php echo $xrow['system_name'] ?>&class_name=<?php echo $xrow['reg_class'] ?>">เลือก</a></td>
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
        </div>
      </section>
</body>

</html>
<?php include('footerjs.php'); $conn->close();?>