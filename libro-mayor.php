<?php require_once('conexion/conexion.php');

function nombre_cuenta($id){ /*id*/


		global $database, $conexion;
		mysqli_select_db( $conexion,$database );
		$query_nombre_cuenta = " SELECT nombre FROM cuentas WHERE id =".$id."";
		$nombre_cuenta = mysqli_query( $conexion, $query_nombre_cuenta ) or die(mysql_error());
		$row_nombre_cuenta = mysqli_fetch_assoc($nombre_cuenta);
		$totalRows_nombre_cuenta = mysqli_num_rows($nombre_cuenta);

		echo $row_nombre_cuenta['nombre'];

	}


function montos($id){ /*id*/


		global $database, $conexion;
		mysqli_select_db( $conexion,$database );
		$query_monto = " SELECT monto,aumenta_por FROM poliza WHERE id_cuenta =".$id."";
		$monto = mysqli_query( $conexion, $query_monto ) or die(mysql_error());
		$row_monto = mysqli_fetch_assoc($monto);
		$totalRows_monto = mysqli_num_rows($monto);


		do{ ?>
		<tr>
			<?php if ($row_monto['aumenta_por']=='debe'){ ?>
				<td class="mayor-izquierda"><?php echo $row_monto['monto'] ?></td>
				<td class="mayor-derecha"></td>
			<?php }else{ ?>
				<td class="mayor-izquierda"></td>
				<td class="mayor-derecha"><?php echo $row_monto['monto'] ?></td>
			<?php } ?>
		</tr>
	<?php }while($row_monto = mysqli_fetch_assoc($monto));



	}

function sumas($id){


		global $database, $conexion;
		mysqli_select_db( $conexion,$database );
		$query_suma_debe = " SELECT SUM(monto) as total FROM poliza WHERE aumenta_por='debe' AND id_cuenta =".$id." ";
		$suma_debe = mysqli_query( $conexion, $query_suma_debe ) or die(mysql_error());
		$row_suma_debe = mysqli_fetch_assoc($suma_debe);
		$totalRows_suma_debe = mysqli_num_rows($suma_debe);

		global $database, $conexion;
		mysqli_select_db( $conexion,$database );
		$query_suma_haber = " SELECT SUM(monto) as total FROM poliza WHERE aumenta_por='haber' AND id_cuenta =".$id." ";
		$suma_haber = mysqli_query( $conexion, $query_suma_haber ) or die(mysql_error());
		$row_suma_haber = mysqli_fetch_assoc($suma_haber);
		$totalRows_suma_haber = mysqli_num_rows($suma_haber);

		?>
		<tr>
				<td class=" mayor-total-debe"><?php echo $row_suma_debe['total'];  ?></td>
				<td class="mayor-total-haber"><?php echo $row_suma_haber['total'];  ?></td>
		</tr>
		<?php
	}



        global $database, $conexion;
		mysqli_select_db( $conexion,$database ); /* SELECT * FROM cuentas AS c INNER JOIN poliza AS p ON c.id= p.id_cuenta*/
		$query_ConsultaFuncion = " SELECT DISTINCT p.id_cuenta FROM poliza AS p INNER JOIN cuentas AS c ";

		$ConsultaFuncion = mysqli_query( $conexion,$query_ConsultaFuncion ) or die(mysql_error());
		$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
		$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);
		//

		$query2_ConsultaFuncion = "SELECT * FROM poliza ";

		$ConsultaFuncion2 = mysqli_query( $conexion,$query2_ConsultaFuncion ) or die(mysql_error());
		$row_ConsultaFuncion2 = mysqli_fetch_assoc($ConsultaFuncion2);
		$totalRows_ConsultaFuncion2 = mysqli_num_rows($ConsultaFuncion2);



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
        <li><a href="index.php">Inicio</a></li>
        <li class="active">Libro Mayor</li>
      </ol>
  </div>
  <div class="container">
    <div class="well footer-custom col-md-12">
      <h1 class="titulo">Libro Mayor</h1>
			<?php if ($totalRows_ConsultaFuncion==0){ ?>
				<h3>Debe ingresar una poliza <a href="poliza_add.php">click aqui para agregar</a> </h3>
				<?php }else { ?>
      <div class="col-md-10 col-md-offset-1">
        <?php $count=0; do{ ?>
    		<div class="col-md-4">
          <div class="mayor">
            <table class="table table-bordered mayor-table" style=" border: 2px solid grey;">
              <caption><h3 align="center"><?php nombre_cuenta($row_ConsultaFuncion['id_cuenta']) ?></h3></caption>
              <thead>
                <tr>
                  <th class="mayor-debe" >Debe</th>
                  <th class="mayor-haber" >Haber</th>
                </tr>
              </thead>
              <tbody>
                <?php montos($row_ConsultaFuncion['id_cuenta']); ?>
                <?php sumas($row_ConsultaFuncion['id_cuenta']);  ?>
              </tbody>
            </table>
          </div>
    		</div>
        <?php $count++; if($count==3){ ?>
          <div class="clearfix"></div>
        <?php } ?>
    		<?php }while($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)); ?>
      </div>
			<?php } ?>
    </div>

  </div>
  <!-- //Contenido -->
  <?php include 'includes/footer.php'; ?>
  </body>
</html>
