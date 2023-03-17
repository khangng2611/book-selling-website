<?php 
    class news extends Controller
    {
        function default() {
            $this->view("news");
        }
        function news1() {
            $this->view("news1");
        }
        function news2() {
            $this->view("news2");
        }
        function news3() {
            $this->view("news3");
        }
    }
?>