(function($){
	$(document).ready(function(){
		var LFH = $(".form-wrapper").height() + "px";
		$(".f-container").height(LFH);
		var winHeight = $(window).height();
		var navHeight = $(".navbar").height() + 5;
		$(".student-info").height((winHeight-navHeight) + "px");
		$(".admin-sidebar").height((winHeight-navHeight) + "px");
		$(".s-book-list").click(function(e){
			e.preventDefault();
			$(".nav-active").removeClass("nav-active");
			$(this).addClass("nav-active");
			$(".student-content").load("books/booklist.php");
			
		});
		$(".admin-content").load("books/booklist.php");

		$(".s-profile , .student-name").click(function(e){
			e.preventDefault();
			$(".nav-active").removeClass("nav-active");
			$(this).addClass("nav-active");
			$(".student-content").load("student/profile.php");
			
		});
		$(".reserve-book").click(function(e){
			e.preventDefault();
			$(".nav-active").removeClass("nav-active");
			$(this).addClass("nav-active");
			$(".admin-content").load("books/reserveBooks.php");
			
		});
		$('.alert-custom').delay(2000).fadeOut(500);
	});
	
	$(".tab a").click(function(event){
		event.preventDefault();
		$(".tab li").removeClass('active-button');
		$(this).parent().addClass('active-button');
		var target;
		var url;
		var btn;
		url = $(this).data("url")+"-registration.php";
		btn = "."+$(this).data("url")+"-login-btn";
		target = "."+$(this).data("target");
		$(".reg-link a").attr('href', url);
		$(".form-wrapper").fadeOut();
		$(target).fadeIn();

	});

	$(".all-student").click(function(e){
		e.preventDefault();
		$(".admin-sidebar-active").removeClass("admin-sidebar-active");
		$(this).addClass("admin-sidebar-active");
		$(".admin-content").load("admin/getAllStudent.php");
		
	});

	$(".student-req").click(function(e){
		e.preventDefault();
		$(".admin-sidebar-active").removeClass("admin-sidebar-active");
		$(this).addClass("admin-sidebar-active");
		$(".admin-content").load("admin/inactiveStudent.php");
	});

	$(".due-list").click(function(e){
		e.preventDefault();
		$(".admin-sidebar-active").removeClass("admin-sidebar-active");
		$(this).addClass("admin-sidebar-active");
		$(".admin-content").load("admin/dueStudentList.php");
	});
	$(".cancel-reservation").click(function(e){
		e.preventDefault();
		$(".admin-sidebar-active").removeClass("admin-sidebar-active");
		$(this).addClass("admin-sidebar-active");
		$(".admin-content").load("admin/cancelReservation.php");
	});
	
	
})(jQuery);