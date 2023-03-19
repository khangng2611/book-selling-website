<?php 
    class Cart extends Controller
    {
        function default() {
            $this->view("cart");
        }

        function add() {
            if (isset($_POST["buy"])) {
                $msg="";
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
                    // Product exists in database, now we can create/update the session variable for the cart
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
                    $msg = "Thêm vào giỏ hàng thành công !";
                    $this->view("detail", ["data" => $success,"msg" => $msg,]);
                    die;
                    //header("Location: /bookstore/book");                    
                } else {
                    $msg = "Thêm vào giỏ hàng không thành công !";
                    $this->view("detail", ["data" => $success,"msg" => $msg,]);
                    die;
                    // header('Location: ' . $_SERVER['HTTP_REFERER']);
                    // exit;               
                }
            }
        }

        function remove() {
            if (isset($_POST['remove'],$_POST['book_id']) && isset($_SESSION['cart'])) {
                foreach ($_SESSION['cart'] as $key => $value) {
                    if ($_SESSION['cart'][$key]['id'] == $_POST['book_id']) {
                        unset($_SESSION['cart'][$key]);
                        header("Location: /bookstore/cart");
                    }
                }
            }
        }

        function buy() {
            if (isset($_POST["getorder"])) {
                $order = $this->model('OrderModel');
                foreach ($_SESSION['cart'] as $item){
                    $bill = $item['amount']*$item['price'];
                    $amount = $item['amount'];
                    $id_book = $item['id'];
                    $book_title = $item['book_title'];
                    $order_time = date("Y-m-d h:i:s");
                    $order_state = "Chưa giao hàng";
                    $userId = intval($_SESSION['id']);
                    $username = $_SESSION['username'];
                    $phone =  $_SESSION['phone'];
                    $address = $_SESSION['user_address'];

                    $update = $this->model('BookModel');
                    $get = $update->getBook($id_book);
                    if ($get == true) {
                        $author = $get['author'];
                        $theme = $get['theme'];
                        $publisher = $get['publisher'];
                        $publish_date = $get['publish_date'];
                        $price = $get['price'];
                        $newamount = $get['amount'] - $amount; 
                        $book_description = $get['book_description'];
                        $img = $get['img'];
                    }
                    if ($newamount >= 0) {
                        $result = $order->insertOrder($userId, $username, $phone, $address, $id_book, $book_title, $amount, $bill, $order_time, $order_state);
                        if ($result == true) {
                            $change = $update->updateBook($book_title, $author, $theme, $publisher, $publish_date, $price, $newamount, $book_description, $img, $id_book);
                        }
                    }
                    else {
                        $this->view('cart', ['msg' => 'Số lượng sách tồn kho không đủ']);
                    }
                }
                unset($_SESSION['cart']);
                $this->view('cart', ['msg' => 'Đã đặt sách thành công!']);
            }
        }

        function deleteOrderAdmin() {
            if (isset($_POST["deletedata"])){
                $id = $_POST['delete_id'];
                
                $del = $this->model('OrderModel');
                $result = $del->deleteOrder($id);

                if($result)
                {
                    echo '<script> alert("Data Deleted Successfully!"); </script>';
                    header("Location: /bookstore/profile/ordermanager");
                }
                else
                {
                    echo '<script> alert("Data Not Deleted Succesful!"); </script>';
                }
            }
        }
    }

?>