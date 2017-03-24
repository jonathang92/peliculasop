<?php require_once('conexion/conexion.php');

global $database, $conexion;
mysqli_select_db( $conexion,$database );
$query_ConsultaFuncion = " SELECT p.id,p.fecha,p.id_cuenta,p.monto,p.aumenta_por,c.id_cuenta,c.nombre FROM poliza p INNER JOIN cuentas c ON p.id_cuenta=c.id ORDER BY p.id";
$ConsultaFuncion = mysqli_query( $conexion,$query_ConsultaFuncion ) or die(mysql_error());
$row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
$totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);




$fecha="0";
$montodebe=0;
$montohaber=0;
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
        <li class="active">Libro Diario</li>
      </ol>
  </div>
  <div class="container">
    <div class="well form-custom col-md-12">
        <h1 class="titulo">Libro Diario</h1>
        <?php if ($totalRows_ConsultaFuncion==0){ ?>
          <h3>Debe ingresar una poliza <a href="poliza_add.php">click aqui para agregar</a> </h3>
          <?php }else { ?>
        <div class="col-md-10 col-md-offset-1 table-responsive">
          <table class="table table-hover table-bordered custom-table">
          <thead>
            <tr>
              <th>fecha</th>
              <th>Concepto</th>
              <th>Debe</th>
              <th>Haber</th>
            </tr>
          </thead>
          <tbody>
                  <?php $cont=1; do{ ?>
                      <?php if ($fecha!=$row_ConsultaFuncion['fecha']){ ?>
                      <tr class="borde-arriba">
                          <td class="sin-borde"><?php echo $row_ConsultaFuncion['fecha']; ?></td>
                          <td style="text-align: center;"><?php echo "------".$cont."------" ?></td>
                          <td></td>
                          <td></td>
                      </tr>

                      <tr>
                          <td class="sin-borde"></td>
                          <td><?php echo $row_ConsultaFuncion['nombre']; ?></td>
                          <?php  if ($row_ConsultaFuncion['aumenta_por']!="haber"){  ?>
                          <td><?php echo $row_ConsultaFuncion['monto'] ?></td>
                          <td></td>
                          <?php $montodebe+=$row_ConsultaFuncion['monto']; }else{ ?>
                          <td></td>
                          <td><?php echo $row_ConsultaFuncion['monto']; ?></td>
                          <?php $montohaber+=$row_ConsultaFuncion['monto']; } ?>
                      </tr>

                      <?php $fecha=$row_ConsultaFuncion['fecha']; $cont++; }else{ ?>
                      <tr>
                          <td class="sin-borde"></td>
                          <?php  if ($row_ConsultaFuncion['aumenta_por']!="haber"){  ?>
                          <td><?php echo $row_ConsultaFuncion['nombre']; ?></td>
                          <?php }else{ ?>
                          <td>
                            <div class="col-md-offset-2"><?php echo $row_ConsultaFuncion['nombre']; ?></div>
                          </td>
                          <?php } ?>
                          <?php  if ($row_ConsultaFuncion['aumenta_por']!="haber"){  ?>
                          <td><?php echo $row_ConsultaFuncion['monto'] ?></td>
                          <td></td>
                          <?php $montodebe+=$row_ConsultaFuncion['monto']; }else{ ?>
                          <td></td>
                          <td><?php echo $row_ConsultaFuncion['monto']; ?></td>
                          <?php $montohaber+=$row_ConsultaFuncion['monto']; } ?>
                      </tr>

                  <?php } }while($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion));  ?>
  					    <tr>
                    <td class="borde-arriba" style='border-bottom:hidden; border-left:hidden;'></td>
                    <td class="total-tabla">Sumas Iguales</td>
                    <td class="total-tabla"><?php echo $montodebe ?></td>
                    <td class="total-tabla"><?php echo $montohaber?></td>
                </tr>
  				</tbody>
        </table>
        <?php } ?>
        </div>
    </div>
  </div>
  <!-- //Contenido -->
  <?php include 'includes/footer.php'; ?>
  </body>
</html>
