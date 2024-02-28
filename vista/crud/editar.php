<?php
use Modelo\crud;;

$crud = new crud();
$id = $_GET['id'];
$editar = $crud->editar($id)
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Editar Producto</title>
    <link rel="stylesheet" href="../css/style_editar.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>

  <header>
    <h1>VoleySport</h1>
  </header>

  <nav>
    <a href="../vistas/inicio.php">Productos</a>
  </nav>
  <br><br><br>

    <div class="container">
        <h1>Editar Producto</h1>
        <form action="vista/crud/editar.php" method="POST">
            <input type="hidden" name="id" value="<?php echo $producto["id"]; ?>">
            <div class="form-group">
                <label for="title">Nombre:</label>
                <input type="text" class="form-control" id="title" name="title" value="<?php echo $producto["title"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="price">Precio:</label>
                <input type="number" class="form-control" id="price" name="price" step="0.01"value="<?php echo $producto["price"]; ?>" required>
            </div>
            <div class="form-group">
                <label for="thumbnail">Imagen:</label>
                <br>
                <img src="<?php echo $producto["thumbnail"]; ?>" alt="Imagen del producto" style="max-width: 200px; max-height: 200px;">
            </div>
            <button type="submit" class="btn btn-primary">Editar</button>
            <a href="../vistas/crud.php" class="btn btn-secondary">Atras</a>
        </form>
    </div>

    <br><br><br>
</body>
</html>
