<?php 

    include("../../bd.php");

    if (isset($_GET['txtID'])) {

        $txtID = (isset($_GET['txtID'])) ? $_GET['txtID']:"";

        $sentencia = $conexion->prepare("SELECT * FROM 
                                            tbl_menu 
                                        WHERE 
                                            ID = :id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();

        $registro = $sentencia->fetch(PDO::FETCH_LAZY);

        $nombre = $registro['nombre'];
        $ingredientes = $registro['ingredientes'];
        $precio = $registro['precio'];

    }

    // if ($_POST) {
    //     $opinion = (isset($_POST['opinion'])) ? $_POST['opinion'] : "";
    //     $nombrecompleto = (isset($_POST['nombrecompleto'])) ? $_POST['nombrecompleto'] : "";
    //     $txtID = (isset($_POST['txtID'])) ? $_POST['txtID']:"";

    //     $sentencia = $conexion -> prepare(" UPDATE tbl_testimonios 
    //                                         SET 
    //                                             opinion = :opinion, 
    //                                             nombrecompleto = :nombrecompleto
    //                                         WHERE 
    //                                             ID = :id");

    //     $sentencia->bindParam(":opinion",$opinion);
    //     $sentencia->bindParam(":nombrecompleto",$nombrecompleto);
    //     $sentencia->bindParam(":id",$txtID);
    //     $sentencia->execute();

    //     header("Location:index.php");

    // }

    include("../../templates/header.php"); 

?>

<div class="card">
    <div class="card-header">Testimonios</div>

    <div class="card-body">

        <form action="" method="post">
            <div class="mb-3">
                <label for="txtID" class="form-label">ID: </label>
                <input type="text" class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" aria-describedby="helpId" readonly/>
            </div>

            <div class="mb-3">
                <label for="nombre" class="form-label">Nombre: </label>
                <input type="text" class="form-control" value="<?php echo $nombre; ?>" name="nombre" id="nombre" aria-describedby="helpId" placeholder="Escribe el nombre" />
            </div>

            <div class="mb-3">
                <label for="ingredientes" class="form-label"> Ingredientes: </label>
                <input type="text" class="form-control" value="<?php echo $ingredientes; ?>" name="ingredientes" id="ingredientes" aria-describedby="helpId" placeholder="Escribe los ingredientes" />
            </div>

            <div class="mb-3">
                <label for="categoria" class="form-label"> Categoria: </label>
                <select class="btn btn-button btn-primary">
                    <option value="0">Seleccionar</option>
                    <?php 
                        foreach ($lista_categorias as $value) {
                    ?>
                            <option value="<?php echo $value['ID']; ?>"><?php echo $value['categoria']; ?></option>
                    <?php
                        }
                    ?>
                </select>
            </div>

            <div class="mb-3">
                <label for="precio" class="form-label"> Precio: </label>
                <input type="text" class="form-control" value="<?php echo $precio; ?>" name="precio" id="precio" aria-describedby="helpId" placeholder="Escribe el precio" />
            </div>

            <button type="submit" class="btn btn-success">Modificar Menu</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>

    </div>
</div>


<?php include("../../templates/footer.php"); ?>