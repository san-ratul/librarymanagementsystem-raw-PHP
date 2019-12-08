<?php 
    include_once "_include/header.php";
    include_once "_include/db/User.php"; 
    $user = new User();
    Session::loggedIn();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
        $student_register = $user->student_registration($_POST);
    }

?>




    <div class="col-lg-6 col-md-6 col-sm-6 register-content-container">
        <div class="register-content">
            <h2 class="reg-f-header">Student Registration Form</h2>
            <div class="form-container">
                <div class="f-container">
                    <form class="form-wrapper student-form" action="" method="POST">
                        <?php  
                            if(isset($student_register)){
                                echo $student_register;
                            }
                        ?>
                        <div class="form-group">
                            <label class="" for="studentID"> Student ID: </label>
                            <input class="form-control" type="text" id="studentID" name="studentID">
                        </div>
                        <div class="form-group">
                            <label class="" for="studentName"> Student Name: </label>
                            <input class="form-control" type="text" id="studentName" name="studentName">
                        </div>
                        <div class="form-group">
                            <label class="" for="studentEmail"> Email: </label>
                            <input class="form-control" type="text" id="studentEmail" name="studentEmail">
                        </div>
                        <div class="form-group">
                            <label for="spassword"> Password: </label>
                            <input class="form-control" type="password" id="spassword" name="spassword">
                        </div>
                        <div class="form-group">
                            <label for="cpassword"> Confirm Password: </label>
                            <input class="form-control" type="password" id="cpassword" name="cpassword">
                        </div>
                        <div class="form-group">
                            <label class="" for="phoneNumber"> Phone Number: </label>
                            <input class="form-control" type="text" id="phoneNumber" name="phoneNumber">
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input class="btn btn-danger pull-right" name="register" type="submit" value="Register">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>



<?php include_once "_include/footer.php" ?>