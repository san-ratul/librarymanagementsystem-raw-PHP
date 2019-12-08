<?php

class studentfunction{
    function __construct($user)
		{
			$this->db = $user->getdb();
		}
    //update the due of the student from database
    public function updateDue($sid){
        $sql = 'SELECT due FROM student WHERE sid = :id';
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':id',$sid);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        Session::set("due",$result->due);
    }

    //Counting How many books are reserved against a student id
    public function countBooks($sid){
        $sql = "SELECT COUNT(studentId) AS noOfBooks FROM reservedbooks WHERE studentId = :sid AND returnedbook = 0";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':sid', $sid);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result->noOfBooks;
    }

    //Getting the list of reserved books

    public function listBooksToReturn($sid){
        $sql = "SELECT b.bname, b.authorname, b.edition, r.bookId, r.returndate, r.reservationdate, r.renewBook FROM books b, reservedbooks r WHERE b.bid = r.bookid AND r.studentId = :sid AND returnedbook = 0";
        $query = $this->db->pdo->prepare($sql);
        $query-> bindValue(":sid", $sid);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }

    public function printNotReturnedBooks($data){
        $i = 1;
        foreach($data as $book){
            echo "<tr>";
            echo "<td>",$i,"</td>";
            echo "<td>",$book->bname,"</td>";
            echo "<td>",$book->authorname,"</td>";
            echo "<td>",$book->edition,"</td>";
            echo "<td>",date('d/m/Y',strtotime($book->reservationdate)),"</td>";
            echo "<td>",date('d/m/Y',strtotime($book->returndate)),"</td>";
            if($book->renewBook == 1){
                echo "<td><button class='btn btn-diabled' disabled>Renew</button></td>";
            } else{
                echo "<td><button class='btn btn-success btn-renew' data-target = ",$book->bookId,">Renew</button></td>";
            }
            echo "</tr>";
            $i++;
        }
    }

    public function updatePhone($id,$phoneNumber){
        $sql = "UPDATE student SET phoneNumber = :phoneNumber WHERE sid = :sid";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":phoneNumber", $phoneNumber);
        $query->bindValue(":sid", $id);
        $query->execute();
        $result = $query->rowCount();
        return $result;
    }
    public function updateEmail($id,$email){
        $sql = "UPDATE student SET email = :email WHERE sid = :sid";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":sid", $id);
        $query->bindValue(":email", $email);
        $query->execute();
        $result = $query->rowCount();
        return $result;
    }

    public function updateParentDetails($id,$value,$columnName){
        $sql = "UPDATE parentdetails SET ".$columnName." = :value WHERE pid = :pid";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":value", $value);
        $query->bindValue(":pid", $id);
        $query->execute();
        $result = $query->rowCount();
        return $result;
    }

    public function getParentDetails($id){
        $sql = "SELECT * from parentdetails WHERE pid = :id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function getAllStudent(){
        $sql = "SELECT * FROM student";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getNoOfBooksReserved(){
        $result = array();
        $students = $this->getAllStudent();
        foreach($students as $student){
            $result[$student->sid] = 0;
        }
        foreach($students as $student){
            $sql = "SELECT count(studentId) as noOfBooks from reservedBooks where studentId = :sid AND returnedBook = 0";
            $query = $this->db->pdo->prepare($sql);
            $query->bindValue(":sid", $student->sid);
            $query->execute();
            $res = $query->fetch(PDO::FETCH_OBJ);
            if(isset($res->noOfBooks) && $result[$student->sid] < $res->noOfBooks){
                $result[$student->sid] = $res->noOfBooks;
            }
        }
        return $result;
    }
    public function printAllStudent($AllStudents, $books){
        ?>
            <table class="table table-striped table-bordered">
            <tr>
                <th>Student ID</th>
                <th>Student Name</th>
                <th>Student Email</th>
                <th>Phone Number</th>
                <th>No. of Reserved Books</th>
                <th>Due</th>
                <th>Active</th>
            </tr>
        <?php
        foreach($AllStudents as $student){ 
            echo "<tr>";
                echo "<td>";
                    echo $student->sid;
                echo "</td>";
                echo "<td>";
                    echo "<a href='profile?id=",$student->sid,"' class='student-profile-link' data-id = ",$student->sid,">",$student->sName ,"</a>";
                echo "</td>";
                echo "<td>";
                    echo $student->email;
                echo "</td>";
                echo "<td>";
                    echo $student->phoneNumber;
                echo "</td>";
                echo "<td>";
                    echo $books[$student->sid];
                echo "</td>";
                echo "<td>";
                    echo $student->due , " Taka";
                echo "</td>";
                echo "<td>";
                    if($student->active == 1){
                        echo '<p class="text-success"> Active </p>';
                    } else{
                        echo '<p class="text-danger"> Not Active </p>';
                    }
                echo "</td>";
                
            echo "</tr>";
        }
    }
    public function getStudent($id){
        $sql = "SELECT * FROM student WHERE sid=:sid";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":sid",$id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }
    public function activeStudentAccount($id){
        $sql = "UPDATE student SET active = 1 WHERE sid=:id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        $result = $query->rowCount();
        return $result;
    }

    public function deactiveStudentAccount($id){
        $sql = "UPDATE student SET active = 0 WHERE sid=:id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        $result = $query->rowCount();
        return $result;
    }

    public function countNonActive(){
        $sql = "SELECT COUNT(sid) AS nonActive FROM student WHERE active = 0";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function getPendingStudents(){
        $sql = "SELECT * FROM student WHERE active = 0";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function deleteStudentAccount($id){
        $sql = "DELETE FROM student WHERE sid = :sid; DELETE FROM parentdetails WHERE pid = :pid";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':sid', $id);
        $query->bindValue(':pid', $id);
        $query->execute();
        $result = $query->rowCount();
        return $result;
    }

    public function countStudentWithDue(){
        $sql = "SELECT COUNT(sid) as SWD FROM student WHERE due > 0";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function getDetailsOfDue(){
        $sql = " SELECT sid, sname, due FROM student WHERE due > 0 ORDER BY sid";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;
    }
    public function getDueDetailsofStudent($sid){
        $sql = "SELECT b.bid,b.bname,b.authorname,b.edition,s.sName,r.returnDate,r.due,r.renewDue,r.paidAmount, r.id FROM books b, student s, reservedbooks r WHERE r.studentId = s.sid AND b.bid = r.bookId AND r.studentId = :sid";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":sid",$sid);
        $query->execute();
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    public function getPaidAmount($id){
        $sql = "SELECT * from reservedbooks WHERE id = :id";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":id",$id);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function updatePaidAmount($id,$amount){
        $paidAmount = $this->getPaidAmount($id);
        $totalPaid = $paidAmount->paidAmount+$amount;
        if($paidAmount->returnedBook == 1 && ($paidAmount->due+$paidAmount->renewDue) == $totalPaid){
            $sql = "UPDATE reservedbooks SET paidAmount = :paidAmount, paid = '1' WHERE id = :id";
        }else{
            $sql = "UPDATE reservedbooks SET paidAmount = :paidAmount WHERE id = :id";
        }
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":paidAmount",$totalPaid);
        $query->bindValue(":id",$id);
        $query->execute();
        $result = $query->rowCount();
        return $result;
    }

    public function getAllDueDetails($id){
        $sql = 'SELECT b.bid,b.bname,b.authorname,b.edition,r.due, r.renewDue, r.paidAmount FROM books b, reservedbooks r WHERE r.bookId = b.bid AND (r.due > 0 OR r.paidAmount > 0) AND r.studentId = :sid ORDER BY b.bid';
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':sid', $id);
        $query->execute();
        $result = $query->fetchAll(PDO::FETCH_OBJ);
        return $result;

    }


}

?>