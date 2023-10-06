<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="phpmailer/style.css">
    <title>Contacto</title>
</head>
<body>
    <div class="container">
        <h1>Contáctenos</h1>
        <form action="procesar_formulario.php" method="post">
            <label for="nombre">Nombre:</label>
            <input type="text" id="nombre" name="nombre" required>
            <br>
            <label for="email">Correo Electrónico:</label>
            <input type="email" id="email" name="email" required>
            <br>
            <label for="mensaje">Mensaje:</label>
            <textarea id="mensaje" name="mensaje" rows="4" required></textarea>
            <br>
            <input type="submit" value="Enviar">
        </form>
    </div>
</body>
</html>
