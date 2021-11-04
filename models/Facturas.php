<?php 

class Facturas extends Conectar{

    public function get_facturas(){
        $conectar= parent::conexion();
        parent::set_names();
        $sql= "SELECT * FROM ma_facturas WHERE estado = 'F'";
        $sql=$conectar->prepare($sql);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get_factura($id){
        $conectar= parent::conexion();
        parent::set_names();
        $sql="SELECT * FROM ma_facturas WHERE estado = 'F' AND id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert_factura($numerofactura,$idsocio,$fechafactura, $detalle, $subtotal, $totalisv, $total, $fechavencimiento, $estado){
        $conectar = parent::conexion();
        parent::set_names();
        $sql="INSERT INTO ma_facturas(id,numero_factura,id_socio,fecha_factura,detalle,sub_total,total_isv,total,fecha_vencimiento,estado)
        VALUES(NULL,?,?,?,?,?,?,?,?,?);";
        $sql=$conectar->prepare($sql);
        //$sql->bindValue(1,$id);
        $sql->bindValue(1,$numerofactura);
        $sql->bindValue(2,$idsocio);
        $sql->bindValue(3,$fechafactura);
        $sql->bindValue(4,$detalle);
        $sql->bindValue(5,$subtotal);
        $sql->bindValue(6,$totalisv);
        $sql->bindValue(7,$total);
        $sql->bindValue(8,$fechavencimiento);
        $sql->bindValue(9,$estado);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);

    }

    public function delete_factura($id){
        $conectar = parent::conexion();
        parent::set_names();
        $sql= "DELETE FROM ma_facturas WHERE id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }

    
    public function put_factura($id,$numero_factura,$id_socio,$fecha_factura, $detalle, $sub_total, $total_isv, $total, $fecha_vencimiento, $estado){
        $conectar = parent::conexion();
        parent::set_names();
        $sql= "UPDATE ma_facturas set numero_factura = ?, id_socio = ?, fecha_factura = ?, detalle = ?, sub_total = ?, total_isv = ?, total = ?, fecha_vencimiento = ?,estado = ?
        WHERE id = ?";
        $sql=$conectar->prepare($sql);
        $sql->bindValue(1,$numero_factura);
        $sql->bindValue(2,$id_socio);
        $sql->bindValue(3,$fecha_factura);
        $sql->bindValue(4,$detalle);
        $sql->bindValue(5,$sub_total);
        $sql->bindValue(6,$total_isv);
        $sql->bindValue(7,$total);
        $sql->bindValue(8,$fecha_vencimiento);
        $sql->bindValue(9,$estado);
        $sql->bindValue(10,$id);
        $sql->execute();
        return $resultado=$sql->fetchAll(PDO::FETCH_ASSOC);
    }
}

?>