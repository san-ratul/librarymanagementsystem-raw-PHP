<?php
include_once "../_include/db/User.php";
include_once "../_include/db/studentfunction.php";

$user = new User();
$student = new studentfunction($user);

$AllStudents = $student->getAllStudent();
$noOfBooksReserved = $student->getNoOfBooksReserved();
?>

<div class="all-student-list">
    <?php $student->printAllStudent($AllStudents,$noOfBooksReserved); ?>
</div>

<script src="js/studentProfileRedirect.js"></script>