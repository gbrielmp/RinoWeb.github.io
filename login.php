<?php
// Configuración de la base de datos
$host = "localhost";
$user = "root"; // Usuario por defecto en XAMPP
$password = "mipassword123"; // Contraseña vacía en XAMPP por defecto
$database = "nombre_base_datos"; // Cambia esto por el nombre de tu base de datos

// Conexión a la base de datos
$conn = new mysqli($host, $user, $password, $database);

// Verificar conexión
if ($conn->connect_error) {
    die("Error al conectar con la base de datos: " . $conn->connect_error);
}

// Obtener datos del formulario
$numero_control = $_POST['numero_control'];
$contrasena = $_POST['contrasena'];

// Consultar la base de datos
$query = "SELECT * FROM usuarios WHERE numero_control = ? AND contrasena = ?";
$stmt = $conn->prepare($query);
$stmt->bind_param("ss", $numero_control, $contrasena);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 1) {
    // Redireccionar a la página principal si las credenciales son correctas
    header("Location: pagina_principal.php");
    exit();
} else {
    // Redireccionar de nuevo al formulario con mensaje de error
    header("Location: index.php?error=1");
    exit();
}

if ($stmt) {
    $stmt->close(); // Cierra el statement si fue creado correctamente
}
$conn->close(); // Cierra la conexión

?>



<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Inicio de sesión</title>
    <style>
        /* Reset de márgenes y paddings */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: Arial, sans-serif;
        }

        /* Estilos generales */
        body {
            display: flex;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('Imagenes/RINO F.png') no-repeat left center fixed;
            background-size: contain;
            background-color: #f1f1f1;
            color: #690505;
        }

        .barra-superior,
        .barra-inferior {
            width: 100%;
            height: 50px;
            background-color: #690505;
            position: fixed;
            left: 0;
            z-index: 1000;
        }

        .barra-superior {
            top: 0;
        }

        .barra-inferior {
            bottom: 0;
            font-size: 1rem;
            text-align: center;
        }

        .container {
            background-color: rgba(255, 255, 255, 0.9);
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            max-width: 400px;
            width: 90%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
        }

        .title {
            font-size: 2rem;
            margin-bottom: 20px;
            font-weight: bold;
            color: #a11425;
        }

        .input-field {
            width: 100%;
            padding: 12px;
            margin: 10px 0;
            border: 2px solid #a11425;
            border-radius: 25px;
            font-size: 1rem;
            color: #333;
            text-align: center;
        }

        .logo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        .button {
            display: block;
            width: 100%;
            padding: 12px;
            margin: 20px 0;
            background-color: #d19b4b;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .button:hover {
            background-color: #b98237;
        }

        .button:active {
            background-color: #996a2a;
        }

        .bottom-bar {
            position: fixed;
            bottom: 0;
            width: 100%;
            height: 50px;
            background-color: #690505;
            display: flex;
            align-items: center;
            justify-content: center;
            color: white;
            font-size: 16px;
            z-index: 100;
        }

        .bottom-bar span {
            margin: 0 10px;
        }

        .forgot-password {
            color: #a11425;
            text-decoration: none;
            font-size: 0.9rem;
        }

        .forgot-password:hover {
            text-decoration: underline;
        }

        .error {
            color: red;
            font-size: 1rem;
            margin-top: 10px;
        }
    </style>
</head>

<body>

    <div class="container">
        <h1 class="title">Iniciar sesión</h1>
        <!-- Formulario para inicio de sesión -->
        <form action="login.php" method="POST">
            <input type="text" name="numero_control" class="input-field" placeholder="Número de control" required>
            <input type="password" name="contrasena" class="input-field" placeholder="Contraseña" required>
            <button type="submit" class="button">Entrar</button>
        </form>
        <?php
        // Mostrar mensaje de error si hay uno
        if (isset($_GET['error'])) {
            echo '<p class="error">Credenciales incorrectas. Por favor, inténtalo de nuevo.</p>';
        }
        ?>
    </div>

</body>
</html>
