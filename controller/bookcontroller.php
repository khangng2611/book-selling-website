
<?php
class Book extends Controller
{
    function default()
    {
        $this->getBook();
    }

    function getBook() {
        $conn = NULL;
        $server = 'localhost';
        $dbName = 'bookstore';
        $user = 'root';
        $password = '';
        $connection = mysqli_connect($server, $user, $password, $dbName);

        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $connection->set_charset("utf8");
        $this->view("book", ["connection" => $connection,]);
    }

    // function truyentranh() {
    //     $this->getBookbyTheme("Truyện tranh");
    // }

    // function kinangsong() {
    //     $this->getBookbyTheme("Kĩ năng sống");
    // }

    // function hocthuat() {
    //     $this->getBookbyTheme("Học thuật");
    // }

    // function getAllProductAdminPagination()
    // {
    //     $results_per_page = 6;  
        
    //     //find the total number of results stored in the database  
    //     $conn = NULL;
    //     $server = 'localhost';
    //     $dbName = 'bookstore';
    //     $user = 'root';
    //     $password = '';

    //     $conn = new mysqli($server, $user, $password, $dbName);

	// 	if ($conn->connect_error) {
	// 		printf($conn->connect_error);
	// 		exit();
	// 	}
	// 	$conn->set_charset("utf8");

    //     $query = "select count(*) as total_row from book";  
    //     $result = mysqli_query($conn, $query);  
    //     $row = $result->fetch_assoc();
  
    //     $number_of_result =  $row['total_row'];

    //     //determine the total number of pages available  
    //     $number_of_page = ceil ($number_of_result / $results_per_page);  
   
    //     //determine which page number visitor is currently on  
    //     if (!isset ($_GET['page']) ) {  
    //         $page = 1;  
    //     } else {  
    //         $page = $_GET['page'];  
    //     }  

    //     //determine the sql LIMIT starting number for the results on the displaying page  
    //     $page_first_result = ($page-1) * $results_per_page;  
 
    //     //retrieve the selected results from database   
    //     $query = "SELECT *FROM book LIMIT " . $page_first_result . ',' . $results_per_page;  
    //     $result = mysqli_query($conn, $query);  
        
    //     // '<a href = "index2.php?page=' . $page . '">' . $page . ' </a>';  
    //     //display the link of the pages in URL  
    //     $ket_qua="";    
    //     for($pageload = 1; $pageload<= $number_of_page; $pageload++) { 
                
    //             if ($pageload == $page){
    //                 $ket_qua = $ket_qua . "<li id='pagination' class='page-item active'><a class='page-link' href='/mvc/book?page=$pageload'>$pageload</a></li>";
    //             }

    //             else {
    //                 //getAllProductAdminPagination
    //                 $ket_qua = $ket_qua . "<li id='pagination' class='page-item'><a class='page-link' href='/mvc/book?page=$pageload'>$pageload</a></li>"	;
    //             }
    //         }
    //     // print_r($success);
    //     if ($result == true) {
    //         $msg = "Lấy dữ liệu thành công";
    //         $this->view("bookmanager", ["ket_qua" => $ket_qua,"data" => $result,"msg" => $msg,]);
    //         die;
    //     } else {
    //         $this->view("bookmanager", ["err" => "SQL bị lỗi",]);
    //     }
    // }
    // function getAllProductPagination()
    // {
    //     $results_per_page = 6;  
        
    //     //find the total number of results stored in the database  

    //     $conn = NULL;
    //     $server = 'localhost';
    //     $dbName = 'bookstore';
    //     $user = 'root';
    //     $password = '';

    //     $conn = new mysqli($server, $user, $password, $dbName);

	// 	if ($conn->connect_error) {
	// 		printf($conn->connect_error);
	// 		exit();
	// 	}
	// 	$conn->set_charset("utf8");

    //     $query = "select count(*) as total_row from book";  
    //     $result = mysqli_query($conn, $query);  
    //     $row = $result->fetch_assoc();
  
    //     $number_of_result =  $row['total_row'];

