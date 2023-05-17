<?php

namespace App\Http\Controllers;

use App\Models\Empleado;
use App\Models\Incapacidad;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function inicio(){
        $data = Empleado::all()->load('incapacidades');
        return view('inicio', ['data' => $data]);
    }

    public function vistaCrearEmpleado(){
        $claveFinal = Empleado::select('clave')->withTrashed()->orderBy('clave', 'desc')->pluck('clave')->first();
        $clave = $claveFinal+1;
        return view('crearEmpleado', ['clave' => $clave]);
    }

    public function guardarEmpleado(Request $request){
        $data['clave'] = $request->clave;
        $data['nombre'] = $request->nombre;
        $data['apellido_paterno'] = $request->apellido_paterno;
        $data['apellido_materno'] = $request->apellido_materno;
        $data['numero_ss'] = $request->numero_ss;
        $data['rfc'] = $request->rfc;
        $data['puesto'] = $request->puesto;
        $data['sueldo_base'] = $request->sueldo_base;
        $data['modo_pago'] = $request->modo_pago;
        $data['correo'] = $request->correo;

        Empleado::create($data);

        return Redirect::to('/');
    }

    public function actualizarEmpleado(Request $request, $empleado_id){
        $empleado = Empleado::findOrFail($empleado_id);

        $data['clave'] = $request->clave;
        $data['nombre'] = $request->nombre;
        $data['apellido_paterno'] = $request->apellido_paterno;
        $data['apellido_materno'] = $request->apellido_materno;
        $data['numero_ss'] = $request->numero_ss;
        $data['rfc'] = $request->rfc;
        $data['puesto'] = $request->puesto;
        $data['sueldo_base'] = $request->sueldo_base;
        $data['modo_pago'] = $request->modo_pago;
        $data['correo'] = $request->correo;

        $empleado->update($data);

        return Redirect::to('/');
    }

    public function vistaEditarEmpleado($empleado_id){
        $data = Empleado::findOrFail($empleado_id)->load('incapacidades');
        return view('editarEmpleado', ['data' => $data]);
    }

    public function actualizarPercepcionesEmpleado(Request $request, $empleado_id){
        $empleado = Empleado::findOrFail($empleado_id);

        $data['compensaciones'] = $request->compensaciones;
        $data['puntualidad'] = $request->puntualidad;
        $data['dias_vacaciones'] = $request->dias_vacaciones;

        $empleado->update($data);

        return response()->json('Exito');
    }

    public function agregarIncapacidad(Request $request, $empleado_id){
        $data['empleado_id'] = $empleado_id;
        $data['fecha_inicio'] = $request->fecha_inicio;
        $data['fecha_fin'] = $request->fecha_fin;

        $date1 = $request->fecha_inicio;
        $date2 = $request->fecha_fin;

        $timestamp1 = strtotime($date1);
        $timestamp2 = strtotime($date2);

        $seconds_diff = $timestamp2 - $timestamp1;
        $days_diff = floor($seconds_diff / (60 * 60 * 24));

        $data['numero_dias'] = $days_diff;
        Incapacidad::create($data);
        return response()->json('Exito');
    }

    public function eliminarIncapacidad($incapacidad_id){
        Incapacidad::findOrFail($incapacidad_id)->delete();
        return Redirect::back();
    }

    public function imprimirNomina($empleado_id){
        $empleado = Empleado::findOrFail($empleado_id);

        $mesActual = date("n");
        $dias = 0;

        if (count($empleado->incapacidades) > 0){
            foreach ($empleado->incapacidades as $incapacidad){
                $fechaString = $incapacidad->fecha_inicio;
                $fecha = date_parse_from_format("Y-m-d", $fechaString);
                $mes = $fecha['month'];
                if ($mesActual == $mes){
                    $dias += $incapacidad->numero_dias;
                }
            }
        }

        $sueldoBase = $empleado->sueldo_base;
        $porcentajeISR = 10.88;
        $porcentajeIMSS = 6.25;
        $porcentajeINFONAVIT = 5;
        $salarioMinimo = 207.44;

        $data['nombre'] = $empleado->nombre;
        $data['apellido_paterno'] = $empleado->apellido_paterno;
        $data['apellido_materno'] = $empleado->apellido_materno;
        $data['rfc'] = $empleado->rfc;
        $data['fecha'] = now()->format('d/m/Y');
        $data['puesto'] = $empleado->puesto;
        $data['modo_pago'] = $empleado->modo_pago;
        $data['sueldo_bruto'] = number_format($sueldoBase, 2);
        $data['dias_pagados'] = 30-$dias; //Cambiar por resta de dias de incapacidad a 30 dias.

        //Percepciones
        $data['compensaciones'] = $empleado->compensaciones;
        $data['puntualidad'] = $empleado->puntualidad;
        $data['dias_vacaciones'] = $empleado->dias_vacaciones;
        $data['vacaciones'] = number_format((($sueldoBase / 30) * $empleado->dias_vacaciones), 2);
        $data['vales_despensa'] = $empleado->vales_despensa == null ? '0' : $empleado->vales_despensa;
        //Fin Percepciones

        //Deducciones
        $data['isr'] = number_format((($sueldoBase) * ($porcentajeISR / 100)), 2);
        $data['imss'] = number_format(($sueldoBase * ($porcentajeIMSS / 100)), 2);
        $data['infonavit'] = number_format((($sueldoBase - (3 * $salarioMinimo)) * ($porcentajeINFONAVIT / 100)), 2);
        //Fin Deducciones

        $sueldoMes = (($sueldoBase / 30) * $data['dias_pagados']);
        $data['sueldo_mensual'] = number_format($sueldoMes, 2);
        $sueldoPercepciones = $sueldoMes+$empleado->compensaciones+$empleado->puntualidad+(($sueldoBase / 30) * $empleado->dias_vacaciones)+$empleado->vales_despensa;
        $data['total_percepciones'] = number_format($sueldoPercepciones, 2);
        $sueldoNeto = $sueldoPercepciones-(($sueldoBase) * ($porcentajeISR / 100))-($sueldoBase * ($porcentajeIMSS / 100))-(($sueldoBase - (3 * $salarioMinimo)) * ($porcentajeINFONAVIT / 100));

        $data['sueldo_neto'] = number_format($sueldoNeto, 2);

        $datos['compensaciones'] = '0';
        $datos['puntualidad'] = '0';
        $datos['dias_vacaciones'] = '0';

        $empleado->update($datos);

        $pdf = Pdf::loadView('nomina', $data);

        return $pdf->stream('nomina.pdf');
    }

    public function eliminarEmpleado($empleado_id){
        Incapacidad::where('empleado_id', $empleado_id)->delete();
        Empleado::findOrFail($empleado_id)->delete();

        return Redirect::to('/');
    }
}
