<?php
require_once('../modelo/clsConexion.php');
/**
 * Description of clsProductoAcceso
 *
 * @author Adrian Mu
 */
class clsCarritoAcceso {
    //atributos
    private $conexion;

    //metodos
    public function __construct() {
        $this->conexion = new clsConexion();
    }

    public function listar(){
        $sql = 'SELECT * FROM CARRITO_USUARIOS';
        $consulta = $this->conexion->getConexion()->query($sql);
        $listadoProductos = [];
        $i=0;
        while($fila = $consulta->fetch_assoc()){
            $listadoProductos[$i] = $fila;
            $i++;
        }
        return $listadoProductos;
    }

    function eliminarDeCarrito($id_producto)
    {
        $sql = "DELETE FROM CARRITO_USUARIOS WHERE id_producto = '$id_producto'";
        $consulta = $this->conexion->getConexion()->query($sql);
        echo '<script language="javascript">alert("Se elimino correctamente, sigue comprando");window.location.href="../controlador/gestionCliente.php"</script>';
    }

    function agregarCarrito($id_producto, $id_session, $contador)
    {
        $sql = "SELECT * FROM CARRITO_USUARIOS WHERE id_producto = '$id_producto'";
        $consulta = $this->conexion->getConexion()->query($sql);
        $filas = mysqli_num_rows($consulta);
        if($filas>0)
        {
            $sql = "UPDATE carrito_usuarios SET contador=contador+('$contador') WHERE id_producto='$id_producto'";
            $consulta = $this->conexion->getConexion()->query($sql);
            echo '<script language="javascript">alert("Se actualizo la cantidad");window.location.href="../controlador/gestionCliente.php"</script>'; 
        }elseif($filas<=0)
        {
            $sql = "INSERT INTO CARRITO_USUARIOS (id_sesion, id_producto, contador) VALUES ('$id_session', '$id_producto', '$contador')";
            $consulta = $this->conexion->getConexion()->query($sql); 
            echo '<script language="javascript">alert("Se agrego correctamente");window.location.href="../controlador/gestionCliente.php"</script>';
        }     
    }
    function listarProductos($id_session)
    {
        $sql = "SELECT nombre, carrito_usuarios.contador, codigo, precio, imagen,(carrito_usuarios.contador*producto.precio) as semitotal FROM producto
            JOIN carrito_usuarios ON producto.codigo = carrito_usuarios.id_producto
            WHERE carrito_usuarios.id_sesion = '$id_session'
            ORDER BY nombre ASC;";
        $consulta = $this->conexion->getConexion()->query($sql);
        $listadoCarrito = [];
        $i=0;
        while($fila = $consulta->fetch_assoc()){
            $listadoCarrito[$i] = $fila;
            $i++;
        }
        return $listadoCarrito;
    }

    function calcularTotal($id_session)
    {
        $sqltotal = "SELECT sum(carrito_usuarios.contador*producto.precio) as total FROM producto
                    JOIN carrito_usuarios ON producto.codigo = carrito_usuarios.id_producto
                    WHERE carrito_usuarios.id_sesion = '$id_session'
                    ORDER BY nombre ASC;";
        $consultatotal = $this->conexion->getConexion()->query($sqltotal);
        $listadoTotal = [];
        $i=0;
        while($fila = $consultatotal->fetch_assoc()){
            $listadoTotal[$i] = $fila;
            $i++;
        }
        return $listadoTotal;
    }
}