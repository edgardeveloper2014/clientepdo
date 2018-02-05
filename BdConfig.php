<?php
class BdConfig {
	// datos de configuracion de la bd 
    private $cadenaconexion = "mysql:dbname=cliente2018;host:localhost";
    private $password = "";
    private $username = "root";
    private $conex;
	// patron singleton
    private static $_instance = null;
    public static function getInstance() {
        if (!(self::$_instance instanceof BdConfig)) {
            self::$_instance = new self();
        }
        return self::$_instance;
    }
    private function __construct() {
        try {
            $this->conex = new PDO($this->cadenaconexion, $this->username, $this->password);
            $this->conex->exec("SET CHARACTER SET utf8");
        } catch (PDOException $e) {
            echo "Error al conectar BD!:" . $e->getMessage() . "<br/>";
            die();
        }
    }
    public function conectar() {
        if ($this->conex === null) {
            self::getInstance();
        }
        return $this->conex;
    }
    public function isConn() {
        return ((bool) ($this->conex instanceof PDO));
    }
    public function desconectar() {
        $this->conex = null;
    }
    public function __destruct() {
        $this->desconectar();
    }
}