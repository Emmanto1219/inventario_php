<?php include("db.php") ?>

<?php include("includes/header.php") ?>

<div class="container p-4">
    <div class="row">
        <div class="col-md-4">

            <?php
                if (isset($_SESSION['message'])) {
            ?>

            <div class="alert alert-<?= $_SESSION['message_type'] ?> alert-dismissible fade show" role="alert">
                <?= $_SESSION['message'] ?>
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>

            <?php
                session_unset(); }
            ?>

            <div class="card card-body">
                <form action="save.php" method="POST">
                    <div class="form-group">
                        <input type="text" name="producto" class="form-control" placeholder="Producto" autofocus
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="proovedor" class="form-control" placeholder="Proovedor" autofocus
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="marca" class="form-control" placeholder="Marca" autofocus
                            autocomplete="off">
                    </div>
                    <div class="form-group">
                        <input type="text" name="stock" class="form-control" placeholder="Stock" autofocus
                            autocomplete="off">
                    </div>
                    <input type="submit" value="Guardar" class="btn btn-success btn-block" name="save">
                </form>
            </div>
        </div>

        <div class="col-md-8">
            <table class="table table-bordered">
                <thead>
                    <tr>
                        <th>Producto</th>
                        <th>Proovedor</th>
                        <th>Marca</th>
                        <th>Stock</th>
                        <th>Acciones</th>
                    </tr>
                </thead>
                <tbody>
                    <?php 
                    $query = "SELECT * FROM productos";
                    $result_tasks = mysqli_query($conn, $query);
                    
                    while ($row = mysqli_fetch_array($result_tasks)) { ?>
                    
                        <tr>
                            <td><?php echo $row['producto']; ?></td>
                            <td><?php echo $row['proovedor']; ?></td>
                            <td><?php echo $row['marca']; ?></td>
                            <td><?php echo $row['stock']; ?></td>
                            <td>
                                <a href="edit.php?id=<?= $row['id'] ?>" class="btn btn-primary">
                                <i class="fas fa-marker"></i>
                                </a>
                                <a href="delete.php?id=<?= $row['id'] ?>" class="btn btn-danger">
                                    <i class="far fa-trash-alt"></i>
                                </a>
                            </td>
                        </tr>

                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php include("includes/footer.php") ?>