    //     //determine the total number of pages available  
    //     $number_of_page = ceil ($number_of_result / $results_per_page);  
   
    //     //determine which page number visitor is currently on  
    //     if (!isset ($_GET['page']) ) {  
    //         $page = 1;  
    //     } else {  
    //         $page = $_GET['page'];  
    //     }  

    //     //determine the sql LIMIT starting number for the results on the displaying page  
    //     $page_first_result = ($page-1) * $results_per_page;  
 
    //     //retrieve the selected results from database   
    //     $query = "SELECT * FROM book LIMIT " . $page_first_result . ',' . $results_per_page;  
    //     $result = mysqli_query($conn, $query);  
        
    //     //display the link of the pages in URL  
    //     $ket_qua="";    
    //     for($pageload = 1; $pageload<= $number_of_page; $pageload++) { 
                
    //             if ($pageload == $page){
    //                 $ket_qua = $ket_qua . "<li id='pagination' class='page-item active'><a class='page-link' href='/bookstore/book?page=$pageload'>$pageload</a></li>";
    //             }

    //             else {
    //                 $ket_qua = $ket_qua . "<li id='pagination' class='page-item'><a class='page-link' href='/bookstore/book?page=$pageload'>$pageload</a></li>"	;
    //             }
    //         }
    //     // print_r($success);
    //     if ($result == true) {
    //         $msg = "Lấy dữ liệu thành công";
    //         $this->view("book", ["ket_qua" => $ket_qua,"paginationData" => $result, "msg" => $msg,]);
    //         die;
    //     } else {
    //         $this->view("book", ["err" => "SQL bị lỗi",]);
    //     }
    // }

    // function getBookbyTheme($theme)
    // {
    //     $this->model('BookModel');
    //     $stmt = $this->conn->prepare("SELECT * FROM book WHERE id = ?");
    //     $stmt->bind_param("i", $id);
    //     $stmt->execute();
    //     $result = $stmt->get_result();
    //     if ($result->num_rows == 1) {
    //         $row = $result->fetch_assoc();
    //         return $row;
    //     } else {
    //         [];
    //     }
    // }


    // function getAllBookAdmin()
    // {

    //     $book = $this->model('BookModel');
    //     $success = $book->getAllBook();
    //     // print_r($success);

    //     if ($success == true) {
    //         $msg = "Lấy dữ liệu thành công";
    //         $this->view("bookmanager", ["data" => $success,"msg" => $msg,]);
    //         die;
    //     } else {
    //         $this->view("bookmanager", ["err" => "SQL bị lỗi", ]);
    //     }
    // }

