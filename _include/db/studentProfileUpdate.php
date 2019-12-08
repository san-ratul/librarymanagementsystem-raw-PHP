<?php
include_once "User.php";
include_once "studentfunction.php";
$user     = new User();
$student  = new studentfunction($user);
$id = $_POST['id'];
$parentDetails = $student->getParentDetails($id); 
$studentDetails = $student->getStudent($id); 
$existingPhone = $studentDetails->phoneNumber;


if(isset($_POST["phone"])){
    $phoneNumber = $_POST["phone"];
    if(strcmp($phoneNumber,$existingPhone) == 0){
        echo "<p class='text-info'>The number is already in the record!</p>";
    } else if(strlen($phoneNumber)<10 || strlen($phoneNumber)>19){
        echo "<p class='text-danger'> Not a valid number </p>";
    } else if(preg_match("/[a-z]/i",$phoneNumber)){
        echo "<p class='text-danger'> Not a valid number </p>";
    }else{
        $check = $student->updatePhone($id,$phoneNumber);
        if($check == 1){
            Session::set("phoneNumber", $phoneNumber);
            echo "<p class='text-success'> The phone number updated successfully </p>";
        }else{
            echo "<p class='text-danger'> Some errors occourd please try again </p>";
        }
    }
}

if(isset($_POST["email"])){
    $email = $_POST["email"];
    if(strcmp($email,$studentDetails->email) == 0){
        echo "<p class='text-info'>The email is already in the record!</p>";
    } else if(strlen($email)<10 || strlen($email)>255){
        echo "<p class='text-danger'> Not a valid number </p>";
    }else if(filter_var($email,FILTER_VALIDATE_EMAIL) === false){
        echo '<p class="text-danger">The email address is not valid!</p>';
    }else{
        $check = $student->updateEmail($id,$email);
        if($check == 1){
            echo "<p class='text-success'> The Email updated successfully </p>";
        }else{
            echo "<p class='text-danger'> Some errors occourd please try again </p>";
        }
    }
}

//update father details
if(isset($_POST["fname"])){
    $fname = trim($_POST["fname"]);
    if(strcmp(mb_strtolower($parentDetails->fatherName),mb_strtolower($fname)) == 0){
        echo "<p class='text-info'>The name is already in the record!</p>";
    } else if(strlen($fname)<5){
        echo "<p class='text-danger'>Father Name too much <strong>small!</strong></p>";
    } else if( strlen($fname)>100){
        echo "<p class='text-danger'>Father Name too much <strong>big!</strong></p>";
    } else if(preg_match("/[0-9]/i",$fname)){
        echo "<p class='text-danger'> Father Name cannot contain numbers! </p>";
    } else{
        $check = $student->updateParentDetails($id, $fname,"fatherName");
        if($check == 1){
            echo "<p class='text-success'> Father Name updated successfully </p>";
        }else{
            echo "<p class='text-danger'> Some errors occourd please try again </p>";
        }
    }
}

if(isset($_POST["foccupation"])){
    $foccupation = trim($_POST["foccupation"]);
    if(strcmp(mb_strtolower($parentDetails->fatherOccupation),mb_strtolower($foccupation)) == 0){
        echo "<p class='text-info'>You entered the same Occupation!</p>";
    } else if(strlen($foccupation)<4){
        echo "<p class='text-danger'><strong>Error: </strong>Very short input</p>";
    } else if( strlen($foccupation)>29){
        echo "<p class='text-danger'><strong>Error: </strong> Very long input</p>";
    } else if(preg_match("/[0-9]/i",$foccupation)){
        echo "<p class='text-danger'> Occupation cannot contain numbers! </p>";
    } else{
        $check = $student->updateParentDetails($id, $foccupation,"fatherOccupation");
        if($check == 1){
            echo "<p class='text-success'> Occupation updated successfully </p>";
        }else{
            echo "<p class='text-danger'> Some errors occourd please try again </p>";
        }
    }
}

