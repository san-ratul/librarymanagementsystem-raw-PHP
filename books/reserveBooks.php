<div class="container">
    <div class="row">
        <h3 class="reserve-book-header">Reserve Book</h3>
        <div class="col-lg-6 col-md-6">
            <form class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" id="studentId" placeholder="Enter Student Id" autocomplete = "off">
                </div>
                <button type="submit" class="btn btn-default btn-get-student">Get Details</button>
            </form>
        </div>
        <div class="col-lg-6 col-md-6">
            <form class="form-inline">
                <div class="form-group">
                    <input type="text" class="form-control" id="bookId" placeholder="Enter Book Id" autocomplete = "off">
                </div>
                <button type="submit" class="btn btn-default btn-get-book">Get Details</button>
            </form>
        </div>
    </div>
</div>

<div class="container new-reserve-details">
    <div class="row">
        <div class="col-lg-6 col-md-6 student-details"></div>
        <div class="col-lg-6 col-md-6 book-details"></div>
    </div>
    <button class="btn btn-info btn-reserve-book" >Reserve Book</button>
    <div class="reserve-book-response"></div>
</div>
<script src="js/reserveBook.js"></script>