<?php
include_once "User.php";
include_once "studentfunction.php";
$user     = new User();
$student  = new studentfunction($user);
    if(isset($_POST['sid'])){
        $sid = $_POST['sid'];
        $details = $student->getDueDetailsofStudent($sid);
    } else{
        echo "<p class='text-danger'> <b>Error</b> Some Error Occurd!</p>";
    }
?>
<h4 class="text-center">Books not Returned By <b> <?php echo $details[0]->sName;?> </b></h4>
<table class="table table-striped table-bordered">
    <tr>
        <th>Book ID</th>
        <th>Book Name</th>
        <th>Author</th>
        <th>Edition</th>
        <th>Return Date</th>
        <th>Total Due</th>
        <th>Paid Ammount</th>
    </tr>
    <?php foreach($details as $detail){ 
    if($detail->due+$detail->renewDue > $detail->paidAmount){
    ?>
    <tr>
        <td><?php echo $detail->bid; ?></td>
        <td><?php echo $detail->bname; ?></td>
        <td><?php echo $detail->authorname; ?></td>
        <td><?php echo $detail->edition; ?></td>
        <td><?php echo $detail->returnDate; ?></td>
        <td><?php echo $detail->due+$detail->renewDue; ?></td>
        <td><?php echo $detail->paidAmount; ?></td>
    </tr>
    <?php }} ?>
</table>
<h4> Due Paid: </h4>
<table class="table table-striped table-bordered">
    <tr>
        <th>Book ID</th>
        <th>Payable</th>
        <th>Paid</th>
        <th>Action</th>
    </tr>
    <?php foreach($details as $detail){ 
        $maxAmount = $detail->due+$detail->renewDue - $detail->paidAmount;
        if($detail->due+$detail->renewDue > $detail->paidAmount){
    ?>
    <tr>
        <td><?php echo $detail->bid; ?></td>
        <td><?php echo $maxAmount; ?></td>
        <td>
           <input type="number" name="paidAmount" class="bid-<?php echo $detail->bid;  ?>" value="0"/>
           <div class="bid-<?php echo $detail->bid; ?>-response"></div>
        </td>
        <td>
           <input data-target="bid-<?php echo $detail->bid; ?>" data-max-amount="<?php echo $maxAmount; ?>" data-tableId = "<?php echo $detail->id; ?>" class="btn btn-success btn-paid" type="submit" value="Submit"/> 
        </td>
    </tr>
    <?php }} ?>
</table>

<script src="js/dueHandler.js"></script>