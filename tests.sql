/*Diseña una tabla para almacenar todos los cursos disponibles en un sitio, considera tantos campos de información útil como puedas*/
CREATE TABLE cursos (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    descripcion VARCHAR(255) NOT NULL,
    duracion INT NOT NULL,
    precio DECIMAL(10,2) NOT NULL,
    PRIMARY KEY (id)
    );
    /*Tengo una base de datos también de mis usuarios, con sus nombres, apellidos, correos, contraseñas, y un status para activar cuentas, ¿cómo puedo relacionar esa información con la base de datos de los cursos para llevar el control del progreso de los usuarios en los cursos y en cuáles están inscritos*/
    CREATE TABLE usuarios (
        id INT NOT NULL AUTO_INCREMENT,
        nombre VARCHAR(50) NOT NULL,
        apellido VARCHAR(50) NOT NULL,
        correo VARCHAR(50) NOT NULL,
        contrasena VARCHAR(50) NOT NULL,
        status VARCHAR(50) NOT NULL,
        PRIMARY KEY (id)
        );

    /*Crea una base de datos para poder determinar los progresos de los usuarios en sus cursos*/
    CREATE TABLE cursos_usuarios (
        id INT NOT NULL AUTO_INCREMENT,
        id_usuario INT NOT NULL,
        id_curso INT NOT NULL,
        fecha_inicio DATETIME NOT NULL,
        fecha_fin DATETIME NOT NULL,
        PRIMARY KEY (id),
        FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
        FOREIGN KEY (id_curso) REFERENCES cursos(id)
        );

        

