<?php

include("db.php");

if (isset($_POST['save'])) {

    $producto = $_POST['producto'];
    $proovedor = $_POST['proovedor'];
    $marca = $_POST['marca'];
    $stock = $_POST['stock'];
    
    $query = "INSERT INTO productos(producto, proovedor, marca, stock) VALUE ('$producto','$proovedor','$marca','$stock')";
    $result = mysqli_query($conn, $query);
    if (!$result) {
        die("Error de conexión");
    } 

    $_SESSION['message'] = 'Tarea guardada correctamente';
    $_SESSION['message_type'] = 'success';

    header("Location: ./");
}