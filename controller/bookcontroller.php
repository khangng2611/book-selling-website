<?php
class Book extends Controller
{
    function default()
    {
        $this->getBook();
    }

    function getBook() {
        $book = $this->model('BookModel');
        $themes = $book->getAllTheme();
        foreach ($themes as $theme) {
            $bookByTheme = $book->getBookbyTheme($theme);
            $bookSortedByTheme[] = $bookByTheme;
        }
        $this->view("book", ["bookSortedByTheme" => $bookSortedByTheme,]);
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


    function getDetail()
    {
        $addCartMsg="";
        if (isset($_POST["buy"])) {
            if (isset($_POST['amount'])) $amount = (int)$_POST['amount'];
            $book_id = (int)$_POST['book_id'];
            $kq = $this->model('BookModel');
            $updated = 0;
            $success = $kq->getBook($book_id);
            if ($amount > 0) {
                if ($success == true) {
                    $arr = ['id' => $book_id, 'book_title' => $success['title'], 'price' => $success['price'], 'img' => $success['img'],'amount'=> $amount];
                }
                if (isset($_SESSION['cart'])) {
                    foreach ($_SESSION['cart'] as $key => $value) {
                        if(empty($_SESSION['cart'][$key]['amount'])) {
                            $item['amount'] = 0;
                        }
                        if ($_SESSION['cart'][$key]['id'] == $book_id) {
                            $_SESSION['cart'][$key]["amount"] += (int)$amount;
                            $updated = 1;
                        }
                    }
                    if ($updated == 0) {
                        array_push($_SESSION['cart'], $arr);    
                    }
                } else {
                    $_SESSION['cart'] = array($arr);
                }
                $addCartMsg = "Thêm vào giỏ hàng thành công !";
                // $this->view("detail", ["data" => $success,"addCartMsg" => $addCartMsg,]);
                // die;
            } else {
                $addCartMsg = "Thêm vào giỏ hàng không thành công !";
                // $this->view("detail", ["data" => $success,"addCartMsg" => $addCartMsg,]);
                // die;         
            }
        }
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $admin = $this->model('BookModel');
            $success = $admin->getBook($id);
            if ($success == true) {
                $msg = "Lấy dữ liệu thành công";
                $this->view("detail", ["data" => $success,"msg" => $msg, "addCartMsg" => $addCartMsg,]);
                die;
            } else {
                $this->view("detail", ["err" => "SQL bị lỗi hàm getDetails",]);
            }
        } else {
            $this->view("detail", ["msg" => "Bị lỗi SQL hàm getDetails"]);
        }
    }

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
                header('Location: /profile/bookmanager');
            } else {
                if ( $_FILES["img"]["error"] == 0){
                    $img = $this->upload_file_book($_FILES);
                }
                $success = $book->updateBook($title, $author, $theme, $publisher, $publish_date, $price, $amount, $book_description, $img, $id);
                if ($success == true) {
                    header('Location: /profile/bookmanager');
                    die;
                } else {
                    header('Location: /profile/bookmanager');
                    die;
                }
            }
        } else {
            header('Location: /profile/bookmanager');        
        }

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
        header("Location: /profile/bookmanager");
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
            header('Refresh: 1; URL=/profile/bookmanager');
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
                header("Location: /profile/usermanager");
            }
            else
            {
                echo '<script> alert("Data Not Deleted Succesful!"); </script>';
                header("Location: /profile/usermanager");
            }
        }
    }
}
