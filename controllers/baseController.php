<?php
    namespace controllers;
    use views\view;
    
    class baseController {
        public function render($viewPath, array $parameters = []){
            new view($viewPath, $parameters);
        }
        public function Autorization($login){
            $_SESSION["Autorizzation"]=TRUE;
            $_SESSION["Email"]=$Email;
        }
    }
?>