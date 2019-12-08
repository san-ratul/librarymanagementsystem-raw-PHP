
$(".edit-s-email").click( function(e){
    e.preventDefault();
    $(".email-response").toggleClass("hidden");
})
$(".edit-s-phone-number").click( function(e){
    e.preventDefault();
    $(".phone-response").toggleClass("hidden");
})

$(".edit-s-father-name").click( function(e){
    e.preventDefault();
    $(".fname-response").toggleClass("hidden");
})

$(".edit-s-father-number").click( function(e){
    e.preventDefault();
    $(".fnumber-response").toggleClass("hidden");
})

$(".edit-s-father-occupation").click( function(e){
    e.preventDefault();
    $(".foccupation-response").toggleClass("hidden");
})

$(".edit-s-mother-name").click( function(e){
    e.preventDefault();
    $(".mname-response").toggleClass("hidden");
})

$(".edit-s-mother-occupation").click( function(e){
    e.preventDefault();
    $(".moccupation-response").toggleClass("hidden");
})

$(".edit-s-mother-number").click( function(e){
    e.preventDefault();
    $(".mnumber-response").toggleClass("hidden");
})

$(".update").click(function(e){
    e.preventDefault();
    var indexVal = $(this).data("target");
    var id = $(this).data("id")
    var data;
    if(indexVal == "email"){
        data = $("#email").val();
    }else if(indexVal == "phone"){
        data = $("#phone-number").val();
    }else if(indexVal == "fname"){
        data = $("#father-name").val();
    }else if(indexVal == "foccupation"){
        data = $("#father-occupation").val();
    }else if(indexVal == "fnumber"){
        data = $("#father-number").val();
    }else if(indexVal == "mname"){
        data = $("#mother-name").val();
    }else if(indexVal == "moccupation"){
        data = $("#mother-occupation").val();
    }else if(indexVal == "mnumber"){
        data = $("#mother-number").val();
    }else{
        alert("error");
    }
    if(data != ""){
        $.ajax({
            type: "POST",
            url:  "_include/db/studentProfileUpdate.php",
            data: "id="+id+"&"+indexVal+"="+data,
            success: function(data){
                $("."+indexVal+"-ajax-response").html(data);
            }
        })
    } else{
        $("."+indexVal+"-ajax-response").html("<p class='text-danger'> Field cannot be empty </p>");
    }
})