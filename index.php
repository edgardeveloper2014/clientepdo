<?php require 'dao/ClienteDAO.php'; ?>
<html lang="es">
<head>
<title>Registro Cliente</title>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" >
<script type="text/javascript" src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/parsley.min.js"></script>
</head>

<body>
<div class="container">
<div class="row">

<h1 class="text-center"> Registro</h1>
<div class="col-md-6">
<br><br><br>
<form action="ClienteController.php" method="POST" id="form"  data-parsley-validate>
<input type="text" name="txtnombre" class="form-control" placeholder="Nombre" data-parsley-required="true"><br>
<input type="text" name="txtapellido" class="form-control" placeholder="Apellido" data-parsley-required="true"><br>
<input type="email" name="txtemail" class="form-control" placeholder="Email" data-parsley-required="true" data-parsley-type="email"><br>
<?php
$ciudad = new ClienteDAO();
$listarciudad  =  new ArrayIterator($ciudad->listar_ciudad());

?>
<select name="cbociudad" >
<?php
while( $listarciudad->valid() )
{
  ?>
  <option value="<?php echo $listarciudad->current()->id; ?>"><?php echo $listarciudad->current()->nombre_ciudad; ?></option>
  <?php $listarciudad->next();
}
?>
</select><br>
<input type="radio" name="rdAcepto"  data-parsley-required="true" >Acepto<br>
<input type="submit" name="btnRegistrar" class="btn btn-primary" value="Registro"><br>
</form>

</div>
</div>

</div>
<a href="persona.php">Listado Persona</a>
<script type="text/javascript" src="js/bootstrap.min.js" ></script>

  <script>
  $('#form').parsley();
</script>
</body>
</html>