<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Lista de Productos</title>
    <link rel="stylesheet" href="css/crudstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    
</head>
<body>
    <header>
        <div class="container2">
            <nav>
            <img src="../logo/Free_Sample_By_Wix.jpg" alt="">
                <ul>
                    <li><a href="peliculas.php">Regresar</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <div class="container">
        <a href="?accion=crear" class="btn btn-primary mb-3">Nueva película</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>Votos</th>
                    <th>Imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($peliculas as $pelicula): ?>
                    <tr>
                        <td><?php echo $pelicula->id; ?></td>
                        <td><?php echo $pelicula->title; ?></td>
                        <td><?php echo $pelicula->overview; ?></td>
                        <td><?php echo $pelicula->vote_average; ?></td>
                        <td><img src="<?php echo $pelicula->poster_path; ?>"></td>
                        <td>
                            <a href="?accion=actualizar&id=<?php echo $pelicula->id; ?>"><i class="bi bi-pen" title="Editar"></i></a>
                            <br><br>
                            <a href="#" onclick="confirmarEliminar(<?php echo $pelicula->id ?>)"><i class="bi bi-trash3" title="Eliminar"></a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <script>
    function confirmarEliminar(id) {
        if (confirm('¿Estás seguro de que quieres eliminar esta película?')) {
            window.location.href = 'crud.php?accion=eliminar&id=' + id;
        }
    }
</script>
</body>
</html>