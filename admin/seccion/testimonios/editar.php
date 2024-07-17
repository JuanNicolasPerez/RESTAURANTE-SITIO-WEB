<?php 

    include("../../bd.php");

    if (isset($_GET['txtID'])) {

        $txtID = (isset($_GET['txtID'])) ? $_GET['txtID']:"";

        $sentencia = $conexion->prepare("SELECT * FROM 
                                            tbl_testimonios 
                                        WHERE 
                                            ID = :id");
        $sentencia->bindParam(":id",$txtID);
        $sentencia->execute();

        $registro = $sentencia->fetch(PDO::FETCH_LAZY);

        $opinion =$registro['opinion'];
        $nombrecompleto =$registro['nombrecompleto'];

    }

    if ($_POST) {
        $opinion = (isset($_POST['opinion'])) ? $_POST['opinion'] : "";
        $nombrecompleto = (isset($_POST['nombrecompleto'])) ? $_POST['nombrecompleto'] : "";
        $txtID = (isset($_POST['txtID'])) ? $_POST['txtID']:"";

        $sentencia = $conexion -> prepare(" UPDATE tbl_testimonios 
                                            SET 
                                                opinion = :opinion, 
                                                nombrecompleto = :nombrecompleto
                                            WHERE 
                                                ID = :id");

        $sentencia->bindParam(":opinion",$opinion);
        $sentencia->bindParam(":nombrecompleto",$nombrecompleto);
        $sentencia->bindParam(":id",$txtID);
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
                <label for="txtID" class="form-label">ID: </label>
                <input type="text" class="form-control" value="<?php echo $txtID; ?>" name="txtID" id="txtID" aria-describedby="helpId" readonly/>
            </div>

            <div class="mb-3">
                <label for="opinion" class="form-label">Opinion: </label>
                <input type="text" class="form-control" value="<?php echo $opinion; ?>" name="opinion" id="opinion" aria-describedby="helpId" placeholder="Escribe la Opinion" />
            </div>

            <div class="mb-3">
                <label for="nombrecompleto" class="form-label">Nombre Completo: </label>
                <input type="text" class="form-control" value="<?php echo $nombrecompleto; ?>" name="nombrecompleto" id="nombrecompleto" aria-describedby="helpId" placeholder="Escribe el Nombre Completo" />
            </div>

            <button type="submit" class="btn btn-success">Modificar Testimonio</button>

            <a name="" id="" class="btn btn-primary" href="index.php" role="button">Cancelar</a>

        </form>

    </div>
</div>


<?php include("../../templates/footer.php"); ?>