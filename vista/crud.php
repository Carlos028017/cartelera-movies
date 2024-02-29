<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/crudstyle.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <title>Peliculas</title>
</head>

<body>
    <header>
        <nav>
            <li><a href="peliculas.php">Regresar</a></li>
        </nav>
    </header>
    <div class="container">
        <a href="?action=insertar&$id=" class="btn btn-primary mb-3">Agregar pelicula</a>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Nombre</th>
                    <th>Descripcion</th>
                    <th>imagen</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <div class="container">
                    <div class="movie">
                        <?php foreach ($peliculas as $pelicula): ?>
                            <tr>
                                <td>
                                    <?php echo $pelicula->id; ?>
                                </td>
                                <td>
                                    <?php echo $pelicula->title; ?>
                                </td>
                                <td>
                                    <?php echo $pelicula->overview; ?>
                                </td>
                                <td>
                                    <img src="<?php echo $pelicula->poster_path; ?>" alt="<?php echo $pelicula->title; ?>">
                                </td>
                                <td>
                                    <a href="?action=editar&$id=<?php echo $pelicula["id"]; ?>"><i
                                            class="bi bi-pen" title="Editar"></i></a>
                                    <a href="?action=eliminar&$id=<?php echo $pelicula["id"]; ?>"><i
                                            class="bi bi-trash3" title="Eliminar"></i></a>
                                </td>
                            </tr>
                        <?php endforeach; ?>
                    </div>
                </div>

            </tbody>
        </table>
    </div>
    <footer>
        <p>&copy; AUTOR:Carlos Alvarez Movies </p>
    </footer>
</body>

</html>