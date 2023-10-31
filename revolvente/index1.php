<?php 

include("functions.php");


$montodispercion_total=10000000;
$dispercionrealizada=3000000;
$tazaAnual=0.30;
$plazo=90;


$intereses_Darios=CalculaIntereses($dispercionrealizada,$tazaAnual);


$fechaInicio = "2023-10-01";
$numMeses = 4;
$fechasDePago = calcularFechasDePagoMensuales($fechaInicio, $numMeses);



$fechaInicioDiario = "2023-11-01";
$numDias = $plazo; // Cambia el número de días según sea necesario
$InteresDiario = CalcularInteresDiario($fechaInicioDiario, $numDias);


$montodespercionrestante = calcularMontodespercionRestante($montodispercion_total, $dispercionrealizada);


$tazadiaria=$tazaAnual/365;

?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">

    <title>Revolvente</title>
</head>
<body>


<div class="container">
  <h4>
    Monto Total de dispersion:
    <?php echo "$".$montodispercion_total?>
  </h4>
  <h4><?php echo "Monto de dispersión restante: " ."$". $montodespercionrestante; ?></h4>
  <h4>Interes diario
  <?php echo "$". $intereses_Darios ; ?>
<h4

<h4>taza de interes diario
  <?php echo $tazadiaria ."%"; ?>
<h4
  
 
    <?php
    $contador = 0;
    foreach ($fechasDePago as $fecha) {
        echo "Pago " . $contador . ": " . $fecha . "<br>";
        $contador++;
    }
    ?>

<div class="container">


  <h4>Pagos diarios:</h4>
  <table>
    <thead>
      <tr>
        <th>Fecha de Pago</th>
        <th>Interés Diario</th>
        <th>IVA</th>
        <th>CAPITAL</th>
      </tr>
    </thead>
    <tbody>
      <?php
      foreach ($InteresDiario as $InteresDiario) {
        echo "<tr>";
        echo "<td>" . $InteresDiario . "</td>";
        echo "<td>" . $intereses_Darios . "</td>";
        echo "<td>  </td>";
        echo "<td> $" . $dispercionrealizada . "</td>";
        echo "</tr>";
      }
      ?>
    </tbody>
  </table>
</div>


</div>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>