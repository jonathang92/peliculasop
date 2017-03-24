<?php require_once('conexion/conexion.php');

global $database, $conexion;
    mysqli_select_db( $conexion,$database );
    $query_ConsultaFuncion = " SELECT p.id,p.fecha,p.id_cuenta,p.monto,p.aumenta_por,c.id_cuenta,c.nombre,c.tipo FROM poliza p INNER JOIN cuentas c ON p.id_cuenta=c.id ORDER BY p.id";
    $ConsultaFuncion = mysqli_query( $conexion,$query_ConsultaFuncion ) or die(mysql_error());
    $row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion);
    $totalRows_ConsultaFuncion = mysqli_num_rows($ConsultaFuncion);


$montodebe =0.00;
$montohaber =0.00;
$montoegreso = 0.00;
$montoingreso = 0.00;
$montoactivo = 0.00;
$montopasivo = 0.00;
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
        <li class="active">Hoja de trabajo</li>
      </ol>
  </div>
  <div class="container">
    <div class="well form-custom col-md-12">
        <h1 class="titulo">Hoja de Trabajo</h1>
        <?php if ($totalRows_ConsultaFuncion==0){ ?>
          <h3>Debe ingresar una poliza <a href="poliza_add.php">click aqui para agregar</a> </h3>
          <?php }else { ?>
        <div class="col-md-10 col-md-offset-1 table-responsive">
          <table class="table table-hover table-bordered custom-table">
            <thead>
    					<tr>
		              <th rowspan="2">Codigo</th>
		              <th rowspan="2">Cuenta</th>
                  <th colspan="2" style=" border: 1px solid #ddd;">Balance de comprobacion</th>
                  <th colspan="2" style=" border: 1px solid #ddd;">Ganancias y perdidas</th>
                  <th colspan="2" style=" border: 1px solid #ddd;">Balance general</th>
    					</tr>
              <tr>
		              <th>Debe</th>
		              <th>Haber</th>
                  <th>Egreso</th>
                  <th>Ingreso</th>
                  <th>Activo</th>
                  <th>Pasivo</th>
    					</tr>
    				</thead>
            <tbody>
                    <?php
                        do{ ?>
                            <tr>
                                <td><?php echo $row_ConsultaFuncion['id_cuenta']?></td>
                                <td style='border-right: 1px solid #ddd;'><?php echo $row_ConsultaFuncion['nombre']?></td> <?php
                                if ($row_ConsultaFuncion['aumenta_por'] == 'debe'){ ?>
                                    <td><?php echo $row_ConsultaFuncion['monto']?></td>
                                    <td style='border-right: 1px solid #ddd;'></td><?php
                                    $montodebe += $row_ConsultaFuncion['monto'];
                                    if($row_ConsultaFuncion['tipo'] == 'nominal'){?>
                                        <td><?php echo $row_ConsultaFuncion['monto']?></td>
                                        <td style='border-right: 1px solid #ddd;'></td>
                                        <td></td>
                                        <td></td>
                            </tr>
                                    <?php $montoegreso += $row_ConsultaFuncion['monto'];
                                }else{?>
                                    <td></td>
                                    <td style='border-right: 1px solid #ddd;'></td>
                                    <td><?php echo $row_ConsultaFuncion['monto'] ?></td>
                                    <td></td>
                            </tr>
                                    <?php $montoactivo += $row_ConsultaFuncion['monto'];
                                }
                            }else{?>
                                <td></td>
                                <td style='border-right: 1px solid #ddd;'><?php echo $row_ConsultaFuncion['monto']?></td> <?php
                                $montohaber += $row_ConsultaFuncion['monto'];
                                if($row_ConsultaFuncion['tipo'] == 'nominal'){?>
                                    <td></td>
                                    <td><?php echo $row_ConsultaFuncion['monto']?></td>
                                    <td></td>
                                    <td></td>
                            </tr><?php
                                    $montoingreso += $row_ConsultaFuncion['monto'];
                                }else{?>
                                    <td></td>
                                    <td style='border-right: 1px solid #ddd;'></td>
                                    <td></td><td><?php echo $row_ConsultaFuncion['monto']?></td>
                            </tr><?php
                                    $montopasivo += $row_ConsultaFuncion['monto'];
                                }
                            }
                        }while ($row_ConsultaFuncion = mysqli_fetch_assoc($ConsultaFuncion)) ?>
                        <tr class="total-tabla-sin borde-arriba">
                            <td class="sin-borde sin-borde-left"></td>
                            <td class="borde-izquierda">Total Suma</td>
                            <td><?php echo $montodebe ?></td>
                            <td><?php echo $montohaber ?></td>
                            <td><?php echo $montoegreso ?></td>
                            <td><?php echo $montoingreso ?></td>
                            <td><?php echo $montoactivo ?></td>
                            <td  class="borde-derecha"><?php echo $montopasivo ?></td>
                        </tr>


                        <?php
                        if ($montoegreso != $montoingreso) {
                            $dif= $montoegreso - $montoingreso; ?>
                            <tr class="total-tabla-sin">
                                <td class="sin-borde sin-borde-left"></td>
                                <td class="borde-izquierda">Utilidad o Perdida</td>
                                <td></td>
                                <td></td><?php
                                if($montoegreso > $montoingreso){
                                    $montoingreso += $dif; ?>
                                    <td class='borde-abajo'></td>
                                    <td class='borde-abajo'><?php echo $dif ?></td><?php
                                }else{
                                    $dif*=(-1);
                                    $montoegreso += $dif; ?>
                                    <td><?php echo $dif?></td>
                                    <td></td><?php
                                }
                        }
                        if ($montoactivo != $montopasivo){
                            $dif = $montoactivo - $montopasivo;
                            if($montoactivo > $montopasivo){
                                $montopasivo += $dif; ?>
                                <td></td>
                                <td class="borde-derecha"><?php echo $dif ?></td>
                            </tr> <?php
                            }else{
                                $dif*=(-1);
                                $montoactivo += $dif; ?>
                                <td><?php echo $dif ?></td>
                                <td class="borde-derecha"></td>
                            </tr><?php
                            }
                        }?>
                        <tr class="total-tabla-sin">
                            <td class="sin-borde sin-borde-left"></td>
                            <td class="borde-izquierda">Total Ganancias y Perdidas</td>
                            <td></td>
                            <td></td>
                            <td><?php echo $montoegreso ?></td>
                            <td><?php echo $montoingreso ?></td>
                            <td class="borde-abajo"></td>
                            <td class="borde-abajo borde-derecha"></td>
                        </tr>
                        <tr class="total-tabla-sin">
                            <td class="sin-borde sin-borde-left"></td>
                            <td class="borde-izquierda borde-abajo">Total Balance General</td>
                            <td class="borde-abajo"></td>
                            <td class="borde-abajo"></td>
                            <td class="borde-abajo"></td>
                            <td class="borde-abajo"></td>
                            <td class="borde-abajo"><?php echo $montoactivo ?></td>
                            <td class="borde-abajo borde-derecha"><?php echo $montopasivo ?></td>
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
