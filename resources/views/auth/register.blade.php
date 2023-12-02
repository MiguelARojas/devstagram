@extends('layouts.app')

@section('titulo')
    Registrate en DevStagram
@endsection

@section('contenido')
    <div class="md:flex md:justify-center md-gap-10 md:items-center">
        <div class="md:w-6/12 p-5">
            <img src=" {{ asset('img/register.jpg') }}" alt="imagen-registro">
        </div>

        <div class="md:w-4/12">
            <form action=" {{ route('register') }} " method="POST"> 
                @csrf
                <div>
                    <label for="name" class="mb-2 block uppercase text-gray-500 font-bold"> Nombre </label>
                    <input type="text" name="name" id="name" placeholder="Nombre de Registro" class="border p-3 mb-2 w-full rounded-lg @error('name') border-red-500 @enderror" value="{{old('name')}}">
                    @error('name')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror

                    <label for="username" class="mb-2 block uppercase text-gray-500 font-bold"> UserName </label>
                    <input type="text" name="username" id="username" placeholder="Usuario de Registro" class="border p-3 mb-2 w-full rounded-lg @error('username') border-red-500 @enderror" value="{{ old('username') }}">
                    @error('username')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror

                    <label for="email" class="mb-2 block uppercase text-gray-500 font-bold"> Email </label>
                    <input type="email" name="email" id="email" placeholder="Email de Registro" class="border p-3 w-full mb-2 rounded-lg @error('email') border-red-500 @enderror" value="{{ old('email') }}">
                    @error('email')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror
                    
                    <label for="password" class="mb-2 block uppercase text-gray-500 font-bold"> Password </label>
                    <input type="password" name="password" id="password" placeholder="Password de Registro" class="border p-3 mb-2 w-full rounded-lg @error('password') border-red-500 @enderror">
                    @error('password')
                        <p class="bg-red-500 text-white my-2 rounded-lg text-sm p-2 text-center">{{ $message }}</p>
                    @enderror

                    <label for="password_confirmation" class="mb-2 block uppercase text-gray-500 font-bold"> Repetir Password </label>
                    <input type="password" name="password_confirmation" id="password_confirmation" placeholder="Repetir Password" class="border p-3 mb-2 w-full rounded-lg">

                </div>

                <input type="submit" value="Crear Cuenta" class="bg-sky-600 hover:bg-sky-700 transition-colors cursor-pointer uppercase font-bold w-full p-3 text-white rounded-lg">
            </form>
        </div>
    </div>
@endsection

@section('footer')
    Registro
@endsection