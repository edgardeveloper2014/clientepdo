<?php require 'dao/ClienteDAO.php'; ?>
<html lang="es">
<head>
<title>Persona</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >

</head>

<body>
<div class="container">
<div>

<h1 class="text-center">Listado personas</h1>
<div >
<br>

<?php
$persona = new ClienteDAO();
$listarpersona  =  new ArrayIterator($persona->mostrarCliente());

?>
<table name="tbPersonas" class="table table-hover" >
  <tr>
    <td>Nombre</td>
    <td>Apellido</td>
    <td>Email</td>
    <td>ciudad</td>
  </tr>
 
<?php
while( $listarpersona->valid() ): ?>
 <tr>
  <td><?php echo $listarpersona->current()->nombre; ?></td>
  <td><?php echo $listarpersona->current()->apellido; ?></td>
  <td><?php echo $listarpersona->current()->email; ?></td>
  <td><?php echo $listarpersona->current()->nombciudad; ?></td>
 
  <?php $listarpersona->next();
endwhile;
?>
</tr>
</table>
</div>
</div>

</div>

<script type="text/javascript" src="js/bootstrap.min.js" ></script>
</body>
</html>