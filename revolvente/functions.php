<?php



//Clacula fechas de pago dependiendo los meses,calcula mesescon 30 y 31 dias.
function calcularFechasDePagoMensuales($fechaInicio, $numMeses) {
    //array donde se almacenaran las fechas;
    $fechasDePago = array();

    // Convierte la fecha inicial que se mande a un objeto de fecha
    $fechaActual = new DateTime($fechaInicio);

    // Calcula las fechas de pago para los próximos numeros de meses que se indiquen.
    for ($i = 0; $i < $numMeses; $i++) {
        // Obtener el último día del mes actuasl
        $ultimoDiaDelMes = $fechaActual->format('Y-m-t');

        // Agregar la fecha de pago al array
        $fechasDePago[] = $ultimoDiaDelMes;

        // Avanzar al siguiente mes
        $fechaActual->modify('+1 month');
    }

    return $fechasDePago;
}


//Calcular dia de pago
function FechasPagos($fechaInicialDisp,$plazoDias){
    $fechasDias=array();
    $fechaActual=new DateTime($fechaInicialDisp);
    for($i = 0; $i <$plazoDias; $i++){
        $fechasDias[]=$fechaActual->format('Y-m-d');
        $fechaActual->modify('+1 day');
    }
    return $fechasDias;
}


//Dispercion
function calcularMontodespercionRestante($MontoLinea, $dispercionrealizada) {
    $montodespercionrestante = $MontoLinea - $dispercionrealizada;
    return $montodespercionrestante;
}


//Intereses al dia.//
function CalculaIntereses($dispercionrealizada,$tazaVariable){
    //Taza deinteres diaria
    $rd=$tazaVariable/365;
    $InteresalDia=$rd*$dispercionrealizada;

    return $InteresalDia;

}

function CalculoIntereses2($dispercionrealizada,$tazaAnual){

    $rd=$tazaAnual/360;
    $DayliInterest=$dispercionrealizada*$rd;
    return $DayliInterest;

}

function CalculoIVA($interesDiario,$IVA){
    $IVAResult=$interesDiario*$IVA;
    return $IVAResult;
}


//Funcion si existe Otra dispersion;


//Funcion de abono
function AbonoACapital($Abono,$dispercionrealizada){
    return;
}

//Funcion Pago de intereses

function PagoIntereses(){
    return;
}

//Funcion





?>