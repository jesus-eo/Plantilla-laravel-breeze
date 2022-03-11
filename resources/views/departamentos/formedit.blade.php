<x-guest-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            Editar cita
        </h2>
    </x-slot>
    <form action="{{ route('departamentos.update', [$departamento],false) }}" method="post">
        @csrf
        @method('PUT')
        <div class="mb-6">
            <label for="denominacion" class="text-sm font-medium text-gray-900 block mb-2 ">{{-- @error('denominacion') text-red-500 @enderror --}}
                Denominación
            </label>
            <input type="text" name="denominacion" id="denominacion"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5"
                value="{{ old('denominacion', $departamento->denominacion) }}"
            >{{-- @error('denominacion') border-red-500 @enderror" --}}
            @error('denominacion')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <div class="mb-6">
            <label for="localidad" class="text-sm font-medium text-gray-900 block mb-2 {{-- @error('localidad') text-red-500 @enderror --}}">
                Localidad
            </label>
            <input type="text" name="localidad" id="localidad"
                class="bg-gray-50 border border-gray-300 text-gray-900 sm:text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-96 p-2.5 {{-- @error('localidad') border-red-500 @enderror --}}"
                value="{{ old('localidad', $departamento->localidad) }}">

            @error('localidad')
                <p class="text-red-500 text-sm mt-1">
                    {{ $message }}
                </p>
            @enderror
        </div>
        <button type="submit"
            class="text-white bg-blue-700 hover:bg-blue-800 focus:ring-4 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Aceptar</button>

        <a href="/departamentos/index"
            class="text-white border-green-700 border-2 bg-green-700 focus:ring-blue-300 font-medium rounded-lg text-sm px-5 py-2.5 text-center">Volver</a>
    </form>
</x-guest-layout>
