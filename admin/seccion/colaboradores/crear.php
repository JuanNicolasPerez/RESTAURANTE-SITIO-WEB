<?php 

    include("../../bd.php");

    if ($_POST) {
        $titulo = (isset($_POST['titulo'])) ? $_POST['titulo'] : "";
        $descripcion = (isset($_POST['descripcion'])) ? $_POST['descripcion'] : "";
        $linkFacebook = (isset($_POST['linkFacebook'])) ? $_POST['linkFacebook'] : "";
        $linkInstagram = (isset($_POST['linkInstagram'])) ? $_POST['linkInstagram'] : "";
        $linkLinkedin = (isset($_POST['linkLinkedin'])) ? $_POST['linkLinkedin'] : "";

        $foto = (isset($_FILES['foto']['name'])) ? $_FILES['foto']['name'] : "";
        $fecha_foto =new DateTime();
        $nombre_foto = $fecha_foto -> getTimestamp()."_".$foto;
        $tmp_foto = $_FILES['foto']['tmp_name'];

        if($tmp_foto != ""){
            move_uploaded_file($tmp_foto,"../../../img/team/".$nombre_foto);
        }

        $sentencia = $conexion -> prepare(" INSERT INTO `tbl_colaboradores` 
                                                (`ID`, 
                                                `titulo`, 
                                                `descripcion`, 
                                                `linkfacebook`, 
                                                `linkinstagram`, 
                                                `linklinkedin`,
                                                `foto`) 
                                            VALUES (NULL, 
                                                    :titulo, 
                                                    :descripcion, 
                                                    :linkfacebook, 
                                                    :linkinstagram, 
                                                    :linklinkedin,
                                                    :foto);");

        $sentencia->bindParam(":titulo",$titulo);
        $sentencia->bindParam(":descripcion",$descripcion);
        $sentencia->bindParam(":linkfacebook",$linkFacebook);
        $sentencia->bindParam(":linkinstagram",$linkInstagram);
        $sentencia->bindParam(":linklinkedin",$linkLinkedin);
        $sentencia->bindParam(":foto",$nombre_foto);
        $sentencia->execute();

        header("Location:index.php");

    }

    include("../../templates/header.php"); 

?>

<div class="card">
    <div class="card-header"> Colaboradores </div>

    <div class="card-body">

        <form action="" method="post" enctype="multipart/form-data">

            <div class="mb-3">
                <label for="titulo" class="form-label">Titulo: </label>
                <input type="text" class="form-control" name="titulo" id="titulo" aria-describedby="helpId" placeholder="Escribe el titulo del Banners" />
            </div>

            <div class="mb-3">
                <label for="descripcion" class="form-label">Descripcion: </label>
                <input type="text" class="form-control" name="descripcion" id="descripcion" aria-describedby="helpId" placeholder="Escribe el titulo de la descripcion" />
            </div>

            <div class="mb-3">
                <label for="linkFacebook" class="form-label">Link Facebook: </label>
                <input type="text" class="form-control" name="linkFacebook" id="linkFacebook" aria-describedby="helpId" placeholder="Escriba el enlace" />
            </div>

            <div class="mb-3">
                <label for="linkInstagran" class="form-label">Link Instagran: </label>
                <input type="text" class="form-control" name="linkInstagram" id="linkInstagran" aria-describedby="helpId" placeholder="Escriba el enlace" />
            </div>

            <div class="mb-3">
                <label for="linkLinkedin" class="form-label">Link Linkedin: </label>
                <input type="text" class="form-control" name="linkLinkedin" id="linkLinkedin" aria-describedby="helpId" placeholder="Escriba el enlace" />
            </div>

            <div class="mb-3">
                <label for="foto" class="form-label">Foto: </label>
                <input type="file" class="form-control" name="foto" id="foto" aria-describedby="helpId" placeholder="Ingrese la foto" />
            </div>

            <button type="submit" class="btn btn-success">Crear Chefs</button>
            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>

    </div>
</div>


<?php include("../../templates/footer.php"); ?>