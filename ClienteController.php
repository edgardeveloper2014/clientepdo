<?php
require_once '../dao/ClienteDAO.php';
require_once '../vo/ClienteVO.php';

// captura de datos
$nombre = filter_input(INPUT_POST,'txtnombre');
$apellido = filter_input(INPUT_POST,'txtapellido');
$email = filter_input(INPUT_POST,'txtemail');
$codigo_ciudad = filter_input(INPUT_POST,'cbociudad');

$clievo = new ClienteVO();
$cliedao = new ClienteDAO();

$clievo->setNombre($nombre);
$clievo->setApellido($apellido);
$clievo->setEmail($email);
$clievo->setCodigo_ciudad($codigo_ciudad);
$cliedao->registrarCliente($clievo);
if ($cliedao != NULL) {
  header("location: exito.html");
} else {
  header("location: error.html");
}

