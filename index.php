<?php 
    include_once "_include/header.php";
    Session::loggedOut();
?>

<?php 
		
	$loginmsg = Session::get('msg');
	if(isset($loginmsg)){
		echo $loginmsg;
	}
	Session::set("msg", NULL);

	$type = Session::get('type');
	if(isset($type)){
		if($type == "admin"){
			include_once "admin-content.php";
		} else if($type == "student"){
			include_once "student-content.php";
		} else{
			echo "Unknown Type";
		}
	} else {
		echo "Some problem occured!";
	}
?>



<?php include_once "_include/footer.php" ?>