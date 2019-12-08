<?php 
	include_once "Session.php";
	include_once "Database.php";
	class User
	{
		private $db;

		function __construct()
		{
			$this->db = new Database();
		}

		function getdb(){
			return $this->db;
		}
		public function registration_check($ID, $Name, $Email, $spassword,$cpassword, $phoneNumber)
		{
			if($ID == '' OR $Name == '' OR $Email == ''OR $spassword == '' OR $cpassword == '' OR $phoneNumber == ''){

				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Fields must not be empty!</div>';
				return $msg;
			}



			if(strlen($spassword)<4){
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Password should not be less than 4 letters!</div>';
				return $msg;
			}else if(strlen($spassword)>20){
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Password should not be more than 20 letters!</div>';
				return $msg;
			} else if(strcmp($spassword,$cpassword)!=0){
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Passwords did not matched!</div>';
				return $msg;
			} 

			if(filter_var($Email,FILTER_VALIDATE_EMAIL) === false){
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>The email address is not valid!</div>';
				return $msg;
			}

		}
		//Checking for email in database if exist return true else return false
		public function emailCheck($tableName,$email)
		{
			$sql = 'SELECT email FROM '.$tableName.' WHERE email = :email';
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':email',$email);
			$query->execute();
			if($query->rowCount() > 0){
				return true;
			} else{
				return false;
			}
		}

		public function IDCheck($tableName,$ID)
		{
			if(strcmp($tableName,'student')==0){
				$chkID = 'sid';
			} else if(strcmp($tableName,'admin')==0){
				$chkID = 'aid';
			}

			$sql = 'SELECT '.$chkID.' FROM '.$tableName.' WHERE '.$chkID.'= :id';
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id',$ID);
			$query->execute();
			if($query->rowCount()>0){
				return true;			
			} else {
				return false;
			}
		}

		public function activeCheck($ID)
		{
			$chkID = 'sid';
			$sql = 'SELECT '.$chkID.' FROM student WHERE '.$chkID.'= :id AND active = 1';
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id',$ID);
			$query->execute();
			if($query->rowCount()>0){
				return true;			
			} else {
				return false;
			}
		}
		//student registration macanism.
		public function student_registration($data)
		{
			$studentID = $data['studentID'];
			$studentName = $data['studentName'];
			$studentEmail = $data['studentEmail'];
			$spassword = $data['spassword'];
			$cpassword = $data['cpassword'];
			$phoneNumber = $data['phoneNumber'];
			$chk_email = $this->emailCheck('student',$studentEmail);
			$chk_sid = $this->IDCheck('student',$studentID);

			 //check empty fields

			/*
			if(preg_match('/[^a-zA-Z]/i', subject)){
				$msg = '<div class="alert alert-danger"><strong>ERROR!</strong>Name must contain only letters and space or dot!</div>';
				return $msg;
			} 
			*/
			$reg_check = $this->registration_check($studentID, $studentName, $studentEmail, $spassword,$cpassword, $phoneNumber);
			if(isset($reg_check)){
				return $reg_check;
			}
			$password = md5($spassword);

			if($chk_sid === true){
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Student already registered!</div>';
				return $msg;
			}
			//email exists or not
			if($chk_email === true){
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Email already exist!</div>';
				return $msg;
			} 

			$sql = 'INSERT INTO student (sid,sName,email,password,phoneNumber) VALUES(:sid,:sName,:email,:password,:phoneNumber)';
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':sid',$studentID);
			$query->bindValue(':sName',$studentName);
			$query->bindValue(':email',$studentEmail);
			$query->bindValue(':password',$password);
			$query->bindValue(':phoneNumber',$phoneNumber);
			$result1 = $query->execute();

			$sql = 'INSERT INTO parentdetails (pid) VALUES(:sid)';
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':sid',$studentID);
			$result2 = $query->execute();
			if($result1 && $result2){
				$msg = '<div class="alert alert-success"><strong>SUCCESS! </strong>You are successfully registered! Please wait till activation of your account.</div>';
				return $msg;
			} else{
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Sorry something went wrong! Please contact admin <strong>as soon as possible</strong></div>';
				return $msg;
			}
		}

		public function admin_registration($data)
		{
			$adminID = $data['adminID'];
			$adminName = $data['adminName'];
			$adminEmail = $data['adminEmail'];
			$spassword = $data['spassword'];
			$cpassword = $data['cpassword'];
			$phoneNumber = $data['phoneNumber'];
			$chk_email = $this->emailCheck('admin',$adminEmail);
			$chk_aid = $this->IDCheck('admin',$adminID);

			$reg_check = $this->registration_check($adminID, $adminName, $adminEmail, $spassword,$cpassword, $phoneNumber);
			if(isset($reg_check)){
				return $reg_check;
			}
			$password = md5($spassword);
			if($chk_aid === true){
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Admin already registered!</div>';
				return $msg;
			} 
			//email exists or not
			if($chk_email === true){
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Email already exist!</div>';
				return $msg;
			}
			$sql = 'INSERT INTO admin (aid,aName,email,password,phoneNumber) VALUES (:aid,:aName,:email,:password,:phoneNumber)';
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue('aid',$adminID);
			$query->bindValue('aName',$adminName);
			$query->bindValue('email',$adminEmail);
			$query->bindValue('password',$password);
			$query->bindValue('phoneNumber',$phoneNumber);
			$result = $query->execute();

			if($result){
				$msg = '<div class="alert alert-success"><strong>SUCCESS! </strong>You are successfully registered!</div>';
				return $msg;
			} else{
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Sorry something went wrong! Please contact admin <strong>as soon as possible</strong></div>';
				return $msg;
			}
		}
		public function loginCheck($ID, $password)
		{
			if($ID == '' OR $password == ''){

				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Fields must not be empty!</div>';
				return $msg;
			}
			if(strlen($ID)<4){
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Login ID should not be less than 4 letters!</div>';
				return $msg;
			}else if(strlen($ID)>20){
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Login ID should not be more than 20 letters!</div>';
				return $msg;
			}
			if(strlen($password)<4){
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Password should not be less than 4 letters!</div>';
				return $msg;
			}else if(strlen($password)>20){
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong>Password should not be more than 10 letters!</div>';
				return $msg;
			}
		}
		public function login($tableName,$ID,$password)
		{
			$columnName = '';
			if($tableName == 'student'){
				$columnName = 'sid';
			} else if($tableName == 'admin'){
				$columnName = 'aid';
			}
			$sql = 'SELECT * FROM '.$tableName.' WHERE '.$columnName.' = :id AND password = :password';
			$query = $this->db->pdo->prepare($sql);
			$query->bindValue(':id',$ID);
			$query->bindValue(':password',$password);
			$query->execute();
			$result = $query->fetch(PDO::FETCH_OBJ);
			return $result;
		}
		public function studentLogin($data)
		{
			$studentID = $data['studentID'];
			$spassword = $data['spassword'];
			$chkLogin = $this->loginCheck($studentID,$spassword);
			if(isset($chkLogin)){
				return $chkLogin;
			}
			$spassword = md5($spassword);
			$idChk = $this->IDCheck("student",$studentID);
			if($idChk){
				if($activeChk = $this->activeCheck($studentID)){
					$result = $this->login('student',$studentID,$spassword);
						if($result){
						Session::init();
						Session::set("login",true);
						Session::set("type","student");
						Session::set("id",$result->sid);
						Session::set("name",$result->sName);
						Session::set("email",$result->email);
						Session::set("phoneNumber",$result->phoneNumber);
						Session::set("due",$result->due);
						Session::set("active",$result->active);
						Session::set("msg",'<div class="alert alert-success alert-custom"><strong>SUCCESS! </strong>You are successfully Logged In!</div>');
						header("Location: index.php");
					} else{
						$msg = '<div class="alert alert-danger"><strong>ERROR! </strong> Invalid Password!</div>';
					}
				} else{
					$msg = '<div class="alert alert-danger"><strong>ERROR! </strong> Id not active!</div>';
				}
				
			} else {
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong> Id not registered!</div>';
			}
			
			return $msg;
		}

		public function adminLogin($data)
		{
			$adminID = $data['adminID'];
			$apassword = $data['apassword'];
			$chkLogin = $this->loginCheck($adminID,$apassword);
			
			if(isset($chkLogin)){
				return $chkLogin;
			}
			$apassword = md5($apassword);
			$idChk = $this->IDCheck("admin",$adminID);
			if($idChk){
				$result = $this->login('admin',$adminID,$apassword);
					if($result){
					Session::init();
					Session::set("login",true);
					Session::set("type","admin");
					Session::set("id",$result->aid);
					Session::set("name",$result->aName);
					Session::set("email",$result->email);
					Session::set("phoneNumber",$result->phoneNumber);
					Session::set("msg",'<div class="alert alert-success alert-custom"><strong>SUCCESS! </strong>You are successfully Logged In!</div>');
					header("Location: index.php");
				} else{
					$msg = '<div class="alert alert-danger"><strong>ERROR! </strong> Invalid Password!</div>';
				}
			} else {
				$msg = '<div class="alert alert-danger"><strong>ERROR! </strong> Id not registered!</div>';
			}
			
			return $msg;
		}

		public function getReservedBooksID(){
			$sql = 'SELECT id,bookId,returnDate,paidAmount,due,renewBook FROM reservedbooks WHERE returnedBook = 0';
			$query = $this->db->pdo->prepare($sql);
			$query ->execute();
			$result = $query->fetchAll(PDO::FETCH_OBJ);
			return $result;
		}
		public function getBorrowerID(){
			$sql = 'SELECT DISTINCT(studentId) FROM reservedbooks WHERE returnedBook = 0';
			$query = $this->db->pdo->prepare($sql);
			$query ->execute();
			$result = $query->fetchAll(PDO::FETCH_OBJ);
			return $result;
		}

		public function setReservedBooksdue($books){
			foreach($books as $book){
				$diff = strtotime("today midnight") - strtotime($book->returnDate);
				$res = round($diff / (24*60*60));
				if($res > 0){
					$due = $res*20;
					if($book->renewBook == 1){
						$sql = "UPDATE reservedbooks SET renewDue = $due WHERE id = $book->id";
					} else{
						$sql = "UPDATE reservedbooks SET due = $due WHERE id = $book->id";	
					}
					$query = $this->db->pdo->prepare($sql);
					$query->execute();
				}
			}
			
		}

		public function calcTotalDuePerID(){
			$sql = "SELECT studentId , SUM(due) as totalDue, SUM(renewDue) as rTotalDue, SUM(paidAmount) as paidAmount FROM reservedbooks GROUP BY studentId";
			$query = $this->db->pdo->prepare($sql);
			$query->execute();
			$result = $query->fetchALL(PDO::FETCH_OBJ);
			return $result;
		}

		public function setDue(){
			$books = $this->getReservedBooksID();
			$students = $this->getBorrowerID();
			$this->setReservedBooksdue($books);
			$totalDue = $this->calcTotalDuePerID();
			foreach($totalDue as $due){
				$sql = "UPDATE student SET `due` = :due WHERE `sid` = :sid ";
				$query = $this->db->pdo->prepare($sql);
				$query->bindValue(':due', ($due->totalDue + $due->rTotalDue - $due->paidAmount));
				$query->bindValue(':sid', $due->studentId);
				$query->execute();
			}
		}
		
	}
	
?>