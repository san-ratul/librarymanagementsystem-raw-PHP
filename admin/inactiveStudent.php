<?php  
include_once "../_include/db/User.php";
include_once "../_include/db/studentfunction.php";

$user = new User();
$student = new studentfunction($user);
$pendingStudents = $student->getPendingStudents();
$nonActive = $student->countNonActive();
?>
<h3 class="text-success text-center" > Pending Students </h3>
<div class="inactive-response response-style"></div>
<?php
    if(empty($pendingStudents)){
       echo '<h3 class="text-success text-center" > No Pending Students </h3>';
    } else{
    ?>
        <table class="table table-striped table-bordered">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Action</th>
            </tr>
        <?php
        foreach($pendingStudents as $student){ ?>
            <tr>
                <td>
                    <?php echo $student->sid; ?>
                </td>
                <td>
                <?php    echo "<a href='profile?id=",$student->sid,"' class='student-profile-link' data-id = ",$student->sid,">",$student->sName ,"</a>"; ?>
                </td>
                <td>
                    <?php echo $student->email; ?>
                </td>
                <td>
                    <div class="div-center">
                    <button class="btn btn-success active-account" <?php echo 'data-target="',$student->sid,'"data-status="',$student->active,'"'; ?> >Active Account</button>
                    <button class="btn btn-danger delete-account"<?php echo 'data-target="',$student->sid,'"data-status="',$student->active,'"'; ?> >Delete Account</button>
                    </div>
                </td>
            </tr>
        <?php
        }
        echo '</table>';
    }
?>

<script src="js/studentProfileRedirect.js"></script>
<script src="js/studentProfile.js"></script>
<script>
    $('.student-request').html(<?php echo $nonActive->nonActive; ?>);
</script>