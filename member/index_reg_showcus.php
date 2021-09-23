<?php include('css.php'); ?>

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
                    <p>
                      - หากมีข้อมูลลูกค้าเดิมอยู่แล้ว ให้ดำเนินการ "ลงเรียน" ได้เลย<br>
                      - หากเป็นลูกค้ารายใหม่ให้เพิ่มข้อมูลลูกค้าก่อน จึงดำเนินการ "ลงเรียน"
                    </p>
                    <a href="reg_addcus.php" type="submit" class="btn btn-primary">เพิ่มข้อมูลนักเรียนรายใหม่</a>
                    <br><br>
                    <?php include('reg_showcus.php'); ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
</body>

</html>
<?php include('footerjs.php'); ?>