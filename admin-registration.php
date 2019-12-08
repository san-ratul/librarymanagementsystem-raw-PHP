<?php 
    include_once "_include/header.php";
    include_once "_include/db/User.php"; 
    $user = new User();
    Session::loggedIn();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['register'])){
        $admin_register = $user->admin_registration($_POST);
    }

?>




    <div class="col-lg-6 col-md-6 col-sm-6 register-content-container">
        <div class="register-content">
            <h2 class="reg-f-header">Admin Registration Form</h2>
            <div class="form-container">
                <div class="f-container">
                    <form class="form-wrapper student-form" action="" method="POST">
                        <?php  
                            if(isset($admin_register)){
                                echo $admin_register;
                            }
                        ?>
                        <div class="form-group">
                            <label class="" for="adminID"> ID: </label>
                            <input class="form-control" type="text" id="adminID" name="adminID">
                        </div>
                        <div class="form-group">
                            <label class="" for="adminName"> Full Name: </label>
                            <input class="form-control" type="text" id="adminName" name="adminName">
                        </div>
                        <div class="form-group">
                            <label class="" for="adminEmail"> Email: </label>
                            <input class="form-control" type="text" id="adminEmail" name="adminEmail">
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