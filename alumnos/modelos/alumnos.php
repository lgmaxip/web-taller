<?php
    // importo la clase conexion
    require_once "modelos/conexion.php";
    class alumnos{
        public function agregar($datos){
            $conexionClass = new conexion();
            $conexion = $conexionClass->conectar();
            $nombre = $datos["nombre"]; 
            $apellido = $datos["apellido"];
            $dni = $datos["dni"];
            $existencia = "SELECT * FROM dato_alumno WHERE nombre='$nombre' and apellido='$apellido' and dni='$dni'";
        
            if($verificacion = $conexion->query($existencia)){
                $numeroRegistros = mysqli_num_rows($verificacion);
                if($numeroRegistros>0){
                    return 0;
                }else {
                    // si no existe el autor se procederá a insertarlo en la base de datos
                    $ingreso = "INSERT INTO dato_alumno (apellido,nombre,dni)
                    VALUES ('$apellido','$nombre','$dni')";
                    $realizar_ingreso = $conexion->query($ingreso);
                
                    $existencia = "SELECT * FROM dato_alumno WHERE nombre='$nombre' and apellido='$apellido' and dni='$dni'";
                    if($verificacion = $conexion->query($existencia)){
                        $numeroRegistros  = mysqli_num_rows($verificacion);
                        if($numeroRegistros>0){
                            return 1;
                        }
                    }else {
                        return -1;
                    }
                    
                }
            }
            $conexion->close();
        }

        public function buscar(){
            $conexionClass = new Conexion();
            $conexion = $conexionClass->conectar();
            //Recibo variable de session que contiene la palabra de referecia a buscar
            //$datos = $_SESSION['datoBuscar'];

                /*
                    Este archivo muestra una tabla con todos los autores que contengan
                    el valor de la variable $datos que existen en la base de datos,
                mostrando de cada uno su nombre y apellido junto a los
                    botones de modificar y eliminar, junto a todos estos datos esta presente
                    pero oculto en un input el ID de cada autor. Este ID será necesario para
                    realizar las operaciones posteriores de eliminar o modificar un autor.
                    */

            //Consulto los similares a $datos
            $consulta= "SELECT * FROM dato_alumno";

            $resultado = $conexion->query($consulta);
            //Consigo la cantidad de autores a mostrar
            $cantRegistros = $resultado->num_rows;
            if($cantRegistros!=0){
                return $resultado;
            }
            else{
                //Devuelvo los autores encontrados
                return 0;
            }
            $conexion->close();
        }

        public function eliminar($id){
            $conexionClass = new Conexion();
            $conexion = $conexionClass->conectar();

            //Variable recibida por metodo post desde autor_mostrarTodos.php o desde autor_filtrado.php 	
            $id_eliminar = $id;
            $eliminar = "DELETE FROM dato_alumno WHERE id_alumno='$id_eliminar'";
            $realizar_query = $conexion->query($eliminar);
            $busqueda = "SELECT * FROM dato_alumno WHERE id_alumno = '$id_eliminar'";
            $verificacion = $conexion->query($busqueda);
            $res = $verificacion->num_rows;
            if($res <= 0){
                return 1;
            }
            else{
                return 0;
            }
            $conexion->close();
        }

        public function buscarX($id){
            $conexionClass = new Conexion();
            $conexion = $conexionClass->conectar();

            $consulta= "SELECT * FROM dato_alumno WHERE id_alumno LIKE '%$id%'";

            $resultado = $conexion->query($consulta);
            //Consigo la cantidad de autores a mostrar
            $cantRegistros = $resultado->num_rows;
            if($cantRegistros==0){
                return 0;
            }else{
                
                return $resultado;
            }
            
            $conexion->close();
        }

        public function actualizar($alumno){
            
             $conexionClass = new Conexion();
             $conexion = $conexionClass->conectar();
            
             $id = $alumno['id'];
             $Nombre  = $alumno['nombre'];
             $Apellido = $alumno['apellido'];
            $dni = $alumno['dni'];
          
            if(isset($id)){
             $consulta="UPDATE dato_alumno SET apellido='$Apellido', nombre='$Nombre', dni='$dni'  WHERE id_alumno='$id'";
            $realizar_consulta=$conexion->query($consulta);
             if($realizar_consulta){
                echo "<script language='javascript'>alert('Alumno actualizado, se redireccionará al inicio :) ')</script>";
                echo "<script language='javascript'>window.location='index.php'</script>";
                return 1;
             }else{
             return 0;
             }
            
        }
    }
}
    ?>