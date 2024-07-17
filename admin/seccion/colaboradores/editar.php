<?php

include("../../bd.php");

if ($_POST) {

    $txtID = (isset($_POST['txtID'])) ? $_POST['txtID'] : "";
    $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
    $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
    $linkFacebook = (isset($_POST['linkFacebook'])) ? $_POST['linkFacebook'] : "";
    $linkInstagram = (isset($_POST['linkInstagram'])) ? $_POST['linkInstagram'] : "";
    $linkLinkedin = (isset($_POST['linkLinkedin'])) ? $_POST['linkLinkedin'] : "";

    // PROCESO DE ACTUALIZAR LA FOTO
    $foto = (isset($_FILES['foto']['name'])) ? $_FILES['foto']['name'] : "";
    $tmp_foto = $_FILES['foto']['tmp_name'];

    if ($foto != "") {
        $fecha_foto = new DateTime();
        $nombre_foto = $fecha_foto->getTimestamp() . "_" . $foto;

        move_uploaded_file($tmp_foto, "../../../img/team/" . $nombre_foto);

        // SELECCIONAR Y BORRAR LA IMAGEN EN LA CARPETA
        $sentencia = $conexion->prepare(" SELECT * FROM 
                                            `tbl_colaboradores` 
                                        WHERE 
                                            ID = :id");
        $sentencia->bindParam(":id", $txtID);
        $sentencia->execute();

        $registro_foto = $sentencia->fetch(PDO::FETCH_LAZY);

        if (isset($registro_foto['foto'])) {
            if (file_exists("../../../img/team/" . $registro_foto['foto'])) {
                unlink("../../../img/team/" . $registro_foto['foto']);
            }
        }

        $sentencia = $conexion->prepare("   UPDATE 
                                                `tbl_colaboradores` 
                                            SET         
                                                foto = :foto 
                                            WHERE 
                                            ID = :id");

        $sentencia->bindParam(":foto", $nombre_foto);
        $sentencia->bindParam(":id", $txtID);

        $sentencia->execute();

    }

    $sentencia = $conexion->prepare("   UPDATE 
                                            `tbl_colaboradores` 
                                        SET         
                                            titulo = :titulo, 
                                            descripcion = :descripcion, 
                                            linkfacebook = :linkfacebook,
                                            linkinstagram = :linkinstagram,
                                            linklinkedin = :linklinkedin 
                                        WHERE 
                                        ID = :id");

    $sentencia->bindParam(":titulo", $titulo);
    $sentencia->bindParam(":descripcion", $descripcion);
    $sentencia->bindParam(":linkfacebook", $linkFacebook);
    $sentencia->bindParam(":linkinstagram", $linkInstagram);
    $sentencia->bindParam(":linklinkedin", $linkLinkedin);
    $sentencia->bindParam(":id", $txtID);

    $sentencia->execute();

    header("Location:index.php");
}

if (isset($_GET['txtID'])) {

    $txtID = (isset($_GET['txtID'])) ? $_GET['txtID'] : "";

    $sentencia = $conexion->prepare("SELECT * FROM tbl_colaboradores WHERE ID = :id");
    $sentencia->bindParam(":id", $txtID);
    $sentencia->execute();

    $registro = $sentencia->fetch(PDO::FETCH_LAZY);

    $titulo = $registro['titulo'];
    $descripcion = $registro['descripcion'];
    $linkFacebook = $registro['linkfacebook'];
    $linkInstagram = $registro['linkinstagram'];
    $linkLinkedin = $registro['linklinkedin'];
    $foto = $registro['foto'];
}
include("../../templates/header.php");

?>

<div class="card">
    <div class="card-header">Colaboradores</div>

    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="txtID" class="form-label">ID: </label>
                <input type="number" readonly class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" aria-describedby="helpId" placeholder="Escribe el titulo del Banners" />
            </div>

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo: </label>
                <input type="text" class="form-control" value="<?php echo $titulo; ?>" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Escribe el titulo del Banners" />
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion: </label>
                <input type="text" class="form-control" value="<?php echo $descripcion; ?>" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Escribe el titulo de la descripcion" />
            </div>

            <div class="mb-3">
                <label for="linkFacebook" class="form-label">Link Facebook: </label>
                <input type="text" class="form-control" value="<?php echo $linkFacebook; ?>" name="linkFacebook" id="linkFacebook" aria-describedby="helpId" placeholder="Escriba el enlace" />
            </div>

            <div class="mb-3">
                <label for="linkInstagran" class="form-label">Link Instagran: </label>
                <input type="text" class="form-control" value="<?php echo $linkInstagram; ?>" name="linkInstagram" id="linkInstagran" aria-describedby="helpId" placeholder="Escriba el enlace" />
            </div>

            <div class="mb-3">
                <label for="linkLinkedin" class="form-label">Link Linkedin: </label>
                <input type="text" class="form-control" value="<?php echo $linkLinkedin; ?>" name="linkLinkedin" id="linkLinkedin" aria-describedby="helpId" placeholder="Escriba el enlace" />
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto: </label><br>
                <img src="../../../img/team/<?php echo $foto; ?>" width="80" alt=""><br /><br />
                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="Ingrese la foto" />
            </div>

            <button type="submit" class="btn btn-success">Modificar Chefs</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>

    </div>
</div>


<?php include("../../templates/footer.php"); ?>