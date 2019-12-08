<?php
include "Book.php";
include_once "Session.php";
Session::init();
$id = Session::get("id");
$book = new Book();
if(isset($_POST["bookid"])){
    $bookId = $_POST["bookid"];
    $newDate = date('Y/m/d',strtotime("+7days"));
    $check = $book->renewBook($bookId,$newDate);
    if($check == 1){
        echo "<p class='text-success'> The return date is updated successfully successfully </p>";
    }else{
        echo "<p class='text-danger'> Some errors occourd please try again </p>";
    }
}

?>