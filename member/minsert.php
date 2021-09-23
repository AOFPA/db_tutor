<?php
include "config.php";

$cate_name = $_GET['cate_name'];
$subject_name = $_GET['subject_name'];
$system_name = $_GET['system_name'];
$class_name = $_GET['class_name'];

$check_date = $_POST['check_date'];

$sql = "SELECT cus_id FROM tbregister_view1
        WHERE cate_name ='$cate_name' AND
        subject_name LIKE '%$subject_name%' AND
        system_name = '$system_name' AND
        reg_class LIKE '%$class_name%'
        ORDER BY cus_id;";

$sql05 = "SELECT course_id FROM tbcourse_view
        WHERE cate_name ='$cate_name' AND
        subject_name LIKE '%$subject_name%' AND
        system_name = '$system_name' AND
        class_name = '$class_name';";

$course = $conn->query($sql05);
$c = $course->fetch_assoc();

$result = $conn->query($sql);



if ($conn->connect_error) {
    echo "error";
}

if ($result->num_rows > 0) {
    // output data of each row
    while ($row = $result->fetch_assoc()) {
        $usql = "INSERT INTO tbcheck(course_id,cus_id,check_date,scheck_id) 
                VALUES ('$c[course_id]','$row[cus_id]','$check_date','1');";
        $conn->query($usql);
    }
    header("location: check_showDate.php?cate_name=$cate_name&subject_name=$subject_name&system_name=$system_name&class_name=$class_name");
    
}else {
    echo "ยังไม่มีรายชื่อนักเรียนในคอร์สเรียนนี้<br>
    <br><br><br><br><br> สำหรับนักพัฒนา ====>";
  }

  $conn->close();
?>






// $opt = $_POST['optinsert'];
// if ($opt == "tbcustomer") {
//     $prefix_id = $_POST['prefix_id'];
//     $cus_fname = $_POST['cus_fname'];
//     $cus_lname = $_POST['cus_lname'];
//     $cus_nname = $_POST['cus_nname'];
//     $cus_tel = $_POST['cus_tel'];
//     $cass_id = $_POST['cass_id'];
//     $school_id = $_POST['school_id'];

//     $sql = "INSERT INTO tbcustomer(prefix_id,cus_fname,cus_lname,cus_nname,cus_tel,cass_id,school_id) 
//                 VALUES ('$prefix_id','$cus_fname','$cus_lname','$cus_nname','$cus_tel','$cass_id','$school_id');";
// } elseif ($opt == "tbsubject") {
//     $subject_name = $_POST['subject_name'];
//     $sql = "INSERT INTO tbsubject(subject_name) VALUES ('$subject_name')";
// } elseif ($opt == "tbclass") {
//     $class_name = $_POST['class_name'];
//     $sql = "INSERT INTO tbclass(class_name) VALUES ('$class_name')";
// } elseif ($opt == "tbtime") {
//     $day_id = $_POST['day_id'];
//     $time_time = $_POST['time_time'];
//     $sql = "INSERT INTO tbtime(day_id,time_time) VALUES ('$day_id','$time_time')";
// } elseif ($opt == "tbcategory") {
//     $cate_name = $_POST['cate_name'];
//     $sql = "INSERT INTO tbcategory(cate_name) VALUES ('$cate_name')";
// } elseif ($opt == "tbschool") {
//     $school_name = $_POST['school_name'];
//     $sql = "INSERT INTO tbschool(school_name) VALUES ('$school_name')";
// } elseif ($opt == "tbcourse") {
//     $cate_id = $_POST['cate_id'];
//     $subject_id = $_POST['subject_id'];
//     $system_id = $_POST['system_id'];
//     $course_price = $_POST['course_price'];
//     $course_bookprice = $_POST['course_bookprice'];
//     $class_id = $_POST['class_id'];
//     $sum = $course_price + $course_bookprice;

//     $sql = "INSERT INTO tbcourse(cate_id,subject_id,system_id,course_price,course_bookprice,course_total,class_id) 
//         VALUES('$cate_id','$subject_id','$system_id','$course_price','$course_bookprice','$sum','$class_id')";
// } elseif ($opt == "tbstudy") {
//     $course_id = $_POST['course_id'];
//     $time_id = $_POST['time_id'];

//     $sql = "INSERT INTO tbstudy(course_id,time_id) 
//         VALUES('$course_id','$time_id');";
// } elseif ($opt == "tbcustomer1") {
//     $prefix_id = $_POST['prefix_id'];
//     $cus_fname = $_POST['cus_fname'];
//     $cus_lname = $_POST['cus_lname'];
//     $cus_nname = $_POST['cus_nname'];
//     $cus_tel = $_POST['cus_tel'];
//     $cass_id = $_POST['cass_id'];
//     $school_id = $_POST['school_id'];

//     $sql = "INSERT INTO tbcustomer(prefix_id,cus_fname,cus_lname,cus_nname,cus_tel,cass_id,school_id) 
//                 VALUES ('$prefix_id','$cus_fname','$cus_lname','$cus_nname','$cus_tel','$cass_id','$school_id');";
// } elseif ($opt == "tbregister") {
//     $cus_id = $_POST['cus_id'];
//     $course_id = $_POST['course_id'];
//     $reg_end = $_POST['course_end'];

//     $sql = "INSERT INTO tbregister(cus_id,course_id,reg_end) 
//                 VALUES ('$cus_id','$course_id','$reg_end') ;";
// }

// if ($conn->query($sql) === TRUE) {
//     if ($opt == 'tbcustomer') {
//         header("location: index_customer_show.php");
//     } elseif ($opt == 'tbsubject') {
//         header("location: index_subject_show.php");
//     } elseif ($opt == 'tbclass') {
//         header("location: index_class_show.php");
//     } elseif ($opt == 'tbtime') {
//         header("location: index_time_show.php");
//     } elseif ($opt == 'tbcategory') {
//         header("location: index_category_show.php");
//     } elseif ($opt == 'tbschool') {
//         header("location: index_school_show.php");
//     } elseif ($opt == 'tbcourse') {
//         header("location: index_course_show.php");
//     } elseif ($opt == 'tbstudy') {
//         header("location: index_study_show.php");
//     } elseif ($opt == 'tbcustomer1') {
//         header("location: index_reg_showcus.php");
//     } elseif ($opt == "tbregister") {
//         header("location: index_reg_showcus.php");
//     }
//     exit();
// } else {
<!-- //     echo "Error: " . $sql . "<br>" . $conn->error; -->
// }
