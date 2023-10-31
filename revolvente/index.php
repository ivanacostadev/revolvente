<?php 

include("functions.php");

//Info de disposicion
$Cliente="Sierra Blanca Ranch";
$MontoLinea=10000000;
$MontoAutorizadoUSD="";

//DispersionRelaizada
$fechaInicialDisp="";
$dispercionrealizada=3000000;
$RestoLinea= calcularMontodespercionRestante($MontoLinea,$dispercionrealizada);


//Taza de Intereses
$IVA=0.16;
$Moratoria=0.45;

//Viene del contrato 
//Puntod adicinales a la TIIE,
$tazaFija=24.98;
//Cal
$TIIE=11.5;
$tazaVar=$tazaFija+$TIIE;
$tazaVariable=$tazaVar/100;

$tazaAnual=0.30;
$ShowTA=$tazaAnual*100;

//Dates
$dt_Corte_intereses=26;
$plazoDias=90;


//PARA HACER LOS CALCULOS FECHA DE PAGO 
$fechaInicioDiario = "2023-11-01";
$numDias = $plazoDias; 

$fechasDepago=FechasPagos($fechaInicialDisp,$plazoDias);
//INTERESES DIARIOS 

$interesDiario=CalculaIntereses($dispercionrealizada,$tazaVariable);
$aformatInteresDiario=CalculoIntereses2($dispercionrealizada,$tazaAnual);
//$interesDiario=number_format($aformatInteresDiario, 2, '.', '');
//IVA
$IVAInteres=CalculoIVA($interesDiario,$IVA);
//TOTAL INTERES + IVA
$TotalInteres=$interesDiario+$IVAInteres;






//ABONOS
$Abonos=0;
$fechaAbono="2024-01-26";


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

<!--Tabla suponinedo que se abre el detalle de una disposicion-->
<div class="container">
<div class="card">

<div class="card-title">

</div> 


<div class='card-body'>
<div class="container">
    <h2>Credito Revolvente</h2>

    <h6><?php echo "Nombre del cliente:". $Cliente; ?></h6>
    <h6><?php echo "Monto de linea:"." ". "$". $MontoLinea; ?></h6>
    <h6><?php echo "Taza Anual:" .$ShowTA."%"; ?></h6>
    <h6> <?php echo "Taza Variable:"." " .$tazaVar ."%"?></h6>
    <h6><?php echo "Fecha de pago de intereses:" . $dt_Corte_intereses." ". "de cada mes"; ?></h6>


    <h6><?php echo "Resto de linea:$". $RestoLinea; ?></h6>
  
    <table class="table">
    <thead>
        <tr>
            <th>#PAGOS</th>
            <th>FECHAS DE PAGO</th>
            <th>CAPITAL</th>
            <th>ABONO</th>
            <th>INTERESES</t>
            <th>IVA</th>
            <th>TOTAL</th>
            <th>ACUMULADO</th>
        </tr>
    </thead>
    <tbody>

        <?php 

        
// Verifica si $Abono tiene un valor
if (!empty($Abonos)) {
  // Convierte $Abono a un número (por si acaso está en formato de cadena)
  $Abonos = floatval($Abonos);
  
  // Resta $Abonos de $dispercionrealizada
  $dispercionrealizada -= $Abonos;

  // Actualiza los cálculos relacionados, por ejemplo, el interés diario y el acumulado
  $interesDiario = CalculoIntereses2($dispercionrealizada, $tazaAnual);
  $IVAInteres = CalculoIVA($interesDiario, $IVA);
  $TotalInteres = $interesDiario + $IVAInteres;
  $acumuladoIntereses = 0;
  $acumuladoIntereses += $TotalInteres;
}
        $acumuladoIntereses = 0; // Inicializamos la variable acumuladoIntereses en 0

    
        if (in_array($fechaAbono , $fechasDepago)){
          $hubopago="Hay Pago";
        }
        else{
          $hubopago="No hay pago";
        }

    

        foreach($fechasDepago as $fechapago){

    
  
            echo "<tr>";
            echo "<td>  </td>";
            echo "<td>".$fechapago."</td>";
    
            echo "<td>"."$".$dispercionrealizada."</td>";
   
            echo "<td>  </td>";
   
        
            echo "<td>" ."$".$interesDiario." </td>";

 
            echo "<td>" ."$" .$IVAInteres. "</td>";
               

            echo "<td>"."$" .$TotalInteres. "</td>";
         
            
            // Actualizamos el valor acumulado
            $acumuladoIntereses += $TotalInteres;

            echo "<td>" ."$".$acumuladoIntereses."</td>";
    

            echo "</tr>";
        }
        ?>

        </tr>
        <!-- Puedes agregar más filas según sea necesario -->
    </tbody>
</table>

</div>

</div>
</div>






<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.8/dist/umd/popper.min.js" integrity="sha384-I7E8VVD/ismYTF4hNIPjVp/Zjvgyol6VFvRkX/vR+Vc4jQkC+hVqc2pM8ODewa9r" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.min.js" integrity="sha384-BBtl+eGJRgqQAUMxJ7pMwbEyER4l1g+O15P+16Ep7Q9Q+zqX6gSbd85u4mG4QzX+" crossorigin="anonymous"></script>
</body>
</html>