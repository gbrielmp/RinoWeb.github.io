<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    // Si el usuario no está autenticado, redirigir al inicio de sesión
    header("Location: login.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumno</title>
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
            flex-direction: center;
            justify-content: center;
            align-items: center;
            min-height: 100vh;
            background: url('Imagenes/RINO F.png') no-repeat center center fixed;
            background-repeat: no-repeat;
            background-position: left center;
            background-size: contain;
            color: #690505;
        }

        /* Barra superior e inferior */
        .barra-superior,
        .barra-inferior {
            width: 100%;
            height: 50px;
            background-color: #690505;
            position: fixed;
            left: 0;
            z-index: 1000;
            color: white;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .barra-superior {
            top: 0;
        }

        .barra-inferior {
            bottom: 0;
            font-size: 1rem;
            text-align: center;
        }

        /* Contenedor principal */
        .container {
            background-color: #ffffffe6;
            border-radius: 15px;
            padding: 20px;
            text-align: center;
            max-width: 400px;
            width: 90%;
            box-shadow: 0px 4px 8px rgba(0, 0, 0, 0.2);
            margin-top: 80px;
            margin-bottom: 60px;
        }

        .logo {
            width: 120px;
            height: 120px;
            border-radius: 50%;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 2rem;
            color: #690505;
            margin-bottom: 20px;
        }

        /* Botones principales */
        .menu-button {
            display: block;
            width: 100%;
            padding: 15px;
            margin: 10px 0;
            background-color: #d19b4b;
            color: white;
            border: none;
            border-radius: 25px;
            font-size: 1.2rem;
            cursor: pointer;
            transition: background-color 0.3s;
            text-decoration: none;
            text-align: center;
        }

        .menu-button:hover {
            background-color: #b98237;
        }

        .menu-button:active {
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

    </style>
</head>
<body>
    <!-- Barra superior -->
    <div class="barra-superior">
    </div>

    <!-- Contenedor principal -->
    <div class="container">
        <img src="Imagenes/Icono final.png" alt="Logo RinoApp" class="logo">
        <h1>RinoApp</h1>
        <a href="Calendario.html" class="menu-button">Calendario</a>
        <a href="Eventos.html" class="menu-button">Eventos</a>
        <a href="AsisTESCI.html" class="menu-button">AsisTESCI</a>
        <a href="Mi Perfil.html" class="menu-button">Mi perfil</a>
        <a href="logout.php" class="menu-button" style="background-color: #690505;">Cerrar sesión</a>
    </div>

    <!-- Barra inferior -->
    <div class="bottom-bar">
        <span>© 2024 Actividades Escolares</span>
        <span>|</span>
        <span>Contacto: info@escuela.com</span>
    </div>
</body>
</html>
