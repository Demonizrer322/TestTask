<?php
    require_once('autoload.php');

    $requestUri=preg_split('/\/|\?/',$_SERVER["REQUEST_URI"]);
    $controllerName= (isset($requestUri[1])&&!empty($requestUri[1])) ? $requestUri[1] : "home";
    $controllerPath='controllers/'.$controllerName.'Controller.php';
    try
    {
        if (!file_exists($controllerPath)){
            $controllerName="home";
            $controllerPath='controllers/'.$controllerName.'Controller.php';
        }
        $controllerName=$controllerName.'Controller';
        $controllerNew='controllers\\'.$controllerName;
        $controller = new $controllerNew;
        $actionName= (isset($requestUri[2])&&!empty($requestUri[2])) ? $requestUri[2] : "index";
        $actionName=$actionName.'Action';
        if (method_exists($controller, $actionName))
        {
            $controller->$actionName();
        } else {
            throw new Exception("Method $actionName not found in Controller class  $controllerName in file $controllerPath");
        }
    }
    catch (Exception $ex){
        require_once("views/shared/error.php");
        echo $ex->getMessage();
    }
?>