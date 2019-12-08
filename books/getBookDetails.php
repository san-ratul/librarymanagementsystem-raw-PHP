<?php 
    include_once "../_include/db/Book.php";
    $book = new Book();

    if( isset($_POST['bookId'])){
        $bookId = $_POST['bookId'];
        $bookDetails = $book->getBook($bookId);

        if(!empty($bookDetails)){
            if($bookDetails->reserved == 1){
                $available = 'Not Available';
            } else{
                $available = 'Available';?>
                <script>$('.btn-reserve-book').attr('data-bid', '<?php echo $bookDetails->bid; ?>');</script>
<?php
            }
?>
        <p><b>Book ID: </b> <span class="bookId"><?php echo $bookDetails->bid; ?></span></p>
        <p><b>Book Name: </b> <?php echo $bookDetails->bname; ?> </p>
        <p><b>Author Name: </b> <?php echo $bookDetails->authorname; ?> </p>
        <p><b>Edition: </b> <?php echo $bookDetails->edition; ?> </p>
        <p><b>Price: </b> <?php echo $bookDetails->price; ?> Taka </p>
        <p><b>Availability: </b> <span class="available" data-available ='<?php echo $bookDetails->reserved; ?> '></span><?php echo $available; ?></p>
<?php
        } else{
            echo '<p class="text-danger" > Book not found!</p>';
        }
   }

?>