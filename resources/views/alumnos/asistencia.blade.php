<x-app-layout>
    <x-slot name="breadcrumb">
        <x-breadcrumb><a href="/">Dashboard</a> / <u>Gestion Asistencia</u></x-breadcrumb>
    </x-slot>

    <x-slot name="slot">
        <div class="py-2 xl:py-6">
            <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
                <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                    <div class="p-2 2xl:p-4 bg-white border-b border-gray-200">

                        <x-table>
                            @section('nombre-columna')
                                <tr>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Fecha
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Horario
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Tipo de Clase
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Profesor
                                    </th>
                                    <th scope="col"
                                        class="px-6 py-3 text-center text-xs font-medium text-gray-500 uppercase tracking-wider">
                                        Asistencia
                                    </th>
                                </tr>
                            @endsection


                            @section('contenido-filas')
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        04/01/21
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        8:00
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        Funcional
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        andresbrice
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        Presente
                                    </td>
                                </tr>
                            @endsection
                            @section('contenido-filas')
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        06/01/21
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        8:00
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        Funcional
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        andresbrice
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        Presente
                                    </td>
                                </tr>
                            @endsection
                            @section('contenido-filas')
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        08/01/21
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        8:00
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        Funcional
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        andresbrice
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        Ausente
                                    </td>
                                </tr>
                            @endsection
                            @section('contenido-filas')
                                <tr>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        10/01/21
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        8:00
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-center">
                                        Funcional
                                    </td>

                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        andresbrice
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium">
                                        Presente
                                    </td>
                                </tr>
                            @endsection
                            
                        </x-table>
                    </div>
                </div>
            </div>
        </div>
    </x-slot>
</x-app-layout>
