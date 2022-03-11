
    <x-guest-layout>
        <x-slot name="header">
            <h2 class="font-semibold text-xl text-gray-800 leading-tight">
                Nueva cita
            </h2>
        </x-slot>
        <form action="{{Route('departamentos.store')}}" method="post">
            @csrf
            <div class="mb-6">
                <label for="denominacion" class="text-sm font-medium text-gray-900 block mb-2 ">
                    Denominación
                </label>
                <input type="text" name="denominacion" id="denominacion"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5">
            </div>
            <div class="mb-6">
                <label for="localidad" class="text-sm font-medium text-gray-900 block mb-2">
                    Localidad
                </label>
                <input type="text" name="localidad" id="localidad"
                    class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5">
            </div>
           {{--  <div class="mb-6">
                <label for="categoria" class="text-sm font-medium text-gray-900 block mb-2">
                    Categoria
                </label>
                <select name="categoria_id" id="categoria_id">

                    @foreach ($categorias as $categoria)
                    <option value="{{$categoria->id}}">
                        {{$categoria->denominacion}}
                    </option>
                    @endforeach
                </select>
            </div> --}}
            <button type="submit"
                class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Insertar</button>

            <a href="/departamentos/index"
                class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
        </form>
    </x-guest-layout>



