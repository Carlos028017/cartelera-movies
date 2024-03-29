<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../css/style_crear.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Agregar Pelicula</h1>
        <form action="?accion=insertar" method="POST">
            <input type="hidden" name="id" value="<?php echo $producto["id"]; ?>">
            <div class="form-group">
                <label for="idpelicula">idpelicula:</label>
                <input type="text" class="form-control" id="idpelicula" name="idpelicula" required>
            </div>
            <div class="form-group">
                <label for="title">Nombre:</label>
                <input type="text" class="form-control" id="title" name="title" required>
            </div>
            <div class="form-group">
                <label for="overview">Descripcion:</label>
                <input type="text" class="form-control" id="overview" name="overview" required>
            </div>
            <div class="form-group">
                <label for="vote_average">Votos:</label>
                <input type="text" class="form-control" id="vote_average" name="vote_average" required>
            </div>
            <div class="form-group">
                <label for="poster_path">Imagen:</label>
                <input type="text" class="form-control" id="poster_path" name="poster_path" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="crud.php" class="btn btn-secondary">Atras</a>
        </form>
    </div>
    <br><br><br>
</body>
</html>
