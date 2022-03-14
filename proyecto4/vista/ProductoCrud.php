<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Productos</title>
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
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Nombre Producto</th>
                            <th>Descripcion Producto</th>
                            <th>Imagen Producto</th>
                            <th>Precio Producto(COP)</th>
                            <th>¿Desea Eliminar?</th>
                            <th>¿Desea Editar?</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($lstproductos as $item){
                                echo '<tr>';
                                echo '<td>'.$item["nombre"].'</td>';
                                echo '<td>'.$item["descripcion"].'</td>';
                                echo '<td> <img height="70px" src="data:;base64,' . base64_encode( $item["imagen"] ) . '" /></td>';
                                echo '<td> $'.$item["precio"].'</td>';
                                echo '<td>'?>
                                <form action="gestionCrudDos.php" method="post">
                                    <input type="hidden" name="codigo" value="<?php echo $item['codigo'] ?>">
                                    <input type="hidden" name="eliminar" value="eliminar">
                                    <input class="boton" type="submit" value="Eliminar">
                                </form>
                                <?php
                                '</td>';
                                 echo '<td>'?>
                                <form action="gestionCrudDos.php" method="post">
                                    <input type="hidden" name="codigo" value="<?php echo $item['codigo'] ?>">
                                    <input type="hidden" name="editar" value="editar">
                                    <input class="boton" type="submit" value="Editar">
                                </form>
                                <?php
                                '</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table> 
        </div>
    </body>
</html>
