<?php
    include "Book.php";
    $book = new Book();

    if(isset($_POST["searchString"])){
        $searchString = $_POST["searchString"];
        $searchResults = $book->searchBookName($searchString);
        foreach($searchResults as $searchResult){
            echo "<li>",$searchResult->bname,"</li>";
        }
    }
?>