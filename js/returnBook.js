$(".btn-get-return-book").click(function(e){
    e.preventDefault();
    bookid = $("#bookId").val();
    if(bookid == ''){
        $(".reservation-details").html("<p class='text-danger'>Field must not be Empty</p>");
    }else if(bookid.length > 10){
        $(".reservation-details").html("<p class='text-danger'>Book Id must not be more than 10 digits</p>");
    } else{
        $.ajax({
            type: "POST",
            url: "books/reservedBookDetails.php",
            data: "bookid="+bookid,
            success: function(data){
                $(".reservation-details").html(data);
            }
        })
    }
})

$(".btn-return-book").click(function(e){
    e.preventDefault();
   id = $(this).data("id");
   due = $(this).data("due");
   paid = $(this).data("paid");
   bid = $(this).data("bid");
   conf = confirm("Do you want to cancel the reservation?");
   if(conf){
        $.ajax({
            type: "POST",
            url: "books/reservedBookReturn.php",
            data: "id="+id+"&"+"due="+due+"&"+"paid="+paid+"&"+"bid="+bid,
            success: function(data){
                $(".reservation-response").html(data);
            }
        })
   }
})