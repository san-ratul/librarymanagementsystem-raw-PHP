<?php
    include_once "../_include/db/User.php";
    include_once "../_include/db/studentfunction.php";
    
    $user = new User();
    $student = new studentfunction($user);

    if(isset($_POST['id'])){
        $id = $_POST['id'];
        $studentDetails = $student->getStudent($id);
        $parentDetails = $student->getParentDetails($id);
        $listOfBooks = $student->listBooksToReturn($id);
    }
    if($studentDetails->due > 0){
        $badgeClass = "badge-danger";
    } else{
        $badgeClass = "badge-success";
    }
    

?>

<h2><?php echo $studentDetails->sName ?> <span class="badge due-badge <?php echo $badgeClass; ?>">Total Due: <?php echo $studentDetails->due; ?> Taka </span> </h2> 
<?php
    if($studentDetails->active == 1){
        echo '<a href="#" class="active-status text-success" data-target="',$studentDetails->sid,'" data-status="',$studentDetails->active,'"> Active </a>';
    } else{
        echo '<a href="#" class="active-status text-danger" data-target=',$studentDetails->sid,' data-status=',$studentDetails->active,'> Not Active </a>';
    }
?>
<p class="active-response"></p>

<h3>Personal Details: </h3>
<p class="s-id">
    <strong>Student ID: </strong> <?php echo $studentDetails->sid?>
</p>
<p class="s-email">
    <strong>Student Email: </strong> <?php echo $studentDetails->email?> 
    <a class="edit-s-email" href="#">Edit</a>
    <div class="email-response hidden">
        <div class="form-group">
            <form action="#">
                <div class="form-group">
                    <input class="form-control form-edit" type="email" id = "email" autocomplete="off" />
                    <input type="submit" class="btn btn-default update" data-target="email" data-id = "<?php echo $id;?>" value="Update Email"/>
                </div>
            </form>
        </div>
        <div class="email-ajax-response"></div>
    </div>
</p>
<p class="s-phoneNo">
    <strong>Student Phone Number: </strong> <?php echo $studentDetails->phoneNumber?>
    <a class="edit-s-phone-number" href="#">Edit</a>
    <div class="phone-response hidden">
        <div class="form-group">
            <form action="#">
                <div class="form-group">
                    <input class="form-control form-edit" type="text" id = "phone-number" autocomplete="off" />
                    <input type="submit" class="btn btn-default update" data-target="phone" data-id = "<?php echo $id;?>" value="Update Phone Number"/>
                </div>
            </form>
        </div>
        <div class="phone-ajax-response"></div>
    </div>
</p>
<div class="row container">
    <h3 class="parents-details">Parents Details: </h3>
    <div class="father-details col-lg-6 col-md-6">
        <p class="s-father-name">
            <strong>Father's Name: </strong> <?php echo $parentDetails->fatherName ?>
            <a class="edit-s-father-name" href="#">Edit</a>
            <div class="fname-response hidden">
                <div class="form-group">
                    <form action="#">
                        <div class="form-group">
                            <input class="form-control form-edit" type="text" id = "father-name" autocomplete="off" />
                            <input type="submit" class="btn btn-default update" data-id = "<?php echo $id;?>" data-target="fname" value="Update Father Name"/>
                        </div>
                    </form>
                </div>
                <div class="fname-ajax-response"></div>
            </div>
        </p>
        <p class="s-father-occupation">
            <strong>Father's Occupation: </strong> <?php echo $parentDetails->fatherOccupation ?>
            <a class="edit-s-father-occupation" href="#">Edit</a>
            <div class="foccupation-response hidden">
                <div class="form-group">
                    <form action="#">
                        <div class="form-group">
                            <input class="form-control form-edit" type="text" id = "father-occupation" autocomplete="off" />
                            <input type="submit" class="btn btn-default update" data-id = "<?php echo $id;?>" data-target = "foccupation" value="Update Father Occupation"/>
                        </div>
                    </form>
                </div>
                <div class="foccupation-ajax-response"></div>
            </div>
        </p>
        <p class="s-father-number">
            <strong>Father's Mobile Number: </strong> <?php echo $parentDetails->fatherMobileNumber ?>
            <a class="edit-s-father-number" href="#">Edit</a>
            <div class="fnumber-response hidden">
                <div class="form-group">
                    <form action="#">
                        <div class="form-group">
                            <input class="form-control form-edit" type="text" id = "father-number" autocomplete="off" />
                            <input type="submit" class="btn btn-default update" data-id = "<?php echo $id;?>" data-target = "fnumber" value="Update Father Contact Number"/>
                        </div>
                    </form>
                </div>
                <div class="fnumber-ajax-response"></div>
            </div>
        </p>
    </div>
    <div class="mother-details col-lg-6 col-md-6">
        <p class="s-mother-name">
            <strong>Mother's Name: </strong> <?php echo $parentDetails->motherName ?>
            <a class="edit-s-mother-name" href="#">Edit</a>
            <div class="mname-response hidden">
                <div class="form-group">
                    <form action="#">
                        <div class="form-group">
                            <input class="form-control form-edit" type="text" id = "mother-name" autocomplete="off" />
                            <input type="submit" class="btn btn-default update" data-id = "<?php echo $id;?>" data-target = "mname" value="Update Mother Name"/>
                        </div>
                    </form>
                </div>
                <div class="mname-ajax-response"></div>
            </div>
        </p>
        <p class="s-mother-occupation">
            <strong>Mother's Occuopation: </strong> <?php echo $parentDetails->motherOccupation ?>
            <a class="edit-s-mother-occupation" href="#">Edit</a>
            <div class="moccupation-response hidden">
                <div class="form-group">
                    <form action="#">
                        <div class="form-group">
                            <input class="form-control form-edit" type="text" id = "mother-occupation" autocomplete="off" />
                            <input type="submit" class="btn btn-default update" data-id = "<?php echo $id;?>" data-target="moccupation" value="Update Mother Occupation"/>
                        </div>
                    </form>
                </div>
                <div class="moccupation-ajax-response"></div>
            </div>
        </p>
        <p class="s-mother-number">
            <strong>Mother's Mobbile Number: </strong> <?php echo $parentDetails->motherMobileNumber ?>
            <a class="edit-s-mother-number" href="#">Edit</a>
            <div class="mnumber-response hidden">
                <div class="form-group">
                    <form action="#">
                        <div class="form-group">
                            <input class="form-control form-edit" type="text" id = "mother-number" autocomplete="off" />
                            <input type="submit" class="btn btn-default update" data-id = "<?php echo $id;?>" data-target = "mnumber" value="Update Mother Contact Number"/>
                        </div>
                    </form>
                </div>
                <div class="mnumber-ajax-response"></div>
            </div>
        </p>
    </div>
</div>
<h3>Books Reserved: </h3>
<div class="reservedBooklist">
    <div class="book-table">
    <?php if(!empty($listOfBooks)){ ?>
        <table class="table table-striped table-bordered">
            <tr>
                <th>#</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Edition</th>
                <th>Reserved Date</th>
                <th>Return Date</th>
                <th>Action</th>
            </tr>
            <?php
                $student->printNotReturnedBooks($listOfBooks);
                echo "</table>";
            ?>
            <?php }else {
                echo '<h3 class="text-success"> No books to return </h3>';
            } ?>
            <div class="renew-response"></div>
    </div>
</div>

<script src="js/studentProfileRedirect.js"></script>
<script src="js/studentProfile.js"></script>
<script src="js/renewBook.js"></script>