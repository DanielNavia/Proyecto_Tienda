<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Editar producto</title>
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
                    <a href="../vista/ProductoNuevo.php">Nuevo Producto</a>
                </li>
                <li>   
                    <a href="../controlador/gestionProducto.php">Nuestros Productos</a>
                </li>
                <li>    
                    <a href="../controlador/gestionInformacion.php">Informacion Usuarios</a>
                </li>
            </ul>
        </header>
        <div id="contenido">
            <center>
                <form action="../controlador/gestionCrudDos.php" method="post" enctype="multipart/form-data">
                    <?php
                        foreach($lstproductos as $item)
                        {
                            echo '<tr>';
                            echo '<td><input class="cbx" type="text" required name="nombreedit" placeholder='.$item["nombre"].'></td>';
                            echo '<td><br><input class="cbx" type="text" required name="descripcionedit" placeholder='.$item["descripcion"].'></td>';
                            echo '<td><br><input class="cbx" type="number" max="999999999" required name="precioedit" placeholder='.$item["precio"].'></td>';
                            echo '<td><br><img height="200px" src="data:;base64,' . base64_encode( $item["imagen"] ) . '" /></td>';
                            echo '</tr>';
                        }
                    ?>
                    <br><input type="file" class="form-control-file" required name="fotoedit" accept="image/*">
                    <input type="hidden" name="editarconf" value="editarconf">
                    <input type="hidden" name="codigo" value="<?php echo $item['codigo'] ?>">
                    <br><input class="boton" type="submit" value="Editar">
                </form>          
            </center>
        </div>
    </body>
</html>
