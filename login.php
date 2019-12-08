<?php 
    
    include_once "_include/header.php";
    include_once "_include/db/User.php"; 
    $user = new User();
    Session::loggedIn();
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['sLogin'])){
        $student_login = $user->studentLogin($_POST);
    } else if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['aLogin'])){
        $admin_login = $user->adminLogin($_POST);
    }
    

?>




    <div class="col-lg-6 col-md-6 col-sm-6 login-content-container">
        <div class="login-content">
            <div class="button-container">
                <ul>
                    <div class="tab button-center">
                        <li class="active-button">
                            <a data-target="student-form" data-url="student" href="#">Student</a>
                        </li>
                        <li>
                            <a data-target="admin-form" data-url="admin" href="#admin">Admin</a>
                        </li>
                    </div>
                </ul>
            </div>
            <div class="form-container">
                <div class="f-container">
                    <form class="form-wrapper student-form" action="" method="POST">
                        <div class="form-group">
                            <label class="" for="studentID"> Student ID: </label>
                            <input class="form-control" type="text" id="studentID" name="studentID">
                        </div>
                        <div class="form-group">
                            <label for="spassword"> Password: </label>
                            <input class="form-control" type="password" id="spassword" name="spassword">
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input class="btn btn-info pull-right" name="sLogin" type="submit" value="Login">
                        </div>
                    </form>
                    <form class="form-wrapper admin-form" action="" method="POST">
                        <div class="form-group">
                            <label class="" for="adminID"> Admin ID: </label>
                            <input class="form-control" type="text" id="adminID" name="adminID">
                        </div>
                        <div class="form-group">
                            <label for="apassword"> Password: </label>
                            <input class="form-control" type="password" id="apassword" name="apassword">
                        </div>
                        <div class="form-group">
                            <label></label>
                            <input class="btn btn-info pull-right" name="aLogin" type="submit" value="Login">
                        </div>
                    </form>
                </div>
                <div class="error">
                    <?php  
                        if(isset($student_login)){
                            echo $student_login;
                        } else if(isset($admin_login)){
                            echo $admin_login;
                        }
                    ?>
                </div>
                 
                <p class="reg-link">Not Yet Registered? <a href="student-registration.php">Register</a></p>
            </div>
        </div>
    </div>

<?php include_once "_include/footer.php" ?>