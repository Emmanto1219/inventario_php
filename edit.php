<?php

    include("db.php");

    if (isset($_GET['id'])) {
        $id = $_GET['id'];
        $query = "SELECT * FROM productos WHERE id = $id";
        $result = mysqli_query($conn, $query);
        if (mysqli_num_rows($result) == 1) {
            $row = mysqli_fetch_array($result);
            $producto = $row['producto'];
            $proovedor = $row['proovedor'];
            $marca = $row['marca'];
            $stock = $row['stock'];
        }

    }

    if (isset($_POST['update'])) {
        $id = $_GET['id'];
        $producto = $_POST['producto'];
        $proovedor = $_POST['proovedor'];
        $marca = $_POST['marca'];
        $stock = $_POST['stock'];
        
        
        $query = "UPDATE productos set producto = '$producto', proovedor = '$proovedor', marca = '$marca', stock = '$stock' WHERE id = $id";
        mysqli_query($conn, $query);
    
        $_SESSION['message'] = 'Tarea editada correctamente';
        $_SESSION['message_type'] = 'primary';
    
        header("Location: ./");
    }

?>

<?php include("includes/header.php") ?>

<div class="containder p-4">
    <div class="row">
        <div class="col-md-4 mx-auto">
            <div class="card card-body">
            <form action="edit.php?id=<?= $_GET['id']; ?>" method="POST">
                    <div class="form-group">
                        <input type="text" name="producto" class="form-control" placeholder="Producto" autofocus autocomplete="off" value="<?= $producto?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="proovedor" class="form-control" placeholder="Proovedor" autofocus
                            autocomplete="off" value="<?= $proovedor?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="marca" class="form-control" placeholder="Marca" autofocus
                            autocomplete="off" value="<?= $marca?>">
                    </div>
                    <div class="form-group">
                        <input type="text" name="stock" class="form-control" placeholder="Stock" autofocus
                            autocomplete="off" value="<?= $stock?>">
                    </div>
                    <input type="submit" value="Guardar" class="btn btn-success btn-block" name="update">
                </form>
            </div>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>