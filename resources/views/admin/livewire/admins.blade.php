@extends('admin.navigation-menu')
    
    @section('content')
        
   
    <div class="w-full mx-auto sm:px-6 lg:px-8 mt-5">
 
                 <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-6 py-6">
                     
                     <div class="flex mb-4">
                     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                         <button  wire:click="showModal()"  class="bg-indigo-700 text-white font-bold py-3 px-4 rounded mb-2 inline-flex items-center  transition duration-500 ease-in-out bg-indigo-600 hover:bg-indigo-900 transform hover:-translate-y-1 hover:scale-110 ">
                             <svg class="fill-current text-white-600 h-6 w-6 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/> </svg>
                             <span>Tambah Admin</span>
                         </button>
                             @if($isOpen)
                                 @include('admin.livewire.createadm');
                                 @endif          
                              
                       
                     </div>
                     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                         <input wire:model="search" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Cari Nama..">           
                     </div>  
                        
                               
                 </div>
                 @if(session()->has('info'))
                 <br>
                 <div
                 class=" flex items-center bg-green-100 rounded-xl overflow-hidden p-2 space-x-1 mr-4"
               >
               <div class="flex items-baseline px-4">
                 <span class="bg-green-300 bg-opacity-50 rounded-full p-1">
                   <svg
                     class="h-6 w-auto text-green-400"
                     fill="currentColor"
                     viewBox="0 0 20 20"
                   >
                     <path
                       fill-rule="evenodd"
                       d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z"
                       clip-rule="evenodd"
                     ></path>
                   </svg>
                 </span>
               </div>
               <div class="flex flex-grow items-center">
                 <p class="leading-tight text-xs md:text-sm">
                    {{session('info')}}
                 </p>
               </div>
               <div>
               </div>
             </div>
             
                 <br>
                 @endif   
                 <div class="shadow overflow-hidden rounded border-b border-gray-200">
                     <table class="table-auto w-full">
                         <thead style="background-color:#4723D9">
                             <tr class="h-14">
                                 <th class="px-4 py-2 text-white w-auto">NO</th>
                                 <th class="px-4 py-2 text-white w-auto">NAMA</th>
                             
                                 <th class="px-4 py-2 text-white w-auto">EMAIL</th>
                                 <th class="px-4 py-2 text-white w-auto">AKSI</th>
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($adminss as $i => $admins)
                             <tr class="h-12 hover:bg-gray-100">          
                                 <td class="text-center">{{ ++$i }}</td>
                                 <td>{{ $admins->name }}</td>
                              
                                 <td>{{ $admins->email }}</td>
                                 {{-- <td>{{ $admins->password}}</td> --}}
                                
                                 <td class="text-center">
                                     <button wire:click="edit({{ $admins->id }})" class="bg-blue-500 text-white font-bold py-1 px-4 rounded  transition duration-500 ease-in-out bg-blue-600 hover:bg-blue-500 transform hover:-translate-y-1 hover:scale-110 ">
                                     Edit
                                     </button>
                                     <button wire:click="deleteConfirms({{ $admins->id }})" class="bg-red-500 hover:bg-red-700 text-white font-bold py-1 px-4 rounded  transition duration-500 ease-in-out bg-red-600 hover:bg-red-500 transform hover:-translate-y-1 hover:scale-110 ">
                                     Hapus
                                     </button>
                                 </td>
                             </tr>
                             @endforeach
                         </tbody>
                     </table>
                    </div>
                <br>
                         {{$adminss->links()}}
                 </div>
 
 </div>

 <x-jet-dialog-modal wire:model="deleteConfirms">
    <x-slot name="title">
        {{ __('Hapus Admin') }}
    </x-slot>

    <x-slot name="content">
        {{ __('Apakah anda yakin menghapus Admin ini?') }}
    </x-slot>

    <x-slot name="footer">
        <x-jet-secondary-button wire:click="$set('deleteConfirms', false)" wire:loading.attr="disabled">
            {{ __('Cancel') }}
        </x-jet-secondary-button>

        <x-jet-danger-button class="ml-2" wire:click="delete({{ $deleteConfirms }})" wire:loading.attr="disabled">
            {{ __('Hapus Admins') }}
        </x-jet-danger-button>
    </x-slot>
</x-jet-dialog-modal>

 @endsection
 
 