<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Dulce encanto</title>
        <link rel="icon" href="http://localhost/Proyecto4/vista/Assets/LogoDulce.png">
        <link rel="stylesheet" type="text/css" href="../vista/Assets/estilos_3.css">
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
                        <form action="gestionCarrito.php" method="post">
                            <input type="hidden" name="observarCarrito" value="observarCarrito">
                            <input type="image" name="submit" src="http://localhost/Proyecto4/vista/Assets/carrito.png" alt="Submit" style="width: 40px;" />
                        </form>
                    </li>
                </ul>
            </nav>
        </header>
        <div id="contenido">
            <center>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Nombre</th>
                            <th>Descripcion Producto</th>
                            <th>Precio(COP)</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($lstproductos as $item)
                            {
                                echo '<tr>';
                                echo '<td> <img height="150px" src="data:;base64,' . base64_encode( $item["imagen"] ) . '" /></td>';
                                echo '<td>'.$item["nombre"].'</td>';
                                echo '<td>'.$item["descripcion"].'</td>';
                                echo '<td> $'.$item["precio"].'</td>';
                                echo '<td>'?>
                                <form action="gestionCarrito.php" method="post">
                                    <input type="hidden" name="codigo" value="<?php echo $item['codigo'] ?>">
                                    <input type="number" max="9999" min="1" require name="contador" value="1" style="width: 40px";>
                                    <input type="hidden" name="agregarCarrito" value="agregarCarrito">
                                    <input class="boton" type="submit" value="agregar">
                                </form>
                                <?php
                            }
                        ?>
                    </tbody>
                </table>            
            </center>
        </div>
    </body>
</html>
