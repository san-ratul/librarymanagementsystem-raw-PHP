$('.student-profile-link').click(function(e){
    e.preventDefault();
    var id = $(this).data("id");
    $.ajax({
        type: 'POST',
        url: 'admin/student-profile-generate.php',
        data: 'id='+id,
        success: function(data){
            $('.admin-content').html(data);
        }
    })
})

$(".active-status").click(function(e){
    e.preventDefault();
    var id = $(this).data("target");
    var status = $(this).data("status");

    $.ajax({
        type: "POST",
        url: "admin/activeStudentScript.php",
        data: {id: id, status: status},
        success: function(data){
            $('.active-response').html(data);
        }
    })
})

$(".active-account").click(function(e){
    e.preventDefault();
    var id = $(this).data("target");
    var status = $(this).data("status");

    $.ajax({
        type: "POST",
        url: "admin/activeStudentScript.php",
        data: {id: id, status: status},
        success: function(data){
            $(".admin-content").load("admin/inactiveStudent.php",function(){
                $('.inactive-response').html(data);
                $('.response-style').fadeIn(10000,function(){
                    $('.response-style').delay(3000).fadeOut();
                });
            });
        }
    })
})

$(".delete-account").click(function(e){
    e.preventDefault();
    var id = $(this).data("target");
    var status = $(this).data("status");
    $.ajax({
        type: "POST",
        url: "admin/deleteStudentScript.php",
        data: {id: id, status: status},
        success: function(data){
            $(".admin-content").load("admin/inactiveStudent.php",function(){
                $('.inactive-response').html(data);
                $('.response-style').fadeIn(10000,function(){
                    $('.response-style').delay(3000).fadeOut();
                });
            });
        }
    })
})