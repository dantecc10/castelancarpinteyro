/*Analiza estas bases de datos:
/*Diseña una tabla para almacenar todos los cursos disponibles en un sitio, considera tantos campos de información útil como puedas*/
CREATE TABLE cursos (
    id INT NOT NULL AUTO_INCREMENT,
    nombre VARCHAR(50) NOT NULL,
    descripción VARCHAR(255) NOT NULL,
    autor VARCHAR(255) NOT NULL,
    lecciones VARCHAR(255) NOT NULL,
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
*/
/*Con la sesión iniciada, quiero que el usuario consulte en una página su información; en qué cursos se inscribió, cuánto lleva de progreso en cada uno, que se vea el nombre, la descripción. Genera el código PHP con las consultas necesarias*/
/*
SELECT * FROM cursos_usuarios;
SELECT * FROM cursos;
SELECT * FROM usuarios;
*/
/*
SELECT u.nombre, u.apellido, c.nombre, c.descripcion, cu.fecha_inicio, cu.fecha_fin, cu.id_curso, cu.id_usuario
FROM cursos_usuarios cu
INNER JOIN cursos c ON cu.id_curso = c.id
INNER JOIN usuarios u ON cu.id_usuario = u.id;
*/

/*Múestrale lo obtenido en las consultas anterios al usuario en una tabla generada con PHP a base de "echos"*/
<?php
//continúa
$cursos = mysqli_query($conexion, "SELECT * FROM cursos");
$usuarios = mysqli_query($conexion, "SELECT * FROM usuarios");
$cursos_usuarios = mysqli_query($conexion, "SELECT * FROM cursos_usuarios");
echo "<table border='1'>";
echo "<tr>";
echo "<th>Nombre</th>";
echo "<th>Apellido</th>";
echo "<th>Correo</th>";
echo "<th>Contraseña</th>";
echo "<th>Estado</th>";
echo "</tr>";
while ($row = mysqli_fetch_array($usuarios)) {
    echo "<tr>";
    echo "<td>". $row['nombre']. "</td>";
    echo "<td>". $row['apellido']. "</td>";
    echo "<td>". $row['correo']. "</td>";
    echo "<td>". $row['contraseña']. "</td>";
    echo "<td>". $row['estado']. "</td>";
    echo "</tr>";
    }
    echo "</table>";
    echo "<table border='1'>";
    echo "<tr>";
    echo "<th>Nombre</th>";
    echo "<th>Descripción</th>";
    echo "<th>Fecha de inicio</th>";
    echo "<th>Fecha de fin</th>";
    echo "<th>Estado</th>";
    echo "</tr>";
    while ($row = mysqli_fetch_array($cursos)) {
        echo "<tr>";
        echo "<td>". $row['nombre']. "</td>";
        echo "<td>". $row['descripcion']. "</td>";
        echo "<td>". $row['fecha_inicio']. "</td>";
        echo "<td>". $row['fecha_fin']. "</td>";
        echo "<td>". $row['estado']. "</td>";
        echo "</tr>";
        }
        echo "</table>";
        echo "<table border='1'>";
        echo "<tr>";
        echo "<th>Nombre</th>";
        echo "<th>Apellido</th>";
        echo "<th>Correo</th>";
        echo "<th>Contraseña</th>";
        echo "<th>Estado</th>";
        echo "</tr>";
        while ($row = mysqli_fetch_array($cursos_usuarios)) {
            echo "<tr>";
            echo "<td>". $row['nombre']. "</td>";
            echo "<td>". $row['apellido']. "</td>";
            echo "<td>". $row['correo']. "</td>";
            echo "<td>". $row['contraseña']. "</td>";
            echo "<td>". $row['estado']. "</td>";
            echo "</tr>";
            }
            echo "</table>";
        
            //construye las tablas anteriores pero usando SQL con PDO
            $sql = "SELECT * FROM cursos";
            $cursos = $pdo->query($sql);
            $sql = "SELECT * FROM cursos_usuarios";
            $cursos_usuarios = $pdo->query($sql);
            echo "<table border='1'>";
            echo "<tr>";
            echo "<th>Nombre</th>";
            echo "<th>Descripción</th>";
            echo "<th>Fecha de inicio</th>";
            echo "<th>Fecha de fin</th>";
            echo "<th>Estado</th>";
            echo "</tr>";
            while ($row = $cursos->fetch()) {
                echo "<tr>";
                echo "<td>". $row['nombre']. "</td>";
                echo "<td>". $row['descripcion']. "</td>";
                //SIGUE
                echo "<td>". $row['fecha_inicio']. "</td>";
                echo "<td>". $row['fecha_fin']. "</td>";
                echo "<td>". $row['estado']. "</td>";
                echo "</tr>";
                }
                echo "</table>";
                

                //genera el PHP para mostrar en una tabla sólo los siguientes campos de las tablas anteriores: nombre del curso, descripción, fecha de inicio, y considera un campo en la tabla cursos que es "progreso" (porcentual). Muestra los progresos haciendo la consulta relacional para mostrar la información que te pedí siempre y cuando pertenezcan al usuario de id 4
                //genera el php
                



