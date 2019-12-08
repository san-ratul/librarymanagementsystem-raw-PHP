<?php 
	include_once "../_include/db/User.php";
    include_once "../_include/db/studentfunction.php";
    
    $user = new User();
	$student = new studentfunction($user);
	$SWD = $student->countStudentWithDue();
    $studentsWithDue = $student->getDetailsOfDue();

?>

<h3 class="text-center text-custom">Students With Due</h3>
<p class="text-center">Total <?php echo $SWD->SWD ?> Students Found </p>
<?php if($SWD->SWD > 0) {?>
<table class="table table-striped table-bordered">
    <tr>
        <th>Student ID</th>
        <th>Student Name</th>
        <th>Due</th>
        <th>Action</th>
    </tr>
    <?php foreach($studentsWithDue as $student){ ?>
    <tr>
        <td><?php echo $student->sid; ?></td>
        <td><?php echo $student->sname; ?></td>
        <td><?php echo $student->due; ?></td>
        <td><button data-toggle="modal" data-target="#student-due-details" data-sid ="<?php echo $student->sid; ?>" class="btn btn-warning btn-show-due-details">Details</button></td>
    </tr>
    <?php } ?>
</table>
<?php } ?>
<!-- Modal -->
<div class="modal fade" id="student-due-details" tabindex="-1" role="dialog" aria-labelledby="student-due-details" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
        <div class="modal-header">
            <h4 class="modal-title" id="student-due-details-title"></h4>
            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            </button>
        </div>
        <div class="modal-body student-details-table">
            
        </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>


<script src="js/dueHandler.js"></script>
