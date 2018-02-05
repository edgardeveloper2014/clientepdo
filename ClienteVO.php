<?php
class ClienteVO {
// atributos del cliente
private $nombre;
private $apellido;
private $codigo_ciudad;
private $email;
// get obtener los datos
public function getNombre() {
        return $this->nombre;
    }
public function getApellido() {
        return $this->apellido;
    }
public function getCodigo_ciudad() {
        return $this->codigo_ciudad;
    }
public function getEmail() {
        return $this->email;
    }
// set asignar los datos	
public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
public function setApellido($apellido) {
        $this->apellido = $apellido;
    }
public function setCodigo_ciudad($codigo_ciudad) {
        $this->codigo_ciudad = $codigo_ciudad;
    }
public function setEmail($email) {
        $this->email = $email;
    }		
}
	
