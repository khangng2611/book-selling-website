<?php 
    class App
    {
        protected $controller = "home";
        protected $action = "default";
        protected $params = [];
        
        function __construct()
        {
            $arr = $this->UrlProcess();
            if (isset($arr[0])){
                if (file_exists("./controller/". $arr[0] ."controller.php")){
                    $this->controller = $arr[0];
                    unset($arr[0]);
                }
            }            
            require_once "./controller/" . $this->controller . "controller.php";
            
            $this->controller = new $this->controller;
            if (isset($arr[1]) && method_exists($this->controller, $arr[1])){
                $this->action = $arr[1];
                unset($arr[1]);
            }
            $this->params = $arr ? array_values($arr) : [];
            $arr2 = array($this->params);
            call_user_func_array([ $this->controller, $this->action ], $arr2);
        }

        function UrlProcess(){
            if (isset($_GET['url'])){
                return explode("/", trim($_GET['url'], "/"));
            }
        }
    }
?>