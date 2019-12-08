$('.btn-get-student').click(function(e){
    e.preventDefault();
    studentId = $('#studentId').val();
    if(studentId == ''){
        $('.student-details').html('<p class="text-danger">Student ID cannot be empty</p>');
    } else if(studentId.length > 20){
        $('.student-details').html('<p class="text-danger">Student ID cannot be more than 20 letters</p>');
    } else{
        $.ajax({
            type: 'POST',
            url: 'student/getStudentDetails.php',
            data: 'studentId='+studentId,
            success: function(data){
                $('.student-details').html(data);
            }
        });
    }
});

$('.btn-get-book').click(function(e){
    e.preventDefault();
    bookId = $('#bookId').val();
    if(bookId == ''){
        $('.book-details').html('<p class="text-danger">Book ID cannot be empty</p>');
    } else if(bookId.length > 15){
        $('.book-details').html('<p class="text-danger">Book ID cannot be more than 15 letters</p>');
    } else{
        $.ajax({
            type: 'POST',
            url: 'books/getBookDetails.php',
            data: 'bookId='+bookId,
            success: function(data){
                $('.book-details').html(data);
            }
        });
    }
});

$('.btn-reserve-book').click(function(){
    sid = $('.studentId').html();
    bid = $('.bookId').html();
    due = $('.due').html();
    available = $('.available').data('available');
    if(sid && bid){
        if(due > 0){
            $(".reserve-book-response").html('<p class="text-danger">This student has to pay the due first!</p>');
        } else if(available == 1){
            $(".reserve-book-response").html('<p class="text-danger">This book is already reserved!</p>');
        }else{
            $(this).attr('disabled','disabled');
            $.ajax({
                type: 'POST',
                url: 'books/reserveBooksAction.php',
                data: 'sid='+sid+'&'+'bid='+bid,
                success: function(data){
                    $('.reserve-book-response').html(data);
                }
            });
        }
    } else{
        if(sid){
            $(".reserve-book-response").html('<p class="text-danger">Please choose a book!</p>');
        } else if(bid){
            $(".reserve-book-response").html('<p class="text-danger">Please choose a student!</p>');
        } else{
            $(".reserve-book-response").html('<p class="text-danger">Fields must not be empty</p>');
        }
    }
})