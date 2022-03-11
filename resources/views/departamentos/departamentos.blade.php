<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Gestión de departamentos
        </h2>
    </x-slot>
    <div>
        @if (session('succes'))
           <div class="alert alert-success bg-green-400">
             {{ session('succes') }}
           </div>
               @endif
           @if (session('fault'))
           <div class="alert alert-success bg-red-500">
             {{ session('fault') }}
           </div>
           @endif
       </div>
    <div class="flex flex-col items-center mt-4">
        <h1 class="mb-4 text-2xl font-semibold">Departamentos</h1>

        <div class="border border-gray-200 shadow">
            <table>
                <thead class="bg-gray-50">
                    <tr>
                        <th class="px-6 py-2 text-xs text-gray-500">
                                Denominación
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                                Localidad
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Editar
                        </th>
                        <th class="px-6 py-2 text-xs text-gray-500">
                            Borrar
                        </th>
                    </tr>
                </thead>
                <tbody class="bg-white">

                    @foreach ($departamentos as $depart)

                        <tr class="whitespace-nowrap">
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                {{$depart->denominacion}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <div class="text-sm text-gray-900">
                                    {{$depart->localidad}}
                                </div>
                            </td>
                            <td class="px-6 py-4">
                                <a href="{{Route('departamentos.edit',[$depart])}}" class="px-4 py-1 text-sm text-white bg-blue-400 rounded">Editar</a>
                            </td>
                            <td class="px-6 py-4">
                                <form action="{{Route('departamentos.destroy',[$depart])}}" method="post">
                                    @csrf
                                    @method('DELETE')
                                <button  class="px-4 py-1 text-sm text-white bg-red-400 rounded" onclick='return confirm("Seguro deseas borrarlo")' type="submit">Borrar</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                    <tr>
                        <td>
                            <a href="{{Route('departamentos.create')}}" class="mt-4 text-blue-900 hover:underline">Insertar un nuevo departamento</a>
                        </td>
                    </tr>

                </tbody>
            </table>
        </div>
        <div class="flex items-center mt-3"> {{ $departamentos->links() }} </div>

    </div>
</x-guest-layout>
