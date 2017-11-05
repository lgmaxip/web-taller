<?php
    require_once "controladores/alumnoController.php";
// instancio un objeto de tipo autorcontroller y lueo llamo al metodo
    $alumnos = new alumnoController();
    $resultado = $alumnos->buscarAlumnos();
?>
<link href="css/bootstrap.css" rel="stylesheet">
<div class="col-sm-6">
<!-- cada uno de los campos para la vista -->
    <h2 >Datos del Alumno </h2>
    <!-- method puede ser get o post son las formas de enviar los datos, get me los muestra lo que mando y post no -->
    <form id="myForm" method="POST">
        <input type="hidden" name="id_modificar" value="<?php echo $resultado["id_alumno"]?>">
        <div class="input-group">
            <label>Apellido del Alumno:</label>
            <!-- type puede ser de tipo number, password, email -->
            <!-- class me toma el estilo de bootstrap -->
            <!-- placeholder me muestra un ejemplo dentro del casillero antes de lenar -->
            <input type="text" class="form-control" name="apeAlumno" placeholder="Apellido" value="<?php echo $resultado["apellido"];?>">
        </div>
        <br>
        <div class="input-group">
            <label>Nombre del Alumno:</label>

            <input type="text" class="form-control" name="nomAlumno" placeholder="Nombre"  value="<?php echo $resultado["nombre"];?>">
        </div>
        <br>
        <div class="input-group">
            <label>D.N.I del Alumno:</label>

            <input type="text" class="form-control" name="dniAlumno" placeholder="dni"  value="<?php echo $resultado["dni"];?>">
        </div>
        <br>
        <!-- clase del boton de bootstrap -->
        <div class="btn-group">
            <!-- Enviar El Formulario -->
            <!-- btn-success es el color del boton, hay diferentes colores -->
            <button class="btn btn-success" type="submit" >Guardar</button>
        </div>
    </form>
</div>
<?php
$alumno=$alumnos->actualizarAlumno();
?>