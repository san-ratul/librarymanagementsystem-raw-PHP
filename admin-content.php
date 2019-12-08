<?php 
	include_once "_include/db/User.php";
	include_once "_include/db/studentfunction.php";

	$name = Session::get("name");
	$email = Session::get("email");
	$phoneNumber = Session::get("phoneNumber");

	$user = new User();
	$student = new studentfunction($user);
	$nonActive = $student->countNonActive();
	$SWD = $student->countStudentWithDue();
?>
<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 col-md-4 admin-sidebar">
			<div class="admin-details">
				<i class="fa fa-user-circle admin-avatar" aria-hidden="true"></i>
				<h3 class="text-center admin-name"> <?php echo $name; ?> </h3>
				<p class="admin-email text-center"> <?php echo $email; ?></p>
			</div>
			<div class="sub-nav">
				<ul class="sub-menu">
					<li><a class="all-student" href="#">All Students</a></li>
					<li>
						<a class="student-req" href="#">Pending Aprovals
							<?php
							if($nonActive->nonActive > 0){
								echo '<span class="badge badge-danger student-request pull-right">',$nonActive->nonActive,'</span>';  
							}
							?>
						</a>
					</li>
					<li>
						<a href="#" class="due-list">Due List
							<?php
							if($SWD->SWD > 0){
								echo '<span class="badge badge-success due-list pull-right">',$SWD->SWD,'</span>';  
							}
							?>
						</a>
					</li>
					<li><a class="cancel-reservation" href="#">Cancel Reservation</a></li>
				</ul>
			</div>
		</div>
		<div class="col-lg-9 col-md-4">
			<div class="admin-content">
			</div>
		</div>
	</div>
</div>