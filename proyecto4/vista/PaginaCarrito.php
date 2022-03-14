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
                        <a href="../controlador/gestionCliente.php">Productos</a>
                    </li>
                </ul>
            </nav>
        </header>
        <div id="contenido">
            <table class="content-table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Nombre</th>
                            <th>Cantidad</th>
                            <th>Precio por Producto</th>
                            <th>SemiTotal</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($listadoCarrito as $item){
                                echo '<tr>';
                                echo '<td> <img height="150px" src="data:;base64,' . base64_encode( $item["imagen"] ) . '" /></td>';
                                echo '<td>'.$item["nombre"].'</td>';
                                echo '<td>'.$item["contador"].'</td>';
                                echo '<td> $'.$item["precio"].'</td>';   
                                echo '<td> $'.$item["semitotal"].'</td>';
                                echo '<td>'?>
                                <form action="gestionCarrito.php" method="post">
                                    <input type="hidden" name="codigoCarrito" value="<?php echo $item['codigo'] ?>">
                                    <input type="hidden" name="eliminarCarrito" value="eliminarCarrito">
                                    <input class="boton" type="submit" value="eliminar">
                                </form>
                                <?php
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                    <tfoot>
                        <?php
                        echo "<tr>";
                        echo "<th></th>";
                        echo "<th></th>";
                        echo "<th></th>";
                        echo "<th>Total: </th>";
                        foreach($listadoTotal as $item)
                        {
                            echo '<th> $'.$item["total"].'</th>';
                        }
                        echo "</tr>";
                        ?>
                    </tfoot>
                </table>       
        </div>
    </body>
</html>