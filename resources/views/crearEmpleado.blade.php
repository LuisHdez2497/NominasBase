@extends('master')

@section('body')
    <h3 class="mb-5 text-white text-3xl">Agregar Empleado</h3>
    {!! Form::open(array('url' => 'agregar/empleado', 'method' => 'POST')) !!}
    {{Form::token()}}
    <div class="relative overflow-x-auto w-full bg-white p-6 shadow-md sm:rounded-lg">
        <div class="flex flex-wrap mb-6">
            <div class="px-3 w-1/3">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Clave
                </label>
                <input name="clave" readonly value="{{ '0'.$clave }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
        </div>
        <div class="flex flex-wrap mb-6">
            <div class="px-3 w-1/3">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Nombre
                </label>
                <input required name="nombre" placeholder="Nombre" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
            <div class="px-3 w-1/3">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Apellido Paterno
                </label>
                <input required name="apellido_paterno" placeholder="Apellido Paterno" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
            <div class="px-3 w-1/3">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Apellido Materno
                </label>
                <input required name="apellido_materno" placeholder="Apellido Materno" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Correo
                </label>
                <input required name="correo" placeholder="Correo" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="email">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    RFC
                </label>
                <input required name="rfc" placeholder="RFC" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Puesto
                </label>
                <input required name="puesto" placeholder="Puesto" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Sueldo Base
                </label>
                <input required type="number" name="sueldo_base" placeholder="Sueldo Base" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Vales de Despensa
                </label>
                <input required type="number" name="vales_despensa" placeholder="Vales de Despensa" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Modo de Pago
                </label>
                <input required type="text" name="modo_pago" placeholder="Modo de Pago" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Numero de Seguro Social
                </label>
                <input required name="numero_ss" placeholder="Numero de Seguro Social" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
        </div>
        <a href="{{ route('inicio') }}" class="bg-red-500 mx-3 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Volver
        </a>
        <button id="botonGuardar" type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Guardar
        </button>
    </div>
    {!! Form::close() !!}
@endsection
