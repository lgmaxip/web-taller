<?php
    class Conexion{
        
        public function conectar(){
            $host = "localhost";
            $usuario = "root";
            $password = "root";
            $bd = "alumnos";
    
            $conectar = new mysqli($host,$usuario,$password,$bd);
            return $conectar;
        }
    }
    
        
 ?>