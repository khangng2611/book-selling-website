<?php
class Profile extends Controller
{
    function default() {
        $this->view("profile");
    }
    function bookmanager() {
        $book = $this->model('BookModel');
        $allBook = $book->getAllBook();
        $this->view("bookmanager", ['allBook' => $allBook,]);
    }
    function usermanager() {
        $book = $this->model('UserModel');
        $allUsers = $book->getAllUser();
        $this->view("usermanager", ['allUsers' => $allUsers,]);
    }
    function ordermanager() {
        $book = $this->model('OrderModel');
        $allOrders = $book->getAllOrder();
        $this->view("ordermanager", ['allOrders' => $allOrders,]);
    }
}
?>