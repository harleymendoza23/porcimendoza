<?php
require '../head.php';

?>



<html>
<?php
require_once '../conexion/producto.php';
$oproducto = new producto();
$consulta = $oproducto->listarproducto();
foreach ($consulta as $registro){

?>
<div class="w3-card-8 w3-dark-grey">

<div class="w3-container w3-center">
<?php echo $registro['nombreProducto']; ?>
  <img src="img_avatar3.png" alt="Avatar" style="width:80%">
  
  <?php echo $registro['archivo']; ?>

  <button class="w3-btn w3-green">comprar</button>
  <button class="w3-btn w3-red">registarse</button>
</div>

</div>

<?php
} 
?>


</html>
<!-- <?php
require_once '../conexion/producto.php';
$oproducto = new producto();
$consulta = $oproducto->listarproducto();
foreach ($consulta as $registro){

?>

<div class="container">

    <div class="col-sm-3">
        
        
        <br>
        <?php echo $registro['nombreProducto']; ?>

    </div>

</div>
<?php
} 
?>-->