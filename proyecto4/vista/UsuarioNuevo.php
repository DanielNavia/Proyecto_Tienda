<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Nuevo Usuario</title>        
        <link rel="icon" href="http://localhost/Proyecto4/vista/Assets/LogoDulce.png">
        <link rel="stylesheet" type="text/css" href="../vista/Assets/estilos_10.css">
    </head>
    <body id="inicio">
        <header>
            <section id="Informacion" >
                <img id="logo" src="http://localhost/Proyecto4/vista/Assets/LogoDulce.png">
                <h1>Bienvenido A Dulce Encanto  </h1>
                <nav>
                    <ul>
                        <li>
                            <a href="../vista/UsuarioLogIn.php">Iniciar sesion</a>
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
            <form action="../controlador/gestionNuevoUsuario.php" method="post">
                <section class="forma-registro" >
                    <h2>Crear Usuario</h2>
                    <input class="cbx" type="text" required name="nombre" placeholder="Ingrese su Nombre">
                    <br>
                    <input class="cbx" type="text" required name="usuario" placeholder="Ingrese un Usuario">
                    <br>
                    <input class="cbx" type="password" required name="clave" placeholder="Ingrese su Clave">
                    <br>
                    <input class="boton" type="submit" value="Registrar">
                </section>
            </form>
        </div>
</body>
</html>