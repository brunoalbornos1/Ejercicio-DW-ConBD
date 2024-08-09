<?php
// Conexión a la base de datos
$servername = "localhost";
$username = "root";  // Cambia esto por tu nombre de usuario de la base de datos
$password = "";  // Cambia esto por tu contraseña de la base de datos
$dbname = "testt";

// Crear conexión
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificar conexión
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}

// Obtener los datos del formulario
$usuario = $_POST['usuario'];
$contraseña = $_POST['contraseña'];
$opcion = $_POST['select'];

// Consultar en la base de datos
$sql = "SELECT * FROM cuentas WHERE user = '$usuario' AND password = '$contraseña' AND tipo = '$opcion'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Usuario y contraseña correctos
    echo "¡Login exitoso! bienvenido: $usuario" . "<br> Usted es: $opcion";
    // Aquí puedes redirigir al usuario a una página de inicio o dashboard
} else {
    // Usuario o contraseña incorrectos
    echo "Usuario o contraseña incorrectos.";
}

// Cerrar la conexión
$conn->close();
?>
