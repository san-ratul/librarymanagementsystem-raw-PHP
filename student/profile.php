
<?php   
  $filepath = realpath(dirname(__FILE__));
  include_once $filepath."/../_include/db/Session.php";
  include_once $filepath."/../_include/db/User.php";
  include_once $filepath."/../_include/db/studentfunction.php";
  Session::init();
  $id 	    = Session::get("id");
  $name 	= Session::get("name");
  $email 	= Session::get("email");
  $phoneNo  = Session::get("phoneNumber");
  $active   = Session::get("active");
  $user     = new User();
  $student  = new studentfunction($user);
  $parentDetails = $student->getParentDetails($id);
  $dueDetails = $student->getAllDueDetails($id);
?>

<div class="container">
    <h2 class="s-details">
        Student Details: 
    </h2>
    <h3 class="s-name">
        <?php echo $name ?>
    </h3>
    <p class="s-id">
        <strong>Student ID: </strong> <?php echo $id?> 
    </p>
    <p class="s-email">
        <strong>Student Email: </strong> <?php echo $email?> 
    </p>
    <p class="s-phoneNo">
        <strong>Student Phone Number: </strong> <?php echo $phoneNo?>
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
        <?php if(!empty($dueDetails)){ ?>
            <h2 class="due-details">
                Due Details: 
            </h2>
            <div class="due-table-container">
            <table class="table table-striped table-bordered due-table">
                <tr>
                    <th>Book ID</th>
                    <th>Book Name</th>
                    <th>Author Name</th>
                    <th>Edition</th>
                    <th>Due</th>
                    <th>Paid Amount</th>
                </tr>
            <?php 
                $totalDue = 0;
                $totalPaid = 0;
                foreach($dueDetails as $due){ 
                    $totalDue += $due->due+$due->renewDue;
                    $totalPaid += $due->paidAmount;
            ?>
                <tr>
                    <td><?php echo $due->bid ?></td>
                    <td><?php echo $due->bname ?></td>
                    <td><?php echo $due->authorname ?></td>
                    <td><?php echo $due->edition ?></td>
                    <td><?php echo $due->due+$due->renewDue ?></td>
                    <td><?php echo $due->paidAmount ?></td>
                </tr>
            <?php } ?>
                <tr>
                    <td colspan = "4"><b>Total</b></td>
                    <td> <?php echo $totalDue ?></td>
                    <td> <?php echo $totalPaid ?></td>
                </tr>
            </table>
        <?php } ?>
        </div>
    </div>
    
</div>



<script src = "js/studentProfile.js"></script>