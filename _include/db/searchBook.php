<?php
    include "Book.php";
    $book = new Book();

    if(isset($_POST["searchBook"])){
        $searchBook = $_POST["searchBook"];
        $checkBook = $book->searchBook($searchBook);
    }
?>

<div class="booklist">
    <h1 class="blist-header">Your Search Results</h1>
    <div class="search-book pull-right">
        <form class="form-inline form-search-book">
            <div class="form-group">
                <input type="text" class="form-control" id="bookname" placeholder="Enter book name to search" autocomplete = "off">
            </div>
            <button type="submit" class="btn btn-default btn-search-book">Search Book</button>
            <div class="suggestion"></div>
        </form>
    </div>
    <div class="book-table">
        <table class="table table-striped table-bordered">
            <tr>
                <th>#</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Edition</th>
                <th>Total Copies</th>
                <th>Available Copies</th>
            </tr>
            <?php 
                if($checkBook == 1){
                    $book->readySearchedBooks(); 
                    echo '</table>';
                } else{
                   echo '</table>';
                   echo ' <div class="danger center"> Your searched book <strong>',$searchBook,'</strong> is not available in our Library! <br/> You can request to <strong> Admin </strong> for adding the book in our library </div>';
                }
            ?>
    </div>
</div>
<script src="js/searchBook.js"></script>