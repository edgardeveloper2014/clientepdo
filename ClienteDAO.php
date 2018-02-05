<?php
require_once 'vo/ClienteVO.php';
require_once 'config/BdConfig.php';

class ClienteDAO{

 private $datos;

    //obtenerConexion = obtiene el metodo de conexión a la DB mediante singleton
    protected function obtenerConexion() {
        return BdConfig::getInstance()->conectar();
        $this->datos = array();
    }
	public function registrarCliente(ClienteVO $cliente) {
        
        $consulta = null;
        $insert_query = "INSERT INTO persona
                        (nombre,apellido,email,CiudadId)
                         VALUES (?,?,?,?)";
        $sentencia = $this->obtenerConexion()->prepare($insert_query);
        $sentencia->bindvalue(1, $cliente->getNombre(), PDO::PARAM_STR);
        $sentencia->bindvalue(2, $cliente->getApellido(), PDO::PARAM_STR);
        $sentencia->bindvalue(3, $cliente->getEmail(), PDO::PARAM_STR);
        $sentencia->bindvalue(4, $cliente->getCodigo_ciudad(), PDO::PARAM_INT);
       
        $consulta = $sentencia->execute();
        
        return $consulta;
    }
    
   public function mostrarCliente(){
       $sql = "SELECT `nombre`,`apellido`,`email`, c.nombre_ciudad  AS nombciudad FROM `persona` p INNER JOIN ciudad c ON c.id = p.`CiudadId`";
        $stm = $this->obtenerConexion()->prepare($sql);
        $stm->execute();
        //return $stm->fetchAll(PDO::FETCH_ASSOC); // en forma de arrayasociativo comun 
        return $stm->fetchAll(PDO::FETCH_OBJ); // arrayasociativo pero de objetos
      
    }
    
   public function listar_ciudad() {

        $sql = "SELECT * FROM ciudad";
        $stm = $this->obtenerConexion()->prepare($sql);
        $stm->execute();
        //return $stm->fetchAll(PDO::FETCH_ASSOC); // en forma de arrayasociativo comun 
        return $stm->fetchAll(PDO::FETCH_OBJ); // arrayasociativo pero de objetos
    }


}