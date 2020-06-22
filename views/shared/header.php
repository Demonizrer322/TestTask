<?php
    if (!isset($_SESSION)) session_start();
?>

<!doctype html>
<htmlspecialchars_decode>
<head>
    <meta charset="utf-8">
    <title>Test Task</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <a class="navbar-brand" href="#">Navbar</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="http://<?=$_SERVER['HTTP_HOST']?>/home/index">Home <span class="sr-only">(current)</span></a>
            </li>
            </ul>
            <form class="form-inline my-2 my-lg-0">
<?php
    if(!empty($_SESSION["Email"])){
?>
        <div class="mr-2"><?=$_SESSION['Email']?></div>
        <a href="/user/logout">Logout</a>
<?php
    } else {
?>
        <a href="http://<?=$_SERVER['HTTP_HOST']?>/user/loginRegister">Login</a>
<?php
    }
?>
                
            </form>
        </div>
    </nav>

