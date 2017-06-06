<?php require_once('conexion/conexion.php');

if(isset($_GET['tipo'])){
  $_tipo=$_GET['tipo'];
} else {
  $_tipo=2;
}

	global $database, $conexion;
	mysqli_select_db( $conexion,$database );
	$query_ConsultaFuncion = " SELECT DISTINCT numero,fecha FROM poliza WHERE id_tipo='".$_tipo."' ORDER BY fecha DESC";
	$ConsultaFuncion = mysqli_query( $conexion,$query_ConsultaFuncion ) or die(mysql_error());
	$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
	$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

	global $database, $conexion;
	mysqli_select_db( $conexion,$database );
	$query_ConsultaCuentas = " SELECT * FROM cuentas ORDER BY nombre ";
	$ConsultaCuentas = mysqli_query( $conexion,$query_ConsultaCuentas ) or die(mysql_error());
	$row_ConsultaCuentas = mysqli_fetch_assoc($ConsultaCuentas);
	$totalRows_ConsultaCuentas = mysqli_num_rows($ConsultaCuentas);




  	function MostrarConceptos($numero, $_tipo)
	{
		global $database, $conexion;
		mysqli_select_db( $conexion,$database );
		$query_ConsultaConcepto = " SELECT * FROM poliza WHERE id_tipo='".$_tipo."' AND numero = ".$numero."";
		$ConsultaConcepto = mysqli_query( $conexion,$query_ConsultaConcepto ) or die(mysql_error());
		$row_ConsultaConcepto = mysqli_fetch_assoc($ConsultaConcepto);
		$totalRows_ConsultaConcepto = mysqli_num_rows($ConsultaConcepto);

		do { ?>

			<tr>
				<td><?php MostrarCodigoCuenta($row_ConsultaConcepto['id_cuenta']); ?></td>
				<td><?php MostrarNombreCuenta($row_ConsultaConcepto['id_cuenta']); ?></td>
				<?php if ($row_ConsultaConcepto['aumenta_por']=="debe") {?>
						<td><?php echo $row_ConsultaConcepto['monto'] ?></td>
						<td></td>
				<?php }else{ ?>
						<td></td>
						<td><?php echo $row_ConsultaConcepto['monto'] ?></td>
				<?php } ?>
			</tr>

		<?php }while ( $row_ConsultaConcepto = mysqli_fetch_assoc($ConsultaConcepto));

	}

	function SumasIguales($numero, $_tipo){

		global $database, $conexion;
		mysqli_select_db( $conexion,$database );
		$query_SumasIgualesDebe = " SELECT SUM(monto) as total FROM poliza WHERE aumenta_por='debe' AND id_tipo='".$_tipo."' AND numero=".$numero." ";
		$SumasIgualesDebe = mysqli_query( $conexion,$query_SumasIgualesDebe ) or die(mysql_error());
		$row_SumasIgualesDebe = mysqli_fetch_assoc($SumasIgualesDebe);
		$totalRows_SumasIgualesDebe = mysqli_num_rows($SumasIgualesDebe);

		global $database, $conexion;
		mysqli_select_db( $conexion,$database );
		$query_SumasIgualesHaber = " SELECT SUM(monto) as total FROM poliza WHERE aumenta_por='haber' AND id_tipo='".$_tipo."' AND numero=".$numero." ";
		$SumasIgualesHaber = mysqli_query( $conexion,$query_SumasIgualesHaber ) or die(mysql_error());
		$row_SumasIgualesHaber = mysqli_fetch_assoc($SumasIgualesHaber);
		$totalRows_SumasIgualesHaber = mysqli_num_rows($SumasIgualesHaber);


		?><td> <strong><?php echo $row_SumasIgualesDebe['total'];  ?></strong></td><?php
		?><td> <strong><?php echo $row_SumasIgualesHaber['total'];  ?></strong></td><?php

	}





	//<!--  IMPRIMIR TABLA CONCEPTO Y TABLA CONTROL -->
	function MostrarTablaControl($numero, $_tipo)
	{
		global $database, $conexion;
		mysqli_select_db( $conexion,$database );
		$query_Consulta = " SELECT concepto,hecho,autorizado,revisado,fecha FROM poliza WHERE id_tipo='".$_tipo."' AND numero = ".$numero."";
		$Consulta = mysqli_query( $conexion,$query_Consulta ) or die(mysql_error());
		$row_Consulta = mysqli_fetch_assoc($Consulta);
		$totalRows_Consulta = mysqli_num_rows($Consulta);

		?>
		<div class="bs-docs-example">
			<table class="table table-bordered" style=" border: 2px solid grey;">
				<thead>
					<tr>
						<th style=" border: 2px solid grey;">Concepto</th>
					</tr>
				</thead>
				<tbody>
					<tr>
						<td><?php echo $row_Consulta['concepto']; ?></td>
					</tr>
				</tbody>

			</table>
		</div>
		<div class="bs-docs-example">
			<table class="table table-bordered" style=" border: 2px solid grey;">
				<thead>
					<tr><h4>Control</h4>
						<th style=" border: 2px solid grey;">Hecho por</th>
						<th style=" border: 2px solid grey;">Revisado por</th>
						<th style=" border: 2px solid grey;">Autorizado</th>
						<th style=" border: 2px solid grey;">Fecha</th>
					</tr>
				</thead>
				<tbody>
					<tr>
					  <th>Javier Villarroel</th>
					  <th>Jonathan González</th>
					  <th>Jonathan González</th>
					  <th><?php echo $row_Consulta['fecha']; ?></th>
					</tr>
					</tbody>

				</table>
		</div>
		<?php
	}



	function MostrarNombreCuenta($identificador)
	{
		global $database, $conexion;
		mysqli_select_db( $conexion,$database );
		$query_ConsultaFuncion = " SELECT * FROM cuentas WHERE id=".$identificador."";
		$ConsultaFuncion = mysqli_query( $conexion,$query_ConsultaFuncion ) or die(mysql_error());
		$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
		$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

		echo $row_ConsultaFuncion['nombre'];
	}

	function MostrarCodigoCuenta($identificador)
	{
		global $database, $conexion;
		mysqli_select_db( $conexion,$database );
		$query_ConsultaFuncion = " SELECT * FROM cuentas WHERE id=".$identificador."";
		$ConsultaFuncion = mysqli_query( $conexion,$query_ConsultaFuncion ) or die(mysql_error());
		$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
		$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);

		echo $row_ConsultaFuncion['id_cuenta'];
	}

 ?>
 <!DOCTYPE html>
 <html>
   <head>
     <?php include 'includes/head.php'; ?>
   </head>
   <body>
     <?php include 'includes/header.php'; ?>
   <!-- Contenido -->
   <div class="container">
       <ol class="breadcrumb">
         <li><a href="#">Inicio</a></li>
         <?php if($_tipo==2){ ?>
           <li class="active">Poliza de Ingreso</li>
         <?php } elseif($_tipo==3) { ?>
           <li class="active">Poliza de Egreso</li>
         <?php } elseif($_tipo==4) { ?>
           <h4>Poliza de Cheque</h4>
           <li class="active">Poliza de Cheque</li>
       <?php } ?>
       </ol>
   </div>
   <div class="container">
     <div class="well form-custom col-md-12">
       <?php if($_tipo==2){ ?>
         <h1 class="titulo">Poliza de Ingreso</h1>
       <?php } elseif($_tipo==3) { ?>
         <h1 class="titulo">Poliza de Egreso</h1>
       <?php } elseif($_tipo==4) { ?>
         <h1 class="titulo">Poliza de Cheque</h1>
     <?php } ?>
         <div class="col-md-10 col-md-offset-1">
          <?php if ($totalRows_ConsultaFuncion==0): ?>
            <h1>Debe ingrezar una <?php if($_tipo==2){ ?> Poliza de Ingreso,<?php } elseif($_tipo==3) { ?> Poliza de Egreso,<?php } elseif($_tipo==4) { ?> Poliza de Cheque,<?php } ?> <a href="poliza_add.php">click aqui para agregar</a> </h1>
          <?php }else { ?>
           <?php do { ?> <!-- CICLO PARA IMPRIMIR POLIZA-->

           	<div style=" padding-bottom:30px;"> <!--POLIZA-->

           		<div>
           			<h3 style="text-align: center; margin-bottom:15px">Caja</h3>
           		</div>
           		<div class="col-md-6" style="text-align: left;">
                <?php if($_tipo==2){ ?>
                  <h4>Poliza de Ingreso</h4>
                <?php } elseif($_tipo==3) { ?>
                  <h4>Poliza de Egreso</h4>
                <?php } elseif($_tipo==4) { ?>
                  <h4>Poliza de Cheque</h4>
              <?php } ?>
           			<h1><i class="fa fa-lg fa-wrench"></i> <i class="fa fa-car"></i> Autopartes San Antonio C.A.</h1>
           		</div>
           		<div class="col-md-6" style="text-align: right;">
           			<h4>Fecha: <?php echo $row_ConsultaFuncion['fecha'];  ?></h4>
           			<h4>Nro: <?php echo $row_ConsultaFuncion['numero'];  ?></h4>
           		</div>


           		<div class="bs-docs-example">
           			<!-- 1era TABLA DE POLIZA -->
           			<table class="table table-bordered" style=" border: 2px solid grey;">
           				<thead>
           					<tr>
           						<th style=" border: 2px solid grey;">Cuenta</th>
           						<th style=" border: 2px solid grey;">Concepto</th>
           						<th style=" border: 2px solid grey;">Debe</th>
           						<th style=" border: 2px solid grey;">Haber</th>
           					</tr>
           				</thead>
           				<tbody>
           					<?php MostrarConceptos($row_ConsultaFuncion['numero'], $_tipo); ?>
           					<tr>
           						<td></td>
           						<td><strong>Sumas Iguales</strong></td>
           						<?php SumasIguales($row_ConsultaFuncion['numero'], $_tipo);  ?>
           					</tr>
           				</tbody>
           			</table>
           			<!-- FIN 1era TABLA DE POLIZA-->
           		</div>
           					<!--  IMPRIMIR TABLA CONCEPTO Y TABLA CONTROL-->
           					<?php MostrarTablaControl($row_ConsultaFuncion['numero'], $_tipo);  ?>
           		<hr>


           	</div> <!--FIN DE LA POLIZA-->
           	<?php  } while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); ?> <!-- CICLO PARA IMPRIMIR POLIZA-->
            <?php } ?>


       </div>
     </div>
   </div>
   <!-- //Contenido -->
   <?php include 'includes/footer.php'; ?>
   </body>
 </html>
