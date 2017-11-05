CREATE DATABASE alumnos;
USE alumnos;
CREATE TABLE dato_alumno (
    id_alumno INT AUTO_INCREMENT,
    nombre VARCHAR(45),
    apellido VARCHAR(55),
    dni int,
    PRIMARY KEY (id_alumno)
);
SELECT *FROM dato_alumno;