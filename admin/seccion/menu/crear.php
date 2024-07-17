<?php 

    include("../../bd.php");

    if ($_POST) {
        $opinion = (isset($_POST['opinion'])) ? $_POST['opinion'] : "";
        $nombrecompleto = (isset($_POST['nombrecompleto'])) ? $_POST['nombrecompleto'] : "";

        $sentencia = $conexion -> prepare(" INSERT INTO tbl_testimonios 
                                                    (ID, 
                                                    opinion, 
                                                    nombrecompleto) 
                                            VALUES (
                                                NULL, 
                                                :opinion, 
                                                :nombrecompleto);");

        $sentencia->bindParam(":opinion",$opinion);
        $sentencia->bindParam(":nombrecompleto",$nombrecompleto);
        $sentencia->execute();

        header("Location:index.php");

    }

    include("../../templates/header.php"); 

?>

<div class="card">
    <div class="card-header">Testimonios</div>

    <div class="card-body">

        <form action="" method="post">

            <div class="mb-3">
                <label for="opinion" class="form-label">Opinion: </label>
                <input type="text" class="form-control" name="opinion" id="opinion" aria-describedby="helpId" placeholder="Escribe la Opinion" />
            </div>

            <div class="mb-3">
                <label for="nombrecompleto" class="form-label">Nombre Completo: </label>
                <input type="text" class="form-control" name="nombrecompleto" id="nombrecompleto" aria-describedby="helpId" placeholder="Escribe el Nombre Completo" />
            </div>

            <button type="submit" class="btn btn-success">Crear Testimonio</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>

    </div>
</div>


<?php include("../../templates/footer.php"); ?>