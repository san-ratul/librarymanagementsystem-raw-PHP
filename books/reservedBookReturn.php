<?php
include_once "../_include/db/Book.php";
if(isset($_POST['id']) && isset($_POST['due']) && isset($_POST['paid']) && isset($_POST['bid'])){
    $id = $_POST['id'];
    $due = $_POST['due'];
    $paid = $_POST['paid'];
    $bid = $_POST['bid'];
    $book = new Book();
    $result = $book->returnBook($id, $bid, $due, $paid);
    if($result > 0){
        echo '<p class="text-success"><b>Success! </b>Book returned successfully.</p>';
    }else{
        echo '<p class="text-danger"><b>Error! </b>Something went wrong.</p>';
    }
}
?>
