<?php
//Reanuda sesion
session_start();
        use Twilio\Rest\Client;
require '../modelo/clsConexion.php';
/**
 * Description of clsProductoAcceso
 *
 * @author Daniel Navia
 */
class clsFormularioAcceso 
{
    //atributos
    private $conexion;
    //metodos
    public function __construct() {
        $this->conexion = new clsConexion();
    }

    public function fIngresarDatos($nombre, $correo, $celular, $problema)
    {
        $cadenanombre= filter_var($nombre, FILTER_SANITIZE_STRING);
        $cadenacorreo= filter_var($correo, FILTER_SANITIZE_STRING);
        $cadenacelular= filter_var($celular, FILTER_SANITIZE_STRING);
        $cadenaproblema= filter_var($problema, FILTER_SANITIZE_STRING);

        $sql = "INSERT INTO formulario (nombre, correo, celular, problema) VALUES ('$cadenanombre', '$cadenacorreo', '$cadenacelular', '$cadenaproblema')";
        $consulta = $this->conexion->getConexion()->query($sql);     
        require '../vista/Twilio/autoload.php';

        // Your Account SID and Auth Token from twilio.com/console
        $account_sid = 'AC3f1dc542f8a444972f9c85fb5b4a4c33';
        $auth_token = '46c8764017adba399886ac1305c2f31e';
        // In production, these should be environment variables. E.g.:
        // $auth_token = $_ENV["TWILIO_AUTH_TOKEN"]

        // A Twilio number you own with SMS capabilities
        $twilio_number = "+14245335190";

        $client = new Client($account_sid, $auth_token);
        $client->messages->create(
            // Where to send a text message (your cell phone?)
            //Inviamos celular cuando seamos premiun
            //$celular,
            '+573174817999',
            array(
                'from' => $twilio_number,
                'body' => 'Hola en unos instantes no contactaremos con usted'
            )
        );
        echo '<script language="javascript">alert("Tu problema se ha sido registrado correctamente");window.location.href="../index.php"</script>';
    }
}

?>