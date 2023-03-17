<?php
class Profile extends Controller
{
    function default() {
        $this->view("profile");
    }
    function bookmanager() {
        $connection = mysqli_connect('localhost', 'root', '', 'bookstore');
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM book";
        $query = mysqli_query($connection, $sql);
        $this->view("bookmanager", ['query' => $query,]);
        die;
    }
    function usermanager() {
        $connection = mysqli_connect('localhost', 'root', '', 'bookstore');
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM user";
        $query = mysqli_query($connection, $sql);
        $this->view("usermanager", ['query' => $query,]);
        die;
    }
    function ordermanager() {
        $connection = mysqli_connect('localhost', 'root', '', 'bookstore');
        if (!$connection) {
            die("Connection failed: " . mysqli_connect_error());
        }
        $sql = "SELECT * FROM `order1`";
        $query = mysqli_query($connection, $sql);
        $this->view("ordermanager", ['query' => $query]);
        die;
    }
}
?>