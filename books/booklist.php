<?php
    include_once "../_include/db/Session.php";
    include "../_include/db/Book.php";
    Session::init(); 
    $book = new Book();
    
?>

<div class="booklist">
    <h1 class="blist-header">Elibrary Available Books List</h1>
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
            <?php $res = $book->showTable(); ?>
        
        </table>
    </div>
</div>
<!-- jQuery code for search -->
<script src="js/searchBook.js"></script>