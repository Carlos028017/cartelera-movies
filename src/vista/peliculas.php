<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/moviesStyle.css">
    <title>Peliculas</title>
</head>

<body>
    <header>
        <div class="container">
            <nav>
                <ul>
                    <li><a href="crud.php">Crud</a></li>
                    <li><a href="peliculas.php">Películas</a></li>
                    <form action="peliculas.php" method="post">
                        <button type="submit" name="fetch_data">Obtener Peliculas</button>
                    </form>
                </ul>
            </nav>
        </div>
    </header>
    <div class="main-content" >
        <div class="container">
            <h1>Películas</h1>
            <div class="movie">
            <?php foreach($peliculas as $pelicula): ?>
                    <a href="videos.php?id=<?php echo $pelicula->id; ?>">
                        <div class="movie-card">
                            <img src="<?php echo $pelicula->poster_path; ?>" alt="<?php echo $pelicula->title; ?>">
                        </div>
                    </a>
                <?php endforeach; ?>
            </div>
        </div>
    </div>
    <footer>
        <p>&copy; AUTOR:Carlos Alvarez Movies </p>
    </footer>
</body>

</html>