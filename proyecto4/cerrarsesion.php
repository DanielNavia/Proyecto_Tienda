<?php
//Reanudacion Sesion existente
session_start();
//Elimina Sesion existente y lo redirecciona para volver a iniciar sesion
session_destroy();
header("location:index.php");