<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmación</title>
    <style>
        body {
            background: linear-gradient(135deg, #00c9ff, #92fe9d);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
            animation: fadeIn 1s ease-in-out;
        }

        @keyframes fadeIn {
            from {
                opacity: 0;
                transform: translateY(-20px);
            }
            to {
                opacity: 1;
                transform: translateY(0);
            }
        }

        h2 {
            color: #fff;
            background: linear-gradient(135deg, #43e97b, #38f9d7);
            padding: 25px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.25);
            text-align: center;
            font-size: 24px;
            font-weight: bold;
            letter-spacing: 1px;
            margin-bottom: 30px;
        }

        .boton {
            background: linear-gradient(135deg, #00b4db, #0083b0);
            color: white;
            border: none;
            padding: 14px 24px;
            border-radius: 10px;
            cursor: pointer;
            font-size: 16px;
            font-weight: bold;
            text-decoration: none;
            transition: transform 0.2s ease, box-shadow 0.2s ease;
        }

        .boton:hover {
            transform: scale(1.05);
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.2);
        }

        .boton:active {
            transform: scale(0.97);
            background: linear-gradient(135deg, #0083b0, #005f75);
        }
    </style>
</head>
<body>
     <?php
    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
        $nombre = htmlspecialchars($_POST['nombre']);
        $email = htmlspecialchars($_POST['email']);
        $mensaje = htmlspecialchars($_POST['mensaje']);


        $archivo = fopen("$nombre.txt", "w");
        fwrite($archivo, "Nombre: $nombre\nEmail: $email\nMensaje: $mensaje");
        fclose($archivo);
        echo "<h2>Archivo enviado correctamente!! </h2>";
        echo "<h2>Gracias por comunicarte, me pondré en contacto contigo.</h2>";
    }

    ?>

    <!-- Botón para volver al formulario -->
    <a href="../contacto.html" class="boton">Volver al formulario</a>

</body>
</html>