@extends('mahasiswa.navigation-mahasiswa')
@section('content')
    

<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            <button onclick="window.location.href='{{route('mahasiswa.kelas')}}'" class="flex items-center justify-center px-4 py-2 border border-transparent rounded-md shadow-sm text-sm font-medium text-indigo-600 bg-white  transition duration-500 ease-in-out transform hover:-translate-y-1 hover:scale-110">        
                Kelas
            </button>
        </h2>
    </x-slot>
        <div>
           
                
        </div>
</x-app-layout>
@endsection
