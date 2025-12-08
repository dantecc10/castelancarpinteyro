<?php
// Configuración
$host = "localhost";
$user = "mpu";
$pass = "Rover25!!!";
$db   = "mpu6050_monitoring";

// Conexión a MySQL
$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Connection error: " . $conn->connect_error);
}

// Obtener datos (POST preferido, GET como respaldo)
$accel_x = $_POST['accel_x'] ?? $_GET['accel_x'] ?? null;
$accel_y = $_POST['accel_y'] ?? $_GET['accel_y'] ?? null;
$accel_z = $_POST['accel_z'] ?? $_GET['accel_z'] ?? null;
$gyro_x  = $_POST['gyro_x']  ?? $_GET['gyro_x']  ?? null;
$gyro_y  = $_POST['gyro_y']  ?? $_GET['gyro_y']  ?? null;
$gyro_z  = $_POST['gyro_z']  ?? $_GET['gyro_z']  ?? null;
$temp    = $_POST['temp']    ?? $_GET['temp']    ?? null;

// Validación simple
if ($accel_x === null || $accel_y === null || $accel_z === null ||
    $gyro_x === null  || $gyro_y === null  || $gyro_z === null) {
    die("Missing parameters");
}

// Preparar statement
$stmt = $conn->prepare("
    INSERT INTO mpu6050_readings 
    (accel_x_mpu6050_reading, accel_y_mpu6050_reading, accel_z_mpu6050_reading,
     gyro_x_mpu6050_reading, gyro_y_mpu6050_reading, gyro_z_mpu6050_reading,
     temp_mpu6050_reading)
    VALUES (?, ?, ?, ?, ?, ?, ?)
");

$stmt->bind_param("ddddddd",
    $accel_x, $accel_y, $accel_z,
    $gyro_x,  $gyro_y,  $gyro_z,
    $temp
);

if ($stmt->execute()) {
    echo "OK";
} else {
    echo "DB Error: " . $stmt->error;
}

$stmt->close();
$conn->close();
?>
