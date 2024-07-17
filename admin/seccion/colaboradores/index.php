<?php

include("../../bd.php");

// SELECIONAR COLABORADORES POR GET PARA ELIMINAR
if (isset($_GET['txtID'])) {

    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID']:"";

    // SELECCIONAR Y BORRAR LA IMAGEN EN LA CARPETA
    $sentencia = $conexion -> prepare(" SELECT * FROM 
                                            `tbl_colaboradores` 
                                        WHERE 
                                            ID = :id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

    $registro_foto = $sentencia -> fetch(PDO::FETCH_LAZY);

    if(isset($registro_foto['foto'])){
        if (file_exists("../../../img/team/".$registro_foto['foto'])) {
            unlink("../../../img/team/".$registro_foto['foto']);
        }
    }


    // BORRAR COLABORADORES
    $sentencia = $conexion -> prepare(" DELETE FROM 
                                            `tbl_colaboradores` 
                                        WHERE 
                                            ID = :id");
    $sentencia->bindParam(":id",$txtID);
    $sentencia->execute();

    header("Location:index.php");
}

// MOSTRAR COLABORADORES
$sentencia = $conexion -> prepare("SELECT * FROM tbl_colaboradores");
$sentencia -> execute();

$lista_colaboradores = $sentencia -> fetchAll(PDO::FETCH_ASSOC);


include("../../templates/header.php");

?>

<div class="card">
    <div class="card-header">
        <a name="" id="" class="btn btn-primary" href="crear.php" role="button">Agregar Chefs</a>
    </div>

    <div class="card-body">

        <div class="table-responsive">
            <table class="table ">

                <thead>
                    <tr>		
                        <th scope="col">ID</th>
                        <th scope="col">Titulo</th>
                        <th scope="col">Foto</th>
                        <th scope="col">Descripcion</th>
                        <th scope="col">Link Red Social</th>
                        <th scope="col">Acciones</th>
                        
                    </tr>
                </thead>

                <tbody>

                    <?php
                    foreach ($lista_colaboradores as $key => $value) {
                    ?>
                        <tr class="">
                            <td scope="row"><?php echo $value['ID']; ?></td>
                            <td><?php echo $value['titulo']; ?></td>

                            <td>
                                <img src="../../../img/team/<?php echo $value['foto']; ?>" width="80" alt="Chefs">
                            </td>

                            <td><?php echo $value['descripcion']; ?></td>

                            <td>
                                <?php echo $value['linkfacebook']; ?><br/>
                                <?php echo $value['linkinstagram']; ?><br/>
                                <?php echo $value['linklinkedin']; ?>
                            </td>

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




<?php include("../../templates/footer.php"); ?>