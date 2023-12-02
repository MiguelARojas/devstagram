@extends('layouts.app')

@section('titulo')
    Crea una nueva publicación
@endsection

@push('styles')
    <link rel="stylesheet" href="https://unpkg.com/dropzone@5/dist/min/dropzone.min.css" type="text/css" />
@endpush

@section('contenido')
    <div class="md:flex md:items-center">
        <div class="md:w-1/2 px-10">
            <form action=" {{ route('imagenes.store') }} " id="dropzone"
                class="dropzone border-dashed border-2 w-full h-96 rounded flex flex-col justify-center items-center">
                @csrf
            </form>
        </div>
        <div class="md:w-1/2 px-10 rounded-lg shadow-xl mt-10 bg-gray-400">
            <form action="{{ route('posts.store') }}" method="POST" novalidate>
                @csrf
                <!-- AYUDA PARA LA VALIDACION Y EVITAR UN ATAQUE -->
                <div class="mb-2">
                    <label for="titulo" class="mb-2 block uppercase text-gray-800 font-bold"> Titulo </label>
                    <input id="titulo" name="titulo" type="text" placeholder="Titulo de la publicación"
                        class="border p-1 w-full rounded-lg @error('name') border-red-500 @enderror"
                        value="{{ old('titulo') }}" />
                    @error('titulo')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </p>
                    @enderror
                </div>
                <div class="mb-2">
                    <label for="descripcion" class="mb-2 block uppercase text-gray-800 font-bold">
                        Descripción
                    </label>
                    <textarea id="descripcion" name="descripcion" placeholder="Descripción de la publicación"
                        class="border p-1 w-full rounded-lg @error('descripcion') border-red-500 @enderror">{{ old('descripcion') }}</textarea>
                    @error('descripcion')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </p>
                    @enderror
                </div>

                <div class="mb-5">
                    <input name="imagen" type="hidden" value="{{ old('imagen') }}"/>
                    @error('imagen')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center"> {{ $message }} </p>
                    @enderror
                </div>


                <input type="submit" value="Publicar"
                    class="bg-gray-500 hover:bg-gray-600 transition-colors cursor-pointer uppercase font-bold w-full p-1 text-white rounded-lg my-2">
            </form>
        </div>
    </div>
@endsection

@section('footer')
    Nueva Publicación
@endsection
