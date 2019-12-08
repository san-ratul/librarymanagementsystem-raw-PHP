<?php 
	include_once "_include/db/User.php";
	include_once "_include/db/studentfunction.php";
	$id 	= Session::get("id");
	$name 	= Session::get("name");
	$email 	= Session::get("email");
	$active = Session::get("active");

	$user = new User();
	$student = new studentfunction($user);
	$student->updateDue($id);
	$due 	= Session::get("due");
	
	if($due > 0){
		$dueClass = "due-red";
	} else{
		$dueClass = "due-green";
	}
?>

<div class="container-fluid">
	<div class="row">
		<div class="col-lg-3 col-md-4 student-info">
			<div class="student-profile">
				<i class="fa fa-user-circle user" aria-hidden="true"></i>
				<a  class="student-name" href="profile?id=<?php echo $id ?>">
					<h3>
						<?php echo $name; ?>
					</h3>
				</a>
				<span class="student-email">
					<?php echo $email; ?>
				</span>
				<br>
				<span class="<?php echo $dueClass; ?>">
					Total Due: <?php echo $due; ?> Taka
				</span>
			</div>
		</div>
		<div class="col-lg-9 col-md-4">
			<div class="student-content">
				<?php include "student/home.php"?>
			</div>
		</div>
	</div>
</div>