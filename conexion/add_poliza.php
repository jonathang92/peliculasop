<?php require_once('conexion.php'); ?>

<?php

if(isset($_POST["tipo_cuenta"])){

    if (!function_exists("GetSQLValueString")) {
        function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "")
        {
            //Iniciamos la variable $conexion
            global $con;

            if (PHP_VERSION < 6) {
                $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
            }

            //Agregamos $conexion en las funciones mysqli_real_escape_string y mysqli_escape_string
            $theValue = function_exists("mysqli_real_escape_string") ? mysqli_real_escape_string($con,$theValue) : mysqli_escape_string($con,$theValue);

            switch ($theType) {
                case "text":
                    $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                    break;
                case "long":
                case "int":
                    $theValue = ($theValue != "") ? intval($theValue) : "NULL";
                    break;
                case "double":
                    $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
                    break;
                case "date":
                    $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
                    break;
                case "defined":
                    $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
                    break;
            }
            return $theValue;
        }
    }


	$editFormAction = $_SERVER['PHP_SELF'];

	if (isset($_SERVER['QUERY_STRING'])) {
 		$editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
	}

  function consultarsiguiente($_tipo){
    // echo "1";
  global $database, $conexion;
  mysqli_select_db( $conexion,$database);
  $query_ConsultaConcepto = sprintf("SELECT DISTINCT numero FROM poliza WHERE id_tipo= %s",$_tipo);
  $ConsultaConcepto = mysqli_query( $conexion,$query_ConsultaConcepto ) or die(mysqli_error($conexion));
  $row_ConsultaConcepto = mysqli_fetch_assoc($ConsultaConcepto);
  $totalRows_ConsultaConcepto = mysqli_num_rows($ConsultaConcepto);
  // $prueba=1;
  // return $prueba;
  return $totalRows_ConsultaConcepto;

  mysqli_free_result($totalRows_ConsultaConcepto);
  }



	$id_tipo = $fecha = $concepto = 0;
	$id_tipo = $_POST['tipo_cuenta'];
	$fecha = $_POST['fecha'];
  $concepto = $_POST['concepto'];
  $numero = consultarsiguiente($id_tipo)+1;
  echo $numero;
  echo $numero;
foreach($_POST['valor'] as $valor) {
  $insertSQL = sprintf("INSERT INTO  poliza (id_tipo,numero,fecha,id_cuenta,monto,aumenta_por,concepto) VALUES (%s,%s,%s,%s,%s,%s,%s)",

        GetSQLValueString($id_tipo, "int" ),
        GetSQLValueString($numero, "int"),
        GetSQLValueString($fecha, "date"),
        GetSQLValueString($valor['cuenta'], "text"),
        GetSQLValueString($valor['monto'], "text"),
        GetSQLValueString($valor['aumenta_por'], "text"),
        GetSQLValueString($concepto, "text"));

  mysqli_select_db($conexion,$database);
  mysqli_query($conexion,$insertSQL) or die(mysqli_error($conexion));
}





	echo 1;

$insertGoTo = "../poliza.php?tipo=".$_POST['tipo_cuenta'];
header(sprintf("Location: %s", $insertGoTo));

}
?>
