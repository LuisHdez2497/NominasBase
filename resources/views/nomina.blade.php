<!DOCTYPE html>
<html>
<head>
    <title>Nomina</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            font-size: 11px;
        }
        table {
            width: 100%;
            margin-bottom: 20px;
            border-collapse: collapse;
        }
        th, td {
            padding: 10px;
            border: 1px solid #ddd;
        }
    </style>
</head>
<body>
<h1>Nomina</h1>
<table>
    <tr>
        <td style="background-color: rgba(226,232,240); font-weight: bold">RFC:</td>
        <td style="border-right: none; text-align: center; background-color: rgba(226,232,240); font-weight: bold">NOMBRE</td>
        <td style="border-left: none; text-align: center; background-color: rgba(226,232,240); font-weight: bold; border-right: none">APELLIDO PATERNO</td>
        <td style="border-left: none; text-align: center; background-color: rgba(226,232,240); font-weight: bold;">APELLIDO MATERNO</td>
        <td style="background-color: rgba(226,232,240); font-weight: bold;">FECHA:</td>
        <td>{{ $fecha }}</td>
    </tr>
    <tr>
        <td>{{ strtoupper($rfc) }}</td>
        <td style="border-right: none; text-align: center;">{{ strtoupper($nombre) }}</td>
        <td style="border-left: none; text-align: center; border-right: none">{{ strtoupper($apellido_paterno) }}</td>
        <td style="border-left: none; text-align: center;">{{ strtoupper($apellido_materno) }}</td>
        <td style="background-color: rgba(226,232,240); font-weight: bold;">TIPO DE PAGO:</td>
        <td>{{ strtoupper($modo_pago) }}</td>
    </tr>
    <tr>
        <td style="background-color: rgba(226,232,240); font-weight: bold;">PUESTO:</td>
        <td>{{ strtoupper($puesto) }}</td>
        <td style="background-color: rgba(226,232,240); font-weight: bold;">DIAS PAGADOS:</td>
        <td>{{ $dias_pagados }}</td>
        <td style="border-right: none; border-bottom: none"></td>
        <td style="border: none"></td>
    </tr>
</table>
<table style="width: 50%; float: right">
    <tr>
        <td style="text-align: right; background-color: rgba(226,232,240); font-weight: bold">CONCEPTO</td>
        <td style="text-align: left; background-color: rgba(226,232,240); font-weight: bold">IMPORTE</td>
    </tr>
    <tr>
        <td style="text-align: right">
            <p>SUELDO BASE:</p>
            <hr>
            <p>SUELDO X DIAS PAGADOS:</p>

            @if($vales_despensa != '0')
                <p>VALES DE DESPENSA:</p>
            @endif

            @if($puntualidad != '0')
                <p>PUNTUALIDAD(1.6%):</p>
            @endif

            @if($compensaciones != '0')
                <p>COMPENSACIONES(2.3%):</p>
            @endif

            @if($vacaciones != '0.00')
                <p>VACACIONES (2.7%):</p>
            @endif
            <hr>
            <p>TOTAL:</p>
        </td>
        <td style="text-align: left">
            <p>{{'$'.$sueldo_bruto}}</p>
            <hr>
            <p>{{'$'.$sueldo_mensual}}</p>

            @if($vales_despensa != '0')
                <p>+ {{'$'.$vales_despensa}}</p>
            @endif

            @if($puntualidad != '0')
            <p>+ {{'$'.$puntualidad}}</p>
            @endif

            @if($compensaciones != '0')
                <p>+ {{'$'.$compensaciones}}</p>
            @endif

            @if($vacaciones != '0.00')
                <p>+ {{'$'.$vacaciones}}</p>
            @endif
            <hr>
            <p>{{'$'.$total_percepciones}}</p>
        </td>
    </tr>
    <tr>
        <td style="text-align: right">
            <p>ISR (2.88%):</p>
            <p>IMSS (6.25%):</p>
            <p>INFONAVIT (5%):</p>
            <hr>
            <p>TOTAL:</p>
        </td>
        <td style="text-align: left">
            <p>- {{'$'.$isr}}</p>
            <p>- {{'$'.$imss}}</p>
            <p>- {{'$'.$infonavit}}</p>
            <hr>
            <p>{{'$'.$sueldo_neto}}</p>
        </td>
    </tr>
</table>
</body>
</html>
