@extends('mahasiswa.navigation-mahasiswa')
    
    @section('content')
        

    <div class="bg-blue-500 w-full h-screen mx-auto sm:px-6 lg:px-16 mt-5 py-8">
 
                 <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg">
                    <div class="bg-indigo-600 sm:rounded-lg">
                        <div class="max-w-7xl mx-auto py-3 px-3 sm:px-6 lg:px-8">
                          <div class="flex items-center justify-between flex-wrap">
                            <div class="w-0 flex-1 flex items-center">
                              <span class="flex p-2 rounded-lg bg-indigo-800">
                                <!-- Heroicon name: outline/speakerphone -->
                                <svg class="h-6 w-6 text-white" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor" aria-hidden="true">
                                  <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M11 5.882V19.24a1.76 1.76 0 01-3.417.592l-2.147-6.15M18 13a3 3 0 100-6M5.436 13.683A4.001 4.001 0 017 6h1.832c4.1 0 7.625-1.234 9.168-3v14c-1.543-1.766-5.067-3-9.168-3H7a3.988 3.988 0 01-1.564-.317z" />
                                </svg>
                              </span>
                              <p class="ml-3 font-medium text-white truncate">
                                <span class="hidden md:inline">
                                    Daftar Kelas
                                </span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                      <br>
                    <div class="flex mb-4 ">
                     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 ">
                           
                              
                       
                     </div>
                     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0 mr-6">
                         <input wire:model="search" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Cari Pertemuan..">           
                     </div>  
                        
                               
                 </div>
                 <div class=" px-12 py-4">
                     <table class="table-auto w-full mt-2">
                         <thead style="background-color:#4723D9">
                             <tr>
                                 <th class="px-4 py-2 text-white w-auto">No</th>
                                 <th class="px-4 py-2 text-white w-auto">Pertemuan Ke</th>
                                 <th class="px-4 py-2 text-white w-auto">Tanggal</th>
                                 <th class="px-4 py-2 text-white w-auto">Status Kehadiran</th>
                           
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($absensiss as $i => $absensi)
                             @php
                             if(is_null($absensi->id)){
                                $status = "Tidak Hadir";
                             }
                             else{
                                 $status = "Hadir";
                             }
                             @endphp
                             <tr class="h-12 hover:bg-gray-100">          
                                 <td class="text-center">{{ ++$i }}</td>
                                 <td> Pertemuan {{ $absensi->pertemuan_ke }}</td>
                                 <td>{{ $absensi->tanggal }}</td>
                                 <td class="text-center">
                                     {{$status}}
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
 
 