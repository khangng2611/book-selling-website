<?php 
class Home extends Controller
{
    function default() {
        $this->getTop3Book();
    }

    function getAllBook()
    {
        $this->model("Book");
        $book = new bookmodel();
        $success = $book->getAllBook();
        if ($success == true) {
            $msg = "Lấy dữ liệu thành công";
            $this->view("home", ["data" => $success,"msg" => $msg,]);
            die;
        } else {
            $this->view("home", ["err" => "SQL failed",]);
        }
    }

    function getTop3Book() {
        $conn = NULL;
        $server = 'localhost';
        $dbName = 'bookstore';
        $user = 'root';
        $password = '';
        $conn = new mysqli($server, $user, $password, $dbName);
        if ($conn->connect_error) {
            printf($conn->connect_error);
            exit();
        }
        $conn->set_charset("utf8");

        $sql = "SELECT * FROM book ORDER BY amount LIMIT 3";
        $result = $conn->query($sql);

        if ($result == true) {
            $msg = "Lấy dữ liệu thành công";
            $this->view("home", ["data" => $result,"msg" => $msg,]);
            die;
        } else {
            $this->view("home", ["err" => "SQL failed",]);
        }        
    }

    function getAllBookPagination()
    {
    $results_per_page = 3;  
    //find the total number of results stored in the database  
    $conn = NULL;
    $server = 'localhost';
    $dbName = 'bookstore';
    $user = 'root';
    $password = '';

    $conn = new mysqli($server, $user, $password, $dbName);

    if ($conn->connect_error) {
        printf($conn->connect_error);
        exit();
    }
    $conn->set_charset("utf8");

    $query = "select count(*) as total_row from book";  
    $result = mysqli_query($conn, $query);  
    $row = $result->fetch_assoc();

    $number_of_result =  $row['total_row'];

    //determine the total number of pages available  
    $number_of_page = ceil ($number_of_result / $results_per_page);  

    //determine which page number visitor is currently on  
    if (!isset ($_GET['page']) ) {  
        $page = 1;  
    } else {  
        $page = $_GET['page'];  
    }  

    //determine the sql LIMIT starting number for the results on the displaying page  
    $page_first_result = ($page-1) * $results_per_page;  

    //retrieve the selected results from database   
    $query = "SELECT * FROM book LIMIT " . $page_first_result . ',' . $results_per_page;  
    $result = mysqli_query($conn, $query);  
    
    // '<a href = "index2.php?page=' . $page . '">' . $page . ' </a>';  
    //display the link of the pages in URL  
    $ket_qua="";    
    for($pageload = 1; $pageload<= $number_of_page; $pageload++) { 
            if ($pageload == $page){
                $ket_qua = $ket_qua . "<li id='pagination' class='page-item active'><a class='page-link' href='/mvc/product?page=$pageload'>$pageload</a></li>";//getAllProductPagination
            }
            else {
                $ket_qua = $ket_qua . "<li id='pagination' class='page-item'><a class='page-link' href='/mvc/product?page=$pageload'>$pageload</a></li>";//getAllProductPagination
            }
        }
    if ($result == true) {
        $msg = "Lấy dữ liệu thành công";
        $this->view("home", ["ket_qua" => $ket_qua,"paginationData" => $result,"msg" => $msg,]);
        die;
    } else {
        $this->view("home", ["err" => "SQL bị lỗi",]);
    }
    }
}
?>
