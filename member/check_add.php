<?php include('css.php');
include("config.php");
$cate_name = $_GET['cate_name'];
$subject_name = $_GET['subject_name'];
$system_name = $_GET['system_name'];
$class_name = $_GET['class_name'];


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

        </h1>
      </section>
      <section class="content">
        <div class="row">
          <div class="col-md-12">
            <div class="box">
              <div class="row">
                <div class="col-sm-12">
                  <div class="box-body">

                  <form method="POST" action="minsert.php?cate_name=<?php echo $cate_name ?>&subject_name=<?php echo $subject_name ?>&system_name=<?php echo $system_name ?>&class_name=<?php echo $class_name ?>">

                    <div class="form-group"> 
                      <label for="check_date">วันที่</label>
                      <input id="demo" name="check_date" type="date">
                    </div>

                    <button onclick="myFunction()" type="sunmit" class="btn btn-success">เสร็จสิ้น</button>
                  </form>

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