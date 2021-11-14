<?php
if ($_SERVER['REQUEST_METHOD'] === 'OPTIONS') {
    header('Access-Control-Allow-Origin: *');
    header('Access-Control-Allow-Methods: POST, GET, DELETE, PUT, PATCH, OPTIONS');
    header('Access-Control-Allow-Headers: token, Content-Type');
    header('Access-Control-Max-Age: 1728000');
    header('Content-Length: 0');
    header('Content-Type: text/plain');
    die();
    }
    header('Access-Control-Allow-Origin: *');
header('Content-Type: application/json');

require_once("../config/conexion.php");
require_once("../models/Facturas.php");
$facturas = new Facturas();

$body = json_decode(file_get_contents("php://input"), true);
switch($_GET["op"]){
    case "GetFacturas":
        $datos=$facturas->get_facturas();
        echo json_encode($datos);
    break;
      
    case "GetUno":
        $datos=$facturas->get_factura($body["id"]);
        echo json_encode($datos);
    break;

    case "InsertFactura":
        $datos=$facturas->insert_factura($body["numerofactura"],$body["idsocio"],$body["fechafactura"],$body["detalle"],$body["subtotal"],$body["totalisv"],$body["total"],$body["fechavencimiento"],$body["estado"]);
        echo json_encode("Factura Agregada");
    break;

    case "DeleteFactura":
        $datos=$facturas->delete_factura($body["id"]);
        echo json_encode("Factura Eliminada");
    break;

    case "PutFactura":
        $datos=$facturas->put_factura($body["id"],$body["numero_factura"],
        $body["id_socio"],$body["fecha_factura"],$body["detalle"],$body["sub_total"],
        $body["total_isv"],$body["total"],$body["fecha_vencimiento"],$body["estado"]);
        echo json_encode("Factura Actualizada");
    break;

}
?>