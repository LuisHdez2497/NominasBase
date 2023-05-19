@extends('master')

@section('body')
    <h3 class="text-white text-base text-right mb-2 p-3"><a href="{{ route('vistaCrearEmpleado') }}" class="bg-green-700 font-bold hover:bg-green-900 p-3 rounded-full">Agregar Empleado</a></h3>
    <div class="relative overflow-x-auto w-full shadow-md sm:rounded-lg">
        <table class="w-full text-base text-left text-black">
            <thead class="text-base text-black uppercase bg-gray-300">
            <tr>
                <th scope="col" class="px-6 py-3">
                    Clave
                </th>
                <th scope="col" class="px-6 py-3">
                    Nombre Completo
                </th>
                <th scope="col" class="px-6 py-3">
                    Puesto
                </th>
                <th scope="col" class="px-6 py-3">
                    RFC
                </th>
                <th scope="col" class="px-6 py-3">
                    Modo de Pago
                </th>
                <th scope="col" class="px-6 py-3">
                    Acciones
                </th>
            </tr>
            </thead>
            <tbody>
                @foreach($data as $d)
                    <tr class="border-b bg-gray-50">
                        <th scope="row" class="px-6 py-4 font-medium text-black whitespace-nowrap">
                            {{ $d->clave }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $d->nombre.' '.$d->apellido_paterno.' '.$d->apellido_materno }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $d->puesto }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $d->rfc }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $d->modo_pago }}
                        </td>
                        <td class="px-6 py-4">
                            <a href="{{ route('imprimirNomina', $d->id) }}" target="_blank" title="Imprimir Nomina" class="text-yellow-700 font-bold hover:underline">Nomina <i class="fa-regular fa-file-pdf text-xl"></i></a>
                            <a href="{{ route('vistaEditarEmpleado', $d->id) }}" class="ml-3 text-blue-600 font-bold hover:underline">Editar <i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="{{ route('eliminarEmpleado', $d->id) }}" class="ml-3 text-red-600 font-bold hover:underline">Eliminar <i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
