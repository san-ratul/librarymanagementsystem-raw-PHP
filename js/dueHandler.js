$(".btn-show-due-details").click(function(){
    sid = $(this).data("sid");
    $("#student-due-details-title").html("Due Details for "+sid);
    $.ajax({
        type: "POST",
        url: "_include/db/dueDetails.php",
        data: "sid="+sid,
        success: function(data){
           $(".student-details-table").html(data);
        }

    })
})
$(".btn-paid").click(function(e){
    e.preventDefault();
    targetClass = $(this).data('target');
    maxAmount = $(this).data('max-amount');
    givenAmount = $("."+targetClass).val();
    response = "."+targetClass+"-response";
    target = $(this).data('tableid');
    if(maxAmount < givenAmount){
        $(response).html("<p class='text-danger'> Paid amount cannot be more than <b>Payable Amount</b> </p>");
    } else if(givenAmount < 10){
        $(response).html("<p class='text-danger'> Paid amount cannot be Less than <b>10 taka</b> </p>");
    } else{
        $.ajax({
            type: "POST",
            url: "admin/duePayment.php",
            data: "target="+target+"&"+"givenAmount="+givenAmount,
            success: function(data){
                $(response).html(data);
            }
        })
    }
});