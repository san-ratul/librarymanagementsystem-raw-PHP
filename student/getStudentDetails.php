<?php 
    include_once "../_include/db/User.php";
    include_once "../_include/db/studentfunction.php";

    $user = new User();
    $student = new studentfunction($user);

    if( isset($_POST['studentId'])){
        $studentId = $_POST['studentId'];
        $studentDetails = $student->getStudent($studentId);
        if(!empty($studentDetails)){
            if($studentDetails->active==1){
                if($studentDetails->due == 0){
                    $eligibility = '<span class = "text-success"> Eligible </span>';
                } else $eligibility = '<span class = "text-danger"> Not eligible </span>';
    ?>
                <p><b>Student ID: </b> <span class="studentId"><?php echo $studentDetails->sid; ?></span></p>
                <p><b>Student Name: </b> <?php echo $studentDetails->sName; ?> </p>
                <p><b>Student Email: </b> <?php echo $studentDetails->email; ?> </p>
                <p><b>Due: </b> <span class="due"><?php echo $studentDetails->due; ?></span> Taka</p>
                <p><b>Eligibility: </b> <?php echo $eligibility; ?></p>
<?php       } else{
                echo '<p class="text-danger" > Student ID not active!</p>';
            }
        } else{
            echo '<p class="text-danger" > Student ID not found!</p>'; ?>
            <script> $('.btn-reserve-book').removeAttr('data-sid'); </script>
<?php
        }
}

?>