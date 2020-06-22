<?php
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $array = [];
        array_push($array, $_POST["start"]);
        array_push($array, $_POST["end"]);
    }
?>