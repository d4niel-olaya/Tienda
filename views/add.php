<?php

session_start();
array_push($_SESSION['compras'], [$_GET['id'], $_GET['cantidad']]);
// var_dump($_REQUEST);
header('Location:productos.php');