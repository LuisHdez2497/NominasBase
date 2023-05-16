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
                            <button onclick="mostrarModal({{$d->id}})" type="button" data-href="{{$d->id}}" title="Imprimir Nomina" class="text-yellow-700 font-bold hover:underline">Nomina <i class="fa-regular fa-file-pdf text-xl"></i></button>
                            <a href="{{ route('vistaEditarEmpleado', $d->id) }}" class="ml-3 text-blue-600 font-bold hover:underline">Editar <i class="fa-regular fa-pen-to-square"></i></a>
                            <a href="{{ route('eliminarEmpleado', $d->id) }}" class="ml-3 text-red-600 font-bold hover:underline">Eliminar <i class="fa-solid fa-trash"></i></a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>

    <div id="modal-nomina" tabindex="-1" role="dialog" aria-hidden="true" class="fixed inset-0 z-50 hidden w-full p-4 overflow-x-hidden overflow-y-auto max-h-full">
        <div class="relative w-full mx-auto max-w-md max-h-full">
            <!-- Modal content -->
            <div class="relative rounded-lg shadow bg-gray-700">
                <button onclick="ocultarModal()" type="button" class="absolute top-3 right-2.5 text-gray-400 bg-transparent rounded-lg text-sm p-1.5 ml-auto inline-flex items-center hover:bg-gray-800 hover:text-white">
                    <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
                    <span class="sr-only">Close modal</span>
                </button>
                <div class="px-6 py-6 lg:px-8">
                    <h3 class="mb-4 text-xl font-medium text-white">Imprimir Recibo de Nomina</h3>
                    <div class="space-y-6">
                        <div>
                            <label for="compensaciones" class="block mb-2 text-sm font-medium text-white">Compensaciones</label>
                            <input placeholder="Ingrese el monto" id="compensaciones" type="number" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white">
                        </div>
                        <div>
                            <label for="puntualidad" class="block mb-2 text-sm font-medium text-white">Puntualidad</label>
                            <input placeholder="Ingrese el monto" id="puntualidad" type="number" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white">
                        </div>
                        <div>
                            <label for="dias_vacaciones" class="block mb-2 text-sm font-medium text-white">Dias de Vacaciones</label>
                            <input placeholder="Ingrese los dias de vacaciones" id="dias_vacaciones" type="number" class="border text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 bg-gray-600 border-gray-500 placeholder-gray-400 text-white">
                        </div>
                        <button id="generar_nomina" class="w-full btn-ok text-white focus:ring-4 focus:outline-none font-medium rounded-lg text-sm px-5 py-2.5 text-center bg-blue-600 hover:bg-blue-700 focus:ring-blue-800">Generar Nomina</button>
                        <a id="redireccionar-nomina" target="_blank" href="" class="btn-ok d-none"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection
