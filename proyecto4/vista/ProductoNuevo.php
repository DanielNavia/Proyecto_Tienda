<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Producto</title>
        <link rel="icon" href="http://localhost/Proyecto4/vista/Assets/LogoDulce.png">
        <link rel="stylesheet" type="text/css" href="../vista/Assets/estilos_2.css">
</head>
<body id="inicio">
        <header>
            <section id="Informacion" >
                <img src="http://localhost/Proyecto4/vista/Assets/LogoDulce.png" width="70" height="70">
            </section>
            <h1>Dulce Encanto</h1>
            <nav>
            <ul>
                <li>
                    <a href="../cerrarsesion.php">Cerrar Sesion</a>
                </li>
                <li>
                    <a href="../controlador/gestionProducto.php">Nuestros Productos</a>
                </li>
                <li>   
                    <a href="../controlador/gestionCrud.php">Editar Productos</a>
                </li>
                <li>    
                    <a href="../controlador/gestionInformacion.php">Informacion Usuarios</a>
                </li>
            </ul>
        </header>
        <div id="contenido">
            <center>
                <form action="../controlador/gestionCrudDos.php" method="post" enctype="multipart/form-data">
                    <section class="forma-registro" >
                        <h2>Agregar Producto</h2>
                        <input class="cbx" type="text" required name="nombre" placeholder="Ingrese el nombre del Producto">
                        <br><input class="cbx" type="text" required name="descripcion" placeholder="Ingrese descripcion del Producto">
                        <br><input class="cbx" type="number" max="999999999" required name="precio" placeholder="Ingrese precio del Producto">
                        <br><input type="hidden" name="agregar" value="agregar">
                        <input type="file" class="form-control-file" required name="foto" accept="image/*">
                        <button type="submit" class="btn btn-primary" name="guardar">Guardar</button>
                    </section>
                </form>
            </center>
        </div>
</body>
</html>