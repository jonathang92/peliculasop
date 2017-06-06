<?php
require_once('conexion/conexion.php');

global $database, $conexion;
mysqli_select_db( $conexion,$database );
$query_ConsultaCuentas = " SELECT * FROM cuentas ORDER BY nombre ";
$ConsultaCuentas = mysqli_query( $conexion,$query_ConsultaCuentas ) or die(mysql_error());
$row_ConsultaCuentas = mysqli_fetch_assoc($ConsultaCuentas);
$totalRows_ConsultaCuentas = mysqli_num_rows($ConsultaCuentas);

global $database, $conexion;
mysqli_select_db( $conexion,$database );
$query_ConsultaCuentas2 = " SELECT * FROM cuentas ORDER BY nombre ";
$ConsultaCuentas2 = mysqli_query( $conexion,$query_ConsultaCuentas2 ) or die(mysql_error());
$row_ConsultaCuentas2 = mysqli_fetch_assoc($ConsultaCuentas2);
$totalRows_ConsultaCuentas2 = mysqli_num_rows($ConsultaCuentas2);

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
        <li class="active">Polizas</li>
        <li class="active">Agregar Poliza</li>
      </ol>
  </div>
  <div class="container">
    <div class="well form-custom">
      <form class="form-horizontal" action="conexion/add_poliza.php" method="POST">
      <fieldset>
        <legend>Agregar Poliza</legend>
        <div class="form-group">
          <label for="cuenta-1" class="col-lg-2 control-label">Tipo de Poliza</label>
          <div class="col-lg-3">
            <select class="form-control" id="cuenta-1" name="tipo_cuenta" required>
                <option value="">Seleccione el tipo de poliza</option>
                <option value="2">Poliza de Ingreso</option>
                <option value="3">Poliza de Egreso</option>
                <option value="4">Poliza de Cheque</option>
            </select>
          </div>
        </div>
        <div class="form-group">
          <label for="fecha" class="col-lg-2 control-label">Fecha</label>
          <div class="col-lg-2">
            <div class="input-group">
              <input class="form-control" id="fecha" placeholder="2017-10-07" type="text" name="fecha" required="">
              <span class="input-group-addon"><i class="fa fa-calendar"></i></span>
            </div>
          </div>
        </div>
        <div class="col-md-10 col-md-offset-1">
          <div class="row col-lg-4">
            <legend>Asientos</legend>
          </div>
          <div class="col-lg-8">
            <a id="sumar"  class="btn btn-success"><i class="fa fa-plus"></i></a>
            <a id="restar" class="btn btn-danger"><i class="fa fa-minus"></i></a>
          </div>
          <br>
          <div id="asientos" class="col-lg-12">
            <div class="asiento">
              <div class="col-md-10 col-md-offset-1">
                <h4>Asiento numero 1</h4>
              </div>
              <div class="form-group">
                <label for="cuenta-1" class="col-lg-2 control-label">Cuenta</label>
                <div class="col-lg-6">
                  <select class="form-control" id="cuenta-1" name="valor[1][cuenta]" required="">
                    <option value="">Seleccione la cuenta</option>
                    <?php do { ?>
                      <option value="<?php echo $row_ConsultaCuentas['id']; ?>"><?php echo $row_ConsultaCuentas['nombre']; ?></option>
                    <?php }while ($row_ConsultaCuentas = mysqli_fetch_assoc($ConsultaCuentas)); ?>
                  </select>
                </div>
              </div>
              <div class="form-group">
                <label for="monto" class="col-lg-2 control-label">Monto</label>
                <div class="col-lg-6">
                  <div class="input-group">
                    <input class="form-control" id="monto" placeholder="2600" type="text" name="valor[1][monto]" required="">
                    <div class="input-group-btn select-monto">
                      <select class="form-control" id="select" name="valor[1][aumenta_por]">
                        <option value="debe">Debe</option>
                        <option value="haber">Haber</option>
                      </select>
                    </div><!-- /btn-group -->
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="form-group">
          <label for="textArea" class="col-lg-2 control-label">Detalle del concepto:</label>
          <div class="col-lg-6">
            <textarea class="form-control" rows="3" id="textArea" name="concepto" required></textarea>
            <span class="help-block">Especifique el concepto.</span>
          </div>
        </div>
        <div class="form-group">
          <div class="col-lg-10 col-lg-offset-1">
            <a href="index.php" class="btn btn-default">Cancelar</a>
            <button type="submit" class="btn btn-primary">Guardar</button>
          </div>
        </div>
      </fieldset>
    </form>
    </div>
  </div>
  <!-- //Contenido -->
  <?php include 'includes/footer.php'; ?>
  <script type="text/javascript">
  $("#sumar").click(function(){
    var count = $("#asientos .asiento").length;
    count = count+1;
    $('#asientos').append("\
    <div class='asiento animated fadeInUp'>\
      <div class='col-md-10 col-md-offset-1'>\
        <h4>Asiento numero "+count+"</h4>\
      </div>\
      <div class='form-group'>\
        <label for='cuenta-1' class='col-lg-2 control-label'>Cuenta</label>\
        <div class='col-lg-6'>\
          <select class='form-control' id='cuenta-1' name='valor["+count+"][cuenta]' required=''>\
            <option value=''>Seleccione la cuenta</option>\
            <?php do { ?>
              <option value='<?php echo $row_ConsultaCuentas2['id']; ?>'><?php echo $row_ConsultaCuentas2['nombre']; ?></option>\
            <?php }while ($row_ConsultaCuentas2 = mysqli_fetch_assoc($ConsultaCuentas2)); ?>
          </select>\
        </div>\
      </div>\
      <div class='form-group'>\
        <label for='monto' class='col-lg-2 control-label'>Monto</label>\
        <div class='col-lg-6'>\
          <div class='input-group'>\
            <input class='form-control' id='monto' placeholder='2600' type='text' name='valor["+count+"][monto]' required=''>\
            <div class='input-group-btn select-monto'>\
              <select class='form-control' id='select' name='valor["+count+"][aumenta_por]'>\
                <option value='debe'>Debe</option>\
                <option value='haber'>Haber</option>\
              </select>\
            </div><!-- /btn-group -->\
          </div>\
        </div>\
      </div>\
    </div>\
    ");

  });
  </script>
  </body>
</html>
