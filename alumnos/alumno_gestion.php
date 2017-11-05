<?php
    require_once "controladores/alumnoController.php";
    $alumnos=new alumnoController();
    $resultado=$alumnos ->ListarAlumnos();
?>

<link href="css/bootstrap.css" rel="stylesheet">
<div>
    <table class="table table-condensed">
         <thead>
             <tr> 
                <!-- cada encabezado de la tabla, es decir el nombre de las columnas -->
                 <th>Apellido</th> 
                 <th>Nombre</th>
                 <th>D.N.I</th>
            </tr> 
        </thead> 
                <!-- el cuerpo de la tabla -->
            <!-- <tr class="active"> -->
                <!-- <td>Gomez</td> -->
                <!-- <td>Ana</td> -->
            <!-- </tr> -->
            <!-- <tr class="danger"> -->
                <!-- <td>Ponce</td> -->
                <!-- <td>Maxi</td> -->
            <!-- </tr> -->
            <!-- <tr class="warning"> -->
                <!-- <td>Gerez</td> -->
                <!-- <td>Ana</td> -->
            <!-- </tr> -->
        <tbody>
            <?php
                while($array=$resultado ->fetch_assoc()){ ?>
                    <tr>
                        <td><?php echo $array["apellido"];?></td>
                        <td><?php echo $array["nombre"];?></td>
                        <td><?php echo $array["dni"];?></td>
                            <td> 
                                <form method="POST">
                                <input type="hidden" name="id_a" id="id_a" value="<?php echo $array["id_alumno"];?>">
                                <input type="button" value="modificar" class="btn btn-warning" onclick="this.form.action='alumno_update.php';this.form.submit()">
                                <input type="button" value="eliminar" class="btn btn-danger" onclick="this.form.submit()">
                                </form>
                            </td>
                        </tr>
                <?php } ?>
                
        </tbody>
    </table>
</div>
<?php
$resultado=$alumnos ->eliminar();
?>