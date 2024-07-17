<?php

include("../../bd.php");

// BORRAR MENU
// if (isset($_GET['txtID'])) {

//     $txtID = (isset($_GET['txtID'])) ? $_GET['txtID']:"";

//     $sentencia = $conexion -> prepare(" DELETE FROM 
//                                             tbl_menu 
//                                         WHERE 
//                                             ID = :id");

//     $sentencia->bindParam(":id",$txtID);
//     $sentencia->execute();

//     header("Location:index.php");
// }

// MOSTRAR MENU
$sentencia = $conexion -> prepare("SELECT * FROM tbl_menu");
$sentencia -> execute();

$lista_menu = $sentencia -> fetchAll(PDO::FETCH_ASSOC);

// MOSTRAR CATEGORIAS
$sentencia = $conexion -> prepare("SELECT * FROM tbl_categorias_menu");
$sentencia -> execute();

$lista_categorias = $sentencia -> fetchAll(PDO::FETCH_ASSOC);

include("../../templates/header.php");

?>
<!-- INSERT INTO `tbl_menu` (`ID`, `ID_categoria`, `nombre`, `ingredientes`, `foto`, `precio`) VALUES (NULL, '1', 'Pizza Muzzarela', 'Pre pizza, Queso, Salsa Tomate, Oregano. ', '', '5000'); -->
<div class="card">
    <div class="card-header">

        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Menu</a>

    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table ">

                <thead>
                    <tr>
                        <th scope="col">ID</th>
                        <th scope="col">Nombre</th>
                        <th scope="col">Ingredientes</th>
                        <th scope="col">Categoria</th>
                        <th scope="col">Precio</th>
                        <th scope="col">Acciones</th>
                    </tr>
                </thead>

                <tbody>

                <?php
                    foreach ($lista_menu as $key => $value) {
                ?>
                        <tr class="">
                            <td scope="row"><?php echo $value['ID']; ?></td>
                            <td><?php echo $value['nombre']; ?></td>
                            <td><?php echo $value['ingredientes']; ?></td>
                            <td>
                                <select class="btn btn-button btn-primary">
                                    <option value="0">Seleccionar</option>
                                    <?php 
                                        foreach ($lista_categorias as $value_cat) {
                                    ?>
                                            <option value="<?php echo $value_cat['ID']; ?>"><?php echo $value_cat['categoria']; ?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                            </td>

                            <!-- <td><?php echo $value['precio']; ?></td> -->

                            <td>
                                <a name="" id="" class="btn btn-primary" href="editar.php?txtID=<?php echo $value['ID']; ?>" role="button">Editar</a>
                                <a name="" id="" class="btn btn-danger" href="index.php?txtID=<?php echo $value['ID']; ?>" role="button">Borrar</a>
                            </td>
                        </tr>
                <?php
                    }
                ?>
                </tbody>
            </table>
        </div>


    </div>

</div>
