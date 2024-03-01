
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
  <br><br><br>

    <div class="container">
        <h1>Editar Pelicula</h1>
        <form action="?accion=editar&id=<?php echo $pelicula->id; ?>" method="POST">
            <input type="hidden" name="id" value="<?php echo $pelicula->id; ?>">
            <div class="form-group">
                <label for="idpelicula">idpelicula:</label>
                <input type="text" class="form-control" id="idpelicula" name="idpelicula" value="<?php echo $pelicula->idpeliculas; ?>" required>
            </div>
            <div class="form-group">
                <label for="title">Nombre:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $pelicula->title; ?>" required>
            </div>
            <div class="form-group">
                <label for="overview">Descripcion:</label>
                <input type="text" class="form-control" id="overview" name="overview" value="<?php echo $pelicula->overview; ?> required>
            </div>
            <div class="form-group">
                <label for="vote_average">Votos:</label>
                <input type="text" class="form-control" id="vote_average" name="vote_average" value="<?php echo $pelicula->vote_average; ?>" required>
            </div>
            <div class="form-group">
                <label for="poster_path">Imagen:</label>
                <input type="text" class="form-control" id="poster_path" name="poster_path" value="<?php echo $pelicula->poster_path; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Crear</button>
            <a href="crud.php" class="btn btn-secondary">Atras</a>
        </form>
    </div>

    <br><br><br>
</body>
</html>
