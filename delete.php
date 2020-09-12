<?php

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "DELETE FROM productos WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (!result) {
            die("Error de conexión");
        }

        $_SESSION['message'] = 'Producto eliminado correctamente';
        $_SESSION['message_type'] = 'danger';

        header("Location: ./");
    }