if(isset($_POST["fnumber"])){
    $fnumber = trim($_POST["fnumber"]);
    if(strcmp(mb_strtolower($parentDetails->fatherMobileNumber),mb_strtolower($fnumber)) == 0){
        echo "<p class='text-info'>Number in database already!</p>";
    } else if(strlen($fnumber)<10){
        echo "<p class='text-danger'><strong>Error: </strong>Very short input</p>";
    } else if( strlen($fnumber)>19){
        echo "<p class='text-danger'><strong>Error: </strong> Very long input</p>";
    } else if(preg_match("/[a-z]/i",$fnumber)){
        echo "<p class='text-danger'> Number cannot contain letters! </p>";
    } else{
        $check = $student->updateParentDetails($id, $fnumber,"fatherMobileNumber");
        if($check == 1){
            echo "<p class='text-success'> Number updated successfully </p>";
        }else{
            echo "<p class='text-danger'> Some errors occourd please try again </p>";
        }
    }
}

//update Mother details
if(isset($_POST["mname"])){
    $mname = trim($_POST["mname"]);
    if(strcmp(mb_strtolower($parentDetails->motherName),mb_strtolower($mname)) == 0){
        echo "<p class='text-info'>The name is already in the record!</p>";
    } else if(strlen($mname)<5){
        echo "<p class='text-danger'>Mother Name too much <strong>small!</strong></p>";
    } else if( strlen($mname)>100){
        echo "<p class='text-danger'>Mother Name too much <strong>big!</strong></p>";
    } else if(preg_match("/[0-9]/i",$mname)){
        echo "<p class='text-danger'> Mother Name cannot contain numbers! </p>";
    } else{
        $check = $student->updateParentDetails($id, $mname,"motherName");
        if($check == 1){
            echo "<p class='text-success'> Mother Name updated successfully </p>";
        }else{
            echo "<p class='text-danger'> Some errors occourd please try again </p>";
        }
    }
}

if(isset($_POST["moccupation"])){
    $moccupation = trim($_POST["moccupation"]);
    if(strcmp(mb_strtolower($parentDetails->motherOccupation),mb_strtolower($moccupation)) == 0){
        echo "<p class='text-info'>You entered the same Occupation!</p>";
    } else if(strlen($moccupation)<4){
        echo "<p class='text-danger'><strong>Error: </strong>Very short input</p>";
    } else if( strlen($moccupation)>29){
        echo "<p class='text-danger'><strong>Error: </strong> Very long input</p>";
    } else if(preg_match("/[0-9]/i",$moccupation)){
        echo "<p class='text-danger'> Occupation cannot contain numbers! </p>";
    } else{
        $check = $student->updateParentDetails($id, $moccupation,"motherOccupation");
        if($check == 1){
            echo "<p class='text-success'> Occupation updated successfully </p>";
        }else{
            echo "<p class='text-danger'> Some errors occourd please try again </p>";
        }
    }
}

if(isset($_POST["mnumber"])){
    $mnumber = trim($_POST["mnumber"]);
    if(strcmp(mb_strtolower($parentDetails->motherMobileNumber),mb_strtolower($mnumber)) == 0){
        echo "<p class='text-info'>Number in database already!</p>";
    } else if(strlen($mnumber)<10){
        echo "<p class='text-danger'><strong>Error: </strong>Very short input</p>";
    } else if( strlen($mnumber)>19){
        echo "<p class='text-danger'><strong>Error: </strong> Very long input</p>";
    } else if(preg_match("/[a-z]/i",$mnumber)){
        echo "<p class='text-danger'> Number cannot contain letters! </p>";
    } else{
        $check = $student->updateParentDetails($id, $mnumber,"motherMobileNumber");
        if($check == 1){
            echo "<p class='text-success'> Number updated successfully </p>";
        }else{
            echo "<p class='text-danger'> Some errors occourd please try again </p>";
        }
    }
}


?>