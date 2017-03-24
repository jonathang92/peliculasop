 <?php
 require_once('../conexion/conexion.php');

 global $database, $conexion;
 mysqli_select_db( $conexion,$database );
 $query_ConsultaCuentas = " SELECT * FROM cuentas ORDER BY nombre ";
 $ConsultaCuentas = mysqli_query( $conexion,$query_ConsultaCuentas ) or die(mysql_error());
 $row_ConsultaCuentas = mysqli_fetch_assoc($ConsultaCuentas);
 $totalRows_ConsultaCuentas = mysqli_num_rows($ConsultaCuentas);

 ?>
  <div class="asiento">
    <div class="col-md-10 col-md-offset-1">
      <h4>Asiento numero <?php echo $_GET['count'] ?></h4>
    </div>
    <div class="form-group">
      <label for="cuenta-1" class="col-lg-2 control-label">Cuenta</label>
      <div class="col-lg-6">
        <select class="form-control" id="cuenta-1" name="valor[<?php echo $_GET['count'] ?>][cuenta]" required="">
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
          <input class="form-control" id="monto" placeholder="2600" type="text" name="valor[<?php echo $_GET['count'] ?>][monto]" required="">
          <div class="input-group-btn select-monto">
            <select class="form-control" id="select" name="valor[<?php echo $_GET['count'] ?>][aumenta_por]">
              <option value="debe">Debe</option>
              <option value="haber">Haber</option>
            </select>
          </div><!-- /btn-group -->
        </div>
      </div>
    </div>
  </div>
