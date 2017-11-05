<?php
    // como que importo el modelo de autor o como importar una clase
    require_once "modelos/alumnos.php";
    
    class alumnoController{

        public function guardarAlumno(){
            // isset lo que hace es controlar que no este vacios esas variables
            if(isset($_POST["nomAlumno"]) && isset($_POST["apeAlumno"]) && isset($_POST["dniAlumno"])){
                
                $nombre = $_POST["nomAlumno"]; 
                $apellido = $_POST["apeAlumno"]; 
                $dni = $_POST["dniAlumno"];
                // es un arreglo de posicion valor
                $datos = array("nombre"=>$nombre, "apellido"=>$apellido, "dni"=>$dni);
                //var_dump($datos);die();
                // instacio autor para agregar en la base de datos
                $res = alumnos::agregar($datos);
                if($res>=0){
                    if($res==0){
                            //ya existe y echo es la forma de mostrar por pantalla como un cartelito
                        echo "<script language='javascript'>alert('El autor ya existe, no se puede ingresar un autor ya existente.');</script>";
                        // redirecciona a la pagina index para volver a ingresar en todo caso
                        echo "<script language='javascript'>window.location='index.php'</script>";
                    }
                    else{
                        // en el caso que no exista
                        //=1
                        echo "<script language='javascript'>alert('El alumnos se añadió correctamente.')</script>";
                        echo "<script language='javascript'>window.location='index.php'</script>";
                    }
                }else{
                    // en el caso que surja un error, es decir que no existia y no se agrego tampoco
                    // = -1
                    echo "<script language='javascript'>alert('Error al añadir alumno, intente nuevamente...')</script>";
                    echo "<script language='javascript'>window.location='index.php'</script>";
                }
            }

        }
        
        public function ListarAlumnos(){
            $respuesta = alumnos::buscar();
            if($respuesta!=NULL){
                return $respuesta;
            }else{
                echo "<script language='javascript'>alert('No existen alumnos')</script>";
            }
        }

        public function eliminar(){
            if(isset($_POST['id_a'])){
                $idAlumno = $_POST['id_a'];
                $res = alumnos::eliminar($idAlumno);
                if($res>0){
                    echo "<script language='javascript'>alert('Se elimino correctamente el alumno, se redireccionará a la página principal')</script>";
                    echo "<script language='javascript'>window.location='index.php'</script>";
                }else{
                    echo "<script language='javascript'>alert('No se pudo eliminar el alumno, intente nuevamente')</script>";
                    echo "<script language='javascript'>window.location='index.php'</script>";
                }
            }
        }

        public function buscarAlumnos(){
            if(isset($_POST["id_a"])){
                $id = $_POST["id_a"];
                $res = alumnos::buscarX($id);
                $array = $res->fetch_assoc();
                if($res==NULL){
                    echo "<script language='javascript'>alert('No existe')</script>";
                    echo "<script language='javascript'>window.location='index.php'</script>";
                }else{
                    return $array;
                }
            }
        }

        public function actualizarAlumno(){
            if(isset($_POST["id_modificar"])){
                $id = $_POST["id_modificar"];
                $nombre = $_POST["nomAlumno"]; 
                $apellido = $_POST["apeAlumno"]; 
                $dni = $_POST["dniAlumno"]; 

                $alumnoNuevo = array("id"=> $id,
                                    "nombre"=>$nombre,
                                    "apellido"=>$apellido,
                                    "dni"=>$dni);
                //var_dump($autorNuevo);die();exit();                                    
                $res = alumnos::actualizar($alumnoNuevo);
                echo $res;
            }
        }

    }
    ?>