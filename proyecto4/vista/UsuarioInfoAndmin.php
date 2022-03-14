<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Lista de Usuario</title>
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
                    <a href="../controlador/gestionCrud.php">Editar Productos</a>   
                </li>
                <li>    
                    <a href="../controlador/gestionProducto.php">Nuestros Productos</a>
                </li>
            </ul>
        </header>
        <div id="contenido">
            <center>
                <table class="content-table">
                    <thead>
                        <tr>
                            <th>Username</th>
                            <th>Nombre</th>
                            <th>rol</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                            foreach($lstusuarios as $item){
                                echo '<tr>';
                                echo '<td>'.$item["usuario"].'</td>';
                                echo '<td>'.$item["nombre"].'</td>';
                                echo '<td>'.$item["rol"].'</td>';
                                echo '</tr>';
                            }
                        ?>
                    </tbody>
                </table>
            </center>
        </div>
    </body>
</html>
