<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Log In</title>
        <link rel="icon" href="http://localhost/Proyecto4/vista/Assets/LogoDulce.png">
        <link rel="stylesheet" type="text/css" href="Assets/estilos_10.css">
    </head>
    <body id="inicio">
        <header>
            <section id="Informacion" >
                <img id="logo" src="http://localhost/Proyecto4/vista/Assets/LogoDulce.png">
                <h1>Bienvenido A Dulce Encanto  </h1>
                <nav>
                    <ul>
                        <li>
                            <a href="../vista/UsuarioNuevo.php">Crear usuario</a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="../index.php">Inicio</a>
                        </li>
                    </ul>
                </nav>
            </section>        
        </header>
        <div id="contenido">
            <form action="../controlador/gestion.php" method="post">
                    <section class="forma-registro" >
                        <h2>Inicio Sesion</h2>
                        <input class="cbx" type="text" required name="usuario" placeholder="Ingrese su Usuario">
                        <br>
                        <input class="cbx" type="password" required name="clave" placeholder="Ingrese su Clave">
                        <br>
                        <input class="boton" type="submit" value="Iniciar Sesion">
                    </section>
            </form>
        </div>
    </body>
</html>
