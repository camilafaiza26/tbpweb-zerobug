@extends('mahasiswa.navigation-mahasiswa')
    
    @section('content')
        
   
    <div class="w-full mx-auto sm:px-6 lg:px-8 mt-5">
 
                 <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-4 py-4">
                     
                    <div class="flex mb-4">
                     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                           
                              
                       
                     </div>
                     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                         <input wire:model="search" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Cari Pertemuan..">           
                     </div>  
                        
                               
                 </div>
            
                     <table class="table-auto w-full">
                         <thead class="bg-blue-500">
                             <tr>
                                 <th class="px-4 py-2 text-white w-auto">No</th>
                                 <th class="px-4 py-2 text-white w-auto">Pertemuan Ke</th>
                                 <th class="px-4 py-2 text-white w-auto">Tanggal</th>
                                 <th class="px-4 py-2 text-white w-auto">Status Kehadiran</th>
                           
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($pertemuans as $i => $pertemuan)
                             <tr class="hover:bg-gray-100">          
                                 <td class="text-center">{{ ++$i }}</td>
                                 <td> Pertemuan {{ $pertemuan->pertemuan_ke }}</td>
                                 <td>{{ $pertemuan->tanggal }}</td>
                                 <td class="text-center">
                                 </td>
                             </tr>
                             @endforeach
                         </tbody>
                     </table>
                <br>
                        {{$pertemuans->links()}}
                 </div>
 
 </div>
 @endsection
 
 