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
                      <input type="hidden" id="optinsert" name="optinsert" value="tbcategory">


                      <div class="form-group">
                        <label for="cate_name">ชื่อประเภท</label>
                        <input style="width:50%;" type="text" class="form-control" id="cate_name" name="cate_name">
                      </div>

                      <button type="sunmit" class="btn btn-primary">เพิ่ม</button>
                      <a href="index_category_show.php" class="btn btn-default">ยกเลิก</a>
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