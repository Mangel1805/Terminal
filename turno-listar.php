<?php include 'master-cabeza.php' ?>
    <div class="rooms text-center">
     <div class="container">
        <h3><strong>Transport Ticket</strong></h3>
        
        <div class="container"> 
         <?php require('conexion.php');?>
		<?php include 'entidades/turno/listarTurno.php' ?>
        <div class="row"> </div>
        </div> 
     </div>
</div>
<!---->
   

<?php include 'master-pie.php' ?>

