<?php
include_once "../_include/db/User.php";
include_once "../_include/db/studentfunction.php";

$user = new User();
$student = new studentfunction($user);

    if(isset($_POST['id']) && isset($_POST['status'])){
        $id = $_POST['id'];
        $status = $_POST['status'];
        if($status == 0){
            $check = $student->activeStudentAccount($id);
            if($check == 1){
                echo '<div class="alert alert-success">Profile Activated Successfully</div>';
            } else{
                echo '<p class="text-danger">Something went wrong!</p>';
            }
        } else{
            $check = $student->deactiveStudentAccount($id);
            if($check == 1){
                echo '<div class="alert alert-danger">Profile Dectivated Successfully</div>';
            } else{
                echo '<p class="text-danger">Something went wrong!</p>';
            }
        }
    } else{
        echo "Something went wrong!";
    }
?>