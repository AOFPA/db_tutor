<?php include('css.php');
include("config.php");
$cate_id = $_GET['cate_id'];
$sql = "SELECT * FROM tbcategory 
  WHERE cate_id='$cate_id';";
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
                      <input type="hidden" id="optupdate" name="optupdate" value="tbcategory">
                      <button type="sunmit" class="btn btn-danger">แก้ไข</button>
                      <button type="reset" class="btn btn-success">ล้าง</button>
                      <a href="index_category_show.php" class="btn btn-primary">ยกเลิก</a>

                      <div class="form-group">
                        <input style="width:50%;" type="hidden" class="form-control" id="cate_id" name="cate_id" value=<?php echo $row['cate_id']; ?>>
                        <label for="cate_id">รหัส</label>
                        <input style="width:50%;" type="text" class="form-control" id="cate_id" name="cate_id" value=<?php echo $row['cate_id']; ?> disabled>
                      </div>

                      <div class="form-group">
                        <label for="cate_name">ประเภท</label>
                        <input style="width:50%;" type="text" class="form-control" id="cate_name" name="cate_name" value=<?php echo "\"" . $row['cate_name'] . "\""; ?>>
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