<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Ayuda</title>
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
                            <a href="../vista/UsuarioNuevo.php">Crear usuario</a>
                        </li>
                    </ul>
                    <ul>
                        <li>
                            <a href="../vista/UsuarioLogIn.php">Iniciar sesion</a>
                        </li>
                    </ul>
                </nav>
            </section>        
        </header>
        <div id="contenido">
            <form action="../controlador/gestionFormulario.php" method="post">
                <section class="forma-registro" >
                    <h2>Formulario Ayuda</h2>
                    <input class="cbx" type="text" required name="nombre" placeholder="Ingrese su Nombre">
                    <br>
                    <input class="cbx" type="text" required name="correo" placeholder="Ingrese su Correo">
                    <br>
                    <input class="cbx" type="text" required name="celular" placeholder="Ingrese su número de celular">
                    <br>
                    <input class="cbx" type="text" required name="problema" placeholder="Ingrese su problema">
                    <br>
                    <br>
                    <input class="boton" type="submit" value="Enviar">
                </section>
            </form>
        </div>
    </body>
</html>