
<?php
    require_once "controladores/alumnoController.php";
// instancio un objeto de tipo autorcontroller y lueo llamo al metodo
    $alumno = new alumnoController();
    $alumno->guardarAlumno();
?>
<link href="css/bootstrap.css" rel="stylesheet">
<div class="col-sm-6">
<!-- cada uno de los campos para la vista -->
    <h2 >Datos del Alumno </h2>
    <!-- method puede ser get o post son las formas de enviar los datos, get me los muestra lo que mando y post no -->
    <form id="myForm" method="POST">
        <div class="input-group">
            <label>Nombre del Alumno:</label>

            <input type="text" class="form-control" name="nomAlumno" placeholder="Nombre"  value="">
        </div>
        <br>
        <div class="input-group">
            <label>Apellido del Alumno:</label>
            <!-- type puede ser de tipo number, password, email -->
            <!-- class me toma el estilo de bootstrap -->
            <!-- placeholder me muestra un ejemplo dentro del casillero antes de lenar -->
            <input type="text" class="form-control" name="apeAlumno" placeholder="Apellido" value="">
        </div>
        <br>
        <div class="input-group">
            <label>D.N.I del Alumno:</label>

            <input type="text" class="form-control" name="dniAlumno" placeholder="dni"  value="">
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