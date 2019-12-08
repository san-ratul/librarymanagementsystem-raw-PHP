<?php
include_once "../_include/db/Book.php";
$book = new Book();
if(isset($_POST['bookid'])){
    $bookId = htmlspecialchars($_POST['bookid']);
    $foundBook = $book->searchReservedBooklist($bookId);
    if($foundBook){

        $reservationDetails = $book->fetchBookDetails($bookId);
?>
        <h3>Details Of Reservation: </h3>
        <div class="col-lg-6 col-md-6 book-details">
            <p><b>Book Id: </b> <?php echo $bookId; ?> </p> 
            <p><b>Book Name: </b> <?php echo $reservationDetails->bname ?> </p> 
            <p><b>Author Name: </b> <?php echo $reservationDetails->authorname ?> </p> 
            <p><b>Edition: </b> <?php echo $reservationDetails->edition ?> </p> 
            <p><b>Date of Reservation: </b> <?php echo $reservationDetails->reservationDate ?> </p> 
            <p><b>Return Date: </b> <?php echo $reservationDetails->returnDate ?> </p> 
        </div>

        <div class="col-lg-6 col-md-6 student-details">
            <p><b>Student ID: </b> <?php echo $reservationDetails->sid ?> </p> 
            <p><b>Student Name: </b> <?php echo $reservationDetails->sName ?> </p> 
            <p><b>Student Email: </b> <?php echo $reservationDetails->email ?> </p> 
            <p><b>Student Contact No: </b> <?php echo $reservationDetails->phoneNumber ?> </p> 
            <p><b>Due: </b> <?php echo $reservationDetails->due+$reservationDetails->renewDue ?> </p> 
            <p><b>Paid Amount: </b> <?php echo $reservationDetails->paidAmount ?> </p> 
        </div>
        <div class="clear"></div>
        <button class="btn btn-success btn-center btn-return-book" data-id="<?php echo $reservationDetails->id ?>" data-due="<?php echo $reservationDetails->due+$reservationDetails->renewDue ?>" data-paid = " <?php echo $reservationDetails->paidAmount ?>" data-bid="<?php echo $bookId ?>" >Return Book</button>
        <div class="reservation-response"></div>
        <script src="js/returnBook.js"></script>
<?php 
    } else{
         echo '<p class="text-danger">Book not found in reserved books list</p>'; 
    }
} 
?>