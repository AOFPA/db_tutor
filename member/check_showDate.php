<?php include('css.php'); 
include("config.php");
$cate_name = $_GET['cate_name'];
$subject_name = $_GET['subject_name'];
$system_name = $_GET['system_name'];
$class_name = $_GET['class_name'];
$sql = "SELECT DISTINCT check_date FROM check_view
        WHERE cate_name ='$cate_name' AND
        subject_name LIKE '%$subject_name%' AND
        system_name = '$system_name' AND
        class_name = '$class_name'
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
            ::<?php echo $system_name ?> ประเภท<?php echo $cate_name ?> วิชา<?php echo $subject_name ?> <?php echo $class_name ?>::
        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box-body">
                  <a class="btn btn-primary" href="check_course.php" >ย้อนกลับ</a>
                    <a href="check_add.php?subject_name=<?php echo $subject_name ?>&system_name=<?php echo $system_name ?>&class_name=<?php echo $class_name ?>&cate_name=<?php echo $cate_name ?>" type="submit" class="btn btn-success">เพิ่มใบรายชื่อ</a>
                    <br><br>
                    <table id="example1" class="table table-bordered  table-hover table-striped">
                      <thead>
                        <tr>
                          <th>ลำดับ</th>
                          <th>วันที่</th>
                          <th style="width:120px">ดำเนินการ</th>
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
                              <td><?php echo $row['check_date'] ?></td>
                              <td><a href="check_show.php?check_date=<?php echo $row['check_date'] ?>&subject_name=<?php echo $subject_name ?>&system_name=<?php echo $system_name ?>&class_name=<?php echo $class_name ?>&cate_name=<?php echo $cate_name ?>" class="btn btn-success">รายละเอียด</a>
                              <a href="check_delsheet.php?check_date=<?php echo $row['check_date'] ?>&subject_name=<?php echo $subject_name ?>&system_name=<?php echo $system_name ?>&class_name=<?php echo $class_name ?>&cate_name=<?php echo $cate_name ?>" class="btn btn-danger">ลบ</a>
                              </td>
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
$conn->close();?>