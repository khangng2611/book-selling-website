<?php 
class Home extends Controller
{
    function default() {
        $book = $this->model('BookModel');
        $result = $book->getTop3Book();
        $this->view('home', ['top3Book' => $result,]);
    }
    function contact() {
        $this->view("contact");
    }
    function about() {
        $this->view("about");
    }
}
?>
