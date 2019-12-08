$("#bookname").on("keyup",function(){
    searchString = $(this).val();
    if(searchString != ''){
        $.ajax({
        type: "POST",
        url: "_include/db/searchBookName.php",
        data: "searchString="+searchString,
        success: function(data){
            $(".suggestion").show();
            $(".suggestion").html(data);
        },
        complete: function(){
            $(".suggestion li").click(function(){
                bookname = $(this).html();
                $("#bookname").val(bookname);
                $(".suggestion").html('');
            });
        }
        })
    } else{
        $(".suggestion").html('');
    }
})
$("#bookname").blur(function(){
    $(".suggestion").fadeOut(100);
})


$(".btn-search-book").click(function(event){
    event.preventDefault();
    var bookname = $("#bookname").val();
    if(bookname == ""){
        
    } else{
        $.ajax({

            type: "POST",
            url: "_include/db/searchBook.php",
            data: "searchBook="+bookname,
            success: function(data){
                $(".student-content").html(data);
            }
    
        })
    }
    
})