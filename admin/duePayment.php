<?php
include_once "../_include/db/User.php";
include_once "../_include/db/studentfunction.php";
$user     = new User();
$student  = new studentfunction($user);
if(isset($_POST["target"]) && isset($_POST["givenAmount"])){
    $id = $_POST["target"];
    $amount = $_POST["givenAmount"];
    $paymentChk = $student->updatePaidAmount($id,$amount);
    if(1 == $paymentChk){
        echo '<p class="text-success"><b>Success!</b> Payment Added </p>';
    } else{
        echo '<p class="text-danger"><b>Error!</b> Something went wrong </p>';
    }
} else{
    echo '<p class="text-danger"><b>Error!</b> Something went wrong </p>';
}

?>
