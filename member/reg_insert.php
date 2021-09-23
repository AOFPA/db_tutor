<?php
    include('css.php');
    include "config.php";
    if($conn->connect_error){
        echo "error";
    }
    
        $cus_id = $_POST['cus_id']; 
        $course_id = $_POST['course_id']; 
        $reg_start = $_POST['course_start']; 
        $reg_end = $_POST['course_end']; 

        $sql = "INSERT INTO tbregister(cus_id,course_id,reg_end,reg_start) 
                VALUES ('$cus_id','$course_id','$reg_end','$reg_start') ;";
    
    $conn->query($sql);
    // if ($conn->query($sql) === TRUE) {
    //         header("location: index_reg_showcus.php");
    //         exit();
    //   } else {
    //     echo "Error: " . $sql . "<br>" . $conn->error;
    //   }
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
                      <h2>ต้องการลงทะเบียนเรียนเพิ่มใช่หรือไม่</h2>
                     
                      <a href="reg_add.php?cus_id=<?php echo $cus_id ?>" class="btn btn-success">ใช่</a>
                        <a href="index_reg_showcus.php" class="btn btn-default">ไม่</a>

                        <br>
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

<?php 
include('footerjs.php'); 
$conn->close();
?>