    function getDetail()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $admin = $this->model('BookModel');
            $success = $admin->getBook($id);
            if ($success == true) {
                $msg = "Lấy dữ liệu thành công";
                $this->view("detail", ["data" => $success,"msg" => $msg,]);
                die;
            } else {
                $this->view("detail", ["err" => "SQL bị lỗi hàm getDetails",]);
            }
        } else {
            $this->view("detail", ["msg" => "Bị lỗi SQL hàm getDetails"]);
        }
    }

    // function getDetailAndEdit()
    // {
    //     if (isset($_POST['sua'])) {
    //         $id = $_POST['sua'];
    //         // print($id);
    //         $admin = $this->model('BookModel');
    //         $success = $admin->getBook($id);
    //         if ($success == true) {
    //             $msg = "Lấy dữ liệu thành công";
    //             $this->view("editBookDetails", [
    //                 "data" => $success,
    //                 "msg" => $msg,
    //             ]);
    //             die;
    //         } else {
    //             $this->view("editBookDetails", [
    //                 "err" => "SQL bị lỗi hàm getDetails",
    //             ]);
    //         }
    //     } else {
    //         $this->view("editBookDetails", ["msg" => "Bị lỗi SQL hàm getDetails"]);
    //     }
    // }

    function edit() {
        $book = $this->model('BookModel');
        $img = $_SESSION['bookEdit']['img']??"";
        if (isset($_POST['edit'])) {
            $id = $_POST['id'];
            $title = ""; 
            $title = ""; $author = ""; $theme = "";
            $publisher = ""; $price = 0; $amount = 0;
            $book_description = "";
            if (isset($_POST['title'])) { $title = $_POST['title'];}
            if (isset($_POST['author'])) { $author = $_POST['author'];}
            if (isset($_POST['theme'])) { $theme = $_POST['theme'];}
            if (isset($_POST['publisher'])) { $publisher = $_POST['publisher'];}
            if (isset($_POST['publish_date'])) { $publish_date = $_POST['publish_date'];}
            if (isset($_POST['price'])) { $price = $_POST['price'];}
            if (isset($_POST['amount'])) { $amount = $_POST['amount']; }
            if (isset($_POST['book_description'])) { $book_description = $_POST['book_description'];}

            if ($title == "" || $author == "" || $theme == "") {
                $msg = "Vui lòng điền đầy đủ thông tin!";
                header('Location: /bookstore/profile/bookmanager');
            } else {
                if ( $_FILES["img"]["error"] == 0){
                    $img = $this->upload_file_book($_FILES);
                }
                $success = $book->updateBook($title, $author, $theme, $publisher, $publish_date, $price, $amount, $book_description, $img, $id);
                if ($success == true) {
                    header('Location: /bookstore/profile/bookmanager');
                    die;
                } else {
                    header('Location: /bookstore/profile/bookmanager');
                    die;
                }
            }
        } else {
            header('Location: /bookstore/profile/bookmanager');        
        }
        //     echo '<h2 style="text-align: center">Please wait...</h2>';
        //     header('Refresh: 1; URL=/bookstore/profile/usermanager');
        // }

    }

    function show() {
        if (isset($_POST['show'])) {
            if (isset($_POST['id'])) {
                $show = $this->model('BookModel');
                $result = $show->getBook($_POST['id']);
                if ($result == true) {
                    $_SESSION['bookEdit']['id'] = $result['id'];
                    $_SESSION['bookEdit']['title'] = $result['title'];
                    $_SESSION['bookEdit']['author'] = $result['author'];
                    $_SESSION['bookEdit']['theme'] = $result['theme'];
                    $_SESSION['bookEdit']['publisher'] = $result['publisher'];
                    $_SESSION['bookEdit']['publish_date'] = $result['publish_date'];
                    $_SESSION['bookEdit']['price'] = $result['price'];
                    $_SESSION['bookEdit']['amount'] = $result['amount'];
                    $_SESSION['bookEdit']['book_description'] = $result['book_description'];
                    $_SESSION['bookEdit']['img'] = $result['img'];
                }
            }
        }
        header("Location: /bookstore/profile/bookmanager");
    }

    function add() {
        $add = $this->model('BookModel');
        if (isset($_POST["insertdata"])) {
            $title = $_POST["title"];
            $author = $_POST["author"];
            $theme = $_POST["theme"];
            $publisher = $_POST["publisher"];
            $publish_date = $_POST["publish_date"];
            $price = $_POST["price"];
            $amount = $_POST["amount"];
            $book_description = $_POST["book_description"];
            $img = "";
            if ( $_FILES["img"]["error"] == 0){
                $img = $this->upload_file_book($_FILES);
            }

            $result = $add->insertBook($title, $author, $theme, $publisher, $publish_date, $price, $amount, $book_description, $img);
            if ($result){
                echo '<script> alert("Thêm thành công"); </script>';
            }
            else {
                echo '<script> alert("Thêm thất bại"); </script>';
            }
            echo '<h2 style="text-align: center">Please wait...</h2>';
            header('Refresh: 1; URL=/bookstore/profile/bookmanager');
        }
    }

    function delete() {
        $delete = $this->model('BookModel');
        if (isset($_POST["delete"])){
            $id = $_POST['id'];        
            $result = $delete->deleteBook($id);
            if($result)
            {
                echo '<script> alert("Data Deleted Successfully!"); </script>';
                header("Location: /bookstore/profile/usermanager");
            }
            else
            {
                echo '<script> alert("Data Not Deleted Succesful!"); </script>';
                header("Location: /bookstore/profile/usermanager");
            }
        }
    }

}
