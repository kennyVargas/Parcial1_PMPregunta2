<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>MATERIAS</title>
	<link rel="stylesheet" href="estilos.css">
</head>
<body>
	<h1><center>APROBADOS POR  PORCEDENCIA</center></h1>

<?php 

include ("conexion.php");
$registro=$base->query("SELECT
case d.cod_residencia when '02' then 'LP	La Paz'
				   when '01' then 'CH	Chuquisaca'
				  when '03' then 'CB	Cochabamba'
				  when '04' then 'OR	Oruro'
				  when '05' then 'PT	Potosí'
				  when '06' then 'TJ	Tarija'
				  when '07' then 'SC	Santa Cruz'
				  when '08' then 'BE	Beni'
				  when '09' then 'PD	Pando'
				  else 'otro' end as depto
                  , COUNT(*) aprobados
FROM inscrito i ,identificador d
WHERE i.nota>51 and i.ci=d.ci
group by d.cod_residencia")->fetchAll(PDO::FETCH_OBJ);
 ?>

 <main>
 	<div class="contenedor">
 		<table border="2px">
			<tr>
				<th>PROCEDENCIA</th>
				<th>NRO DE APROBADOS</th>
			</tr>
			
			<?php 
				foreach ($registro as $usu)
				{	echo "<tr>";
					echo "<td>".$usu->depto." </td>";
					echo "<td>".$usu->aprobados."</td>";
					echo "</tr>";
				}
			 ?>
		</table>
 	</div>
 </main>
</body>
</html>