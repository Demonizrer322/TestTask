<?php
    function __autoload($name){
        require_once ($name.".php");
        if (!class_exists($name)){
            throw new Exception("Controller class not found $name");
        }
    }
