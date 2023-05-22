@extends('master')

@section('body')
    <h3 class="mb-5 text-white text-3xl">Editar Empleado</h3>
    {!! Form::model($data, ['method' => 'PATCH', 'route' =>['actualizarEmpleado', $data->id]]) !!}
    {{Form::token()}}
    <div class="relative overflow-x-auto w-full bg-white p-6 shadow-md sm:rounded-lg">
        <div class="flex flex-wrap mb-6">
            <div class="px-3 w-1/3">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Clave
                </label>
                <input name="clave" readonly value="{{ $data->clave }}" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
        </div>
        <div class="flex flex-wrap mb-6">
            <div class="px-3 w-1/3">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Nombre
                </label>
                <input required value="{{ $data->nombre }}" name="nombre" placeholder="Nombre" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
            <div class="px-3 w-1/3">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Apellido Paterno
                </label>
                <input required value="{{ $data->apellido_paterno }}" name="apellido_paterno" placeholder="Apellido Paterno" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
            <div class="px-3 w-1/3">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Apellido Materno
                </label>
                <input required value="{{ $data->apellido_materno }}" name="apellido_materno" placeholder="Apellido Materno" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Correo
                </label>
                <input required value="{{ $data->correo }}" name="correo" placeholder="Correo" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="email">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    RFC
                </label>
                <input required value="{{ $data->rfc }}" name="rfc" placeholder="RFC" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Puesto
                </label>
                <input required value="{{ $data->puesto }}" name="puesto" placeholder="Puesto" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Sueldo Base
                </label>
                <input required value="{{ $data->sueldo_base }}" type="number" name="sueldo_base" placeholder="Sueldo Base" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Vales de Despensa
                </label>
                <input required value="{{ $data->vales_despensa }}" type="number" name="vales_despensa" placeholder="Vales de Despensa" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Modo de Pago
                </label>
                <input required value="{{ $data->modo_pago }}" type="text" name="modo_pago" placeholder="Modo de Pago" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500">
            </div>
            <div class="px-3 w-1/3 mt-6">
                <label class="block uppercase tracking-wide text-gray-700 text-base font-bold mb-2" for="grid-last-name">
                    Numero de Seguro Social
                </label>
                <input required value="{{ $data->numero_ss }}" name="numero_ss" placeholder="Numero de Seguro Social" class="appearance-none block w-full bg-gray-200 text-gray-700 border border-gray-200 rounded py-3 px-4 leading-tight focus:outline-none focus:bg-white focus:border-gray-500" type="text">
            </div>
        </div>

        <hr class="mb-2">
            <div class="px-3 w-full">
                <table class="w-full text-base mt-5 text-left text-black">
                    <thead class="text-base text-black uppercase bg-gray-300">
                    <tr>
                        <th scope="col" class="px-6 py-3">
                            Fecha de Inicio
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Fecha de Termino
                        </th>
                        <th scope="col" class="px-6 py-3">
                            Acciones
                        </th>
                    </tr>
                    </thead>
                    <tbody>
                    @foreach($data->incapacidades as $d)
                        <tr class="border-b bg-gray-50">
                            <td class="px-6 py-4">
                                {{ $d->fecha_inicio }}
                            </td>
                            <td class="px-6 py-4">
                                {{ $d->fecha_fin }}
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{ route('eliminarIncapacidad', $d->id) }}" class="ml-3 text-red-600 font-bold hover:underline">Eliminar <i class="fa-solid fa-trash"></i></a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        </div>

        <hr class="mb-2">
        <a href="{{ route('inicio') }}" class="bg-red-500 mx-3 hover:bg-red-700 text-white font-bold py-2 px-4 rounded">
            Volver
        </a>
        <button id="botonGuardar" type="submit" class="bg-green-500 hover:bg-green-700 text-white font-bold py-2 px-4 rounded">
            Guardar
        </button>
    </div>
    {!! Form::close() !!}
@endsection
