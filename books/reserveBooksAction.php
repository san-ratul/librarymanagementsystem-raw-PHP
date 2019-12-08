<?php
include_once "../_include/db/Book.php";
$book = new Book();

if(isset($_POST['sid']) && isset($_POST['bid'])){
    $sid = $_POST['sid'];
    $bid = $_POST['bid'];
    $bookReserved = $book->reserveBook($sid,$bid);
    if($bookReserved == 1){
        echo '<p class="text-success">Book Reserved Succesfully</p>';
    } else {
        echo '<p class="text-danger">Something went wrong</p>';
    }
}

?>
