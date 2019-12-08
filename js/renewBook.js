$('.btn-renew').click(function(){
    var bookID = $(this).data("target");
    $.ajax({
        type: "POST",
        url: "_include/db/student.php",
        data: "bookid="+bookID,
        success: function(data){
            $('.renew-response').html(data);
        } 
    })
}) 