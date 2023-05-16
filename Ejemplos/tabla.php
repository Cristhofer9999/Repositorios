<?php 

	$conexion=mysqli_connect("172.20.30.251","destadistica_usr","c0nsult4","centros_educativos");
  
 ?>



<!DOCTYPE html>
<html>
<head>
	<title>mostrar datos</title>
    <!--Bootstrap trabaja con internet-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css" integrity="sha384-xOolHFLEh07PJGoPkLv1IbcEPTNtaed2xpHsD9ESMhqIYd0nLMwNLD69Npy4HI+N" crossorigin="anonymous">     

</head>
<body>
<br>

    <table class="table">
  <thead class="thead-dark">
    <tr>
      <th scope="col">cve_centro</th>
      <th scope="col">curp</th>
      <th scope="col">nombre</th>
      <th scope="col">sostenimiento</th>
    </tr>

    <?php 

    $Prueba = "05EST0001B";
    //function datosCentro($Prueba);
    
		$sql="SELECT
    ce.cve_centro, ce.nombre_centro, ce.cve_turno, ce.cve_sostenimiento,
    dc.calle, dc.cve_localidad, lo.localidad,
    es.estatus, 
    so.sostenimiento,
    mu.cve_municipio, mu.municipio, 
    ne.nivel_educativo
    FROM  centro_educativo AS ce 
    JOIN dato_centro_educativo AS dc ON ce.cve_centro = dc.cve_centro
    JOIN estatus AS es ON ce.cve_estatus = es.cve_estatus
    JOIN municipio AS mu ON dc.cve_municipio = mu.cve_municipio
    JOIN nivel_educativo AS ne ON ce.cve_nivel_educativo = ne.cve_nivel_educativo
    JOIN localidad AS lo ON dc.cve_localidad = lo.cve_localidad AND dc.cve_municipio = lo.cve_municipio
    JOIN dependencia_administrativa AS dp ON ce.cve_dependencia_administrativa = dp.cve_dependencia_administrativa
    JOIN sostenimiento AS so ON ce.cve_sostenimiento = so.cve_sostenimiento AND ce.cve_dependencia_administrativa = so.cve_dependencia_administrativa AND( substr( ce.cve_centro, 3, 1 ) = so.cve_clasificador ) and dp.cve_dependencia_administrativa = so.cve_dependencia_administrativa
    WHERE ce.cve_centro = '$Prueba'"; 

		$result=mysqli_query($conexion,$sql); 
 
        while($mostrar=mysqli_fetch_array($result)){
            ?>
  </thead>

  <tbody>
    <tr>
      <th scope="row"><?php echo $mostrar['cve_centro'] ?></th>
      <td><?php echo $mostrar['nombre_centro'] ?></td>
      <td><?php echo $mostrar['cve_localidad'] ?></td>
      <td><?php echo $mostrar['sostenimiento'] ?></td>
    </tr>
    </tbody> 
    <?php 
	}
	 ?>
    
	</table>

  <!-- <?php 
  // Ejemplo de uso
$consulta = "SELECT * FROM director";
$resultados = function set_sql($consulta);

// Hacer algo con los resultados...
foreach ($resultados as $fila) {
    // Acceder a los datos de cada fila
    echo $fila['columna1'] . " - " . $fila['columna2'] . "<br>";
}
?>   -->


</body>

</html>

