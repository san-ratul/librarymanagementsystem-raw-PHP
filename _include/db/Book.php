<?php
include_once "Session.php";
include_once "Database.php";
class Book
{
    private $db;
    
    private $allBooks;
    private $availabeBooks;
    private $availableBooks;

    function __construct()
    {
        $this->db = new Database();
        
    }

    public function fetchAllBooks(){
        $sql = "SELECT *, count(bname) as total FROM books GROUP BY bname, edition";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_OBJ);
        return $result;	
    }
    
    public function fetchAvailableBooks(){
        $sql = "SELECT bname,edition, count(bname) as noOfBooks FROM books WHERE reserved = 1 GROUP BY bname, edition  ";
        $query = $this->db->pdo->prepare($sql);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_OBJ);
        return $result;	
    }

    public function countAvailableBooks(){
        $this->availableBooks = array();
        foreach($this->allBooks as $booklist){
            $bookIndex = $booklist->bname . $booklist->edition;
            $this->availableBooks[$bookIndex] = $booklist->total;
            if(!empty($this->availabeBooks)){
                foreach($this->availabeBooks as $books){
                    if($booklist->bname == $books->bname && $booklist->edition == $books->edition){
                        $this->availableBooks[$bookIndex] = $booklist->total - $books->noOfBooks;
                        break;
                    }  
                }
            }  
        }
    }

    private function fetchData(){
        $this->allBooks = $this->fetchAllBooks();
        $this->availabeBooks = $this->fetchAvailableBooks();
        $this->countAvailableBooks(); 
    }
    public function showTable(){
        $this->fetchData();
        $i = 1;
        foreach($this->allBooks as $booklist){
            $bookIndex = $booklist->bname.$booklist->edition;
            echo "<tr>
                <td> $i </td>
                <td> $booklist->bname </td>
                <td> $booklist->authorname </td>
                <td>";
                if($booklist->edition == NULL){
                    echo "N/A";
                } else{
                    echo $booklist->edition ;
                }
                echo "</td>
                <td> $booklist->total </td>
                <td>";
                echo $this->availableBooks[$bookIndex];
                echo"</td> 
            </tr>";
            $i++;
        }
    }

    public function searchBookName($data){
        $data = "%".$data."%";
        $sql = 'SELECT bname FROM books WHERE bname LIKE :searchData GROUP BY bname';
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':searchData',$data, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_OBJ);
        return $result;
    }

    public function fetchAllSearchedBooks($data){
        $data = "%".$data."%";
        $sql = "SELECT *, count(bname) as total FROM books WHERE bname LIKE :bname GROUP BY bname, edition";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':bname',$data, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_OBJ);
        return $result;	
    }

    public function fetchAvailableSearchedBooks($data){
        $data = "%".$data."%";
        $sql = "SELECT bname,edition, count(bname) as noOfBooks FROM books WHERE bname LIKE :bname AND reserved = 1 GROUP BY bname, edition  ";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':bname',$data, PDO::PARAM_STR);
        $query->execute();
        $result = $query->fetchALL(PDO::FETCH_OBJ);
        return $result;	
    }

    public function readySearchedBooks(){
        $i = 1;
        foreach($this->allBooks as $booklist){
            $bookIndex = $booklist->bname.$booklist->edition;
            echo "<tr>
                <td> $i </td>
                <td> $booklist->bname </td>
                <td> $booklist->authorname </td>
                <td>";
                if($booklist->edition == NULL){
                    echo "N/A";
                } else{
                    echo $booklist->edition ;
                }
                echo "</td>
                <td> $booklist->total </td>
                <td>";
                echo $this->availableBooks[$bookIndex];
                echo"</td> 
            </tr>";
            $i++;
        }
    }
    

    public function searchBook($searchedData){
        $this->allBooks = $this->fetchAllSearchedBooks($searchedData);
        if(!empty($this->allBooks)){
            $this->availabeBooks = $this->fetchAvailableSearchedBooks($searchedData);
            $this->countAvailableBooks();
            return 1;
        } else{
            return 0;
        }
        
    }

    public function renewBook($bookid,$returnDate){
        $sql = "UPDATE reservedbooks SET renewBook = 1, returnDate = :returnDate WHERE bookId = :bookid and returnedBook = 0";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":returnDate",$returnDate);
        $query->bindValue(":bookid",$bookid);
        $query->execute();
        $result = $query->rowCount();
        return $result;
    }

    public function searchReservedBooklist($bookId){
        $sql = "SELECT COUNT(bookId) AS numberofbooks FROM reservedbooks WHERE bookId = :bookId and returnedBook = 0";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":bookId",$bookId);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        if($result->numberofbooks == 1){
            return true;
        }else{
            return false;
        }
        
    }
    public function fetchBookDetails($bookId){
        $sql = "SELECT s.sid, s.sName, s.email, s.phoneNumber, b.bname, b.authorname, b.edition, r.reservationDate, r.reservationDate, r.returnDate, r.due,r.renewDue, r.paidAmount,r.id FROM student s, books b, reservedbooks r WHERE s.sid = r.studentId AND b.bid = r.bookId AND r.returnedBook = 0 AND r.bookId = :bookId";

        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":bookId",$bookId);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function returnBook($id, $bid, $due, $paid){
        $remainDue = $due-$paid;
        if($remainDue == 0){
            $sql = "UPDATE books set reserved = 0 WHERE bid = :bid;UPDATE reservedbooks SET returnedBook = 1, paid = 1 WHERE id = :id";
        } else{
            $sql = "UPDATE books set reserved = 0 WHERE bid = :bid;UPDATE reservedbooks SET returnedBook = 1 WHERE id = :id";
        } 
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(":bid", $bid);
        $query->bindValue(":id", $id);
        $query->execute();
        $result = $query->rowCount();
        return $result;
    }
    public function getBook($bookId){
        $sql = "SELECT * FROM books WHERE bid = :bid";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':bid', $bookId);
        $query->execute();
        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    public function reserveBook($sid,$bid){
        $date = date('Y/m/d', strtotime('today midnight'));
        $newDate = date('Y/m/d',strtotime("+7days"));
        $sql = "INSERT INTO reservedbooks (`studentId`, `bookId`, `reservationDate`,`returnDate`) VALUES (:studentId, :bookId, :reservationDate,:returnDate); UPDATE books SET reserved = 1 WHERE bid = :bid;";
        $query = $this->db->pdo->prepare($sql);
        $query->bindValue(':studentId', $sid);
        $query->bindValue(':bookId', $bid);
        $query->bindValue(':reservationDate', $date);
        $query->bindValue(':returnDate', $newDate);
        $query->bindValue(':bid', $bid);
        $query->execute();
        $result = $query->rowCount();
        return $result;
    }
}