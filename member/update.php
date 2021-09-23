<?php
    include "config.php";

    $opt = $_POST['optupdate'];
    if($opt=="tbcustomer"){
        $cus_id = $_POST['cus_id'];
        $prefix_id = $_POST['prefix_id'];
        $cus_fname = $_POST['cus_fname'];
        $cus_lname = $_POST['cus_lname'];
        $cus_nname = $_POST['cus_nname'];
        $cus_tel = $_POST['cus_tel'];
        $cass_id = $_POST['cass_id'];
        $school_id = $_POST['school_id'];

        $sql = "UPDATE tbcustomer SET prefix_id='$prefix_id',cus_fname='$cus_fname',cus_lname='$cus_lname',cus_nname='$cus_nname',cus_tel='$cus_tel',cass_id='$cass_id',school_id='$school_id' WHERE cus_id='$cus_id';";

    }elseif($opt=="tbsubject"){
        $subject_id = $_POST['subject_id'];
        $subject_name = $_POST['subject_name'];
        $sql = "UPDATE tbsubject SET subject_name='$subject_name' WHERE subject_id='$subject_id';";
    }elseif($opt=="tbclass"){
        $class_id = $_POST['class_id'];
        $class_name = $_POST['class_name'];
        $sql = "UPDATE tbclass SET class_name='$class_name' WHERE class_id='$class_id';";
    }elseif($opt=="tbtime"){
        $time_id = $_POST['time_id'];
        $day_id = $_POST['day_id'];
        $time_time = $_POST['time_time'];
        $sql = "UPDATE tbtime SET day_id='$day_id',time_time='$time_time' WHERE time_id='$time_id'";    
    }elseif($opt=="tbcategory"){
        $cate_id = $_POST['cate_id'];
        $cate_name = $_POST['cate_name'];
        $sql = "UPDATE tbcategory SET cate_name='$cate_name' WHERE cate_id='$cate_id';";    
    }elseif($opt=="tbschool"){
        $school_id = $_POST['school_id'];
        $school_name = $_POST['school_name'];
        $sql = "UPDATE tbschool SET school_name='$school_name' WHERE school_id='$school_id';";   
    }elseif($opt=="tbcourse"){
        $course_id = $_POST['course_id']; 
        $cate_id = $_POST['cate_id'];
        $subject_id = $_POST['subject_id'];
        $system_id = $_POST['system_id'];
        $course_price = $_POST['course_price'];
        $course_bookprice = $_POST['course_bookprice'];
        $class_id = $_POST['class_id'];
        $sum = $course_price+$course_bookprice;

        $sql = "UPDATE tbcourse SET 
        cate_id = '$cate_id',
        subject_id = '$subject_id',
        system_id = '$system_id',
        course_price = '$course_price',
        course_bookprice = '$course_bookprice',
        class_id = '$class_id',
        course_total = '$sum'
        WHERE course_id='$course_id';";    
    }elseif($opt=="tbstudy"){
        $s_id = $_POST['s_id'];
        $course_id = $_POST['course_id'];
        $time_id = $_POST['time_id'];

        $sql = "UPDATE tbstudy SET course_id ='$course_id',time_id = '$time_id' 
                WHERE s_id='$s_id';";  
    }elseif($opt=="tbreg"){
        $reg_id = $_POST['reg_id'];
        $status_id = $_POST['status_id'];

        $sql = "UPDATE tbregister SET status_id ='$status_id' 
                WHERE reg_id='$reg_id';";  
    }

    $res = $conn->query($sql);
    if($res){
        if($opt=="tbcustomer"){
            header("Location: index_customer_show.php");
        }else if ($opt=="tbsubject"){
            header("Location: index_subject_show.php");
        }else if ($opt=="tbclass"){
            header("Location: index_class_show.php");
        }else if ($opt=="tbtime"){
            header("Location: index_time_show.php");
        }else if ($opt=="tbcategory"){
            header("Location: index_category_show.php");
        }elseif($opt=='tbschool'){
            header("location: index_school_show.php");
        }elseif($opt=='tbcourse'){
            header("location: index_course_show.php");
        }elseif($opt=='tbstudy'){
            header("location: index_study_show.php");
        }elseif($opt=='tbreg'){
            header("location: index.php");
        }
    }else{
        echo "Error deleting record: " . $conn->error;
    }
    $conn->close();
?>