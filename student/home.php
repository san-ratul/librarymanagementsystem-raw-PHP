<?php
$noOfBooks = $student->countBooks($id);
$bookList = $student->listBooksToReturn($id);
?>
<div class="container student-home-header">
    <h2 class="center">Welcome <strong> <?php echo $name ?> </strong></h2>
    <h3 class="center">You have total <strong><?php echo $noOfBooks; ?></strong> books to return.</h3> 
</div>
<div class="reservedBooklist">
    <div class="book-table">
        <table class="table table-striped table-bordered">
            <tr>
                <th>#</th>
                <th>Book Name</th>
                <th>Author Name</th>
                <th>Edition</th>
                <th>Reserved Date</th>
                <th>Return Date</th>
                <th>Action</th>
            </tr>
            <?php if(!empty($bookList)){
                $student->printNotReturnedBooks($bookList);
                echo "</table>";
            ?>
            <?php }else {
                echo "</table>";
                echo '<h3 class="text-success"> You have no books to return </h3>';
            } ?>
            <div class="renew-response"></div>
    </div>
</div>
<script src="js/renewBook.js"></script>
