<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://getbootstrap.com/docs/5.2/assets/css/docs.css" rel="stylesheet">
    <title>Bootstrap Example</title>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script> 
</head>
    <title>Document</title>
</head>
<body>
<div class="container-sm" style="padding-top: 20px;">
<form action="guardarproveedor.php" method="POST">
    <div class="mb-3">
        <label for="Nit" class="form-label">Nit:</label>
        <input type="number" class="form-control" id="formGroupExampleInput" name="Nit" id="Nit">
    </div>
    <div class="mb-3">
        <label for="nombre">Nombre:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" id="nombre" name="nombre">
    </div>
    <div class="mb-3">
        <label for="direccion">Direccion:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" id="direccion" name="direccion">
    </div>
    <div class="mb-3">    
        <label for="ciudad">Ciudad:</label>
        <input type="text" class="form-control" id="formGroupExampleInput" id="ciudad" name="ciudad">
    </div>
    <div class="mb-3">    
        <label for="Telefono">Telefono:</label>
        <input type="number" class="form-control" id="formGroupExampleInput" id="Telefono" name="Telefono">
    </div>
        <input type="submit" class="btn btn-primary" value="send" name="submit">
    </form>
    </div>
</body>
</html>