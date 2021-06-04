@extends('admin.navigation-menu')
    
    @section('content')
    <html>
    <head>
        <link rel="stylesheet" href="{{ mix('css/app.css') }}">   <!--Include base id url nya -->
    </head>
    <body>
    <div class="w-full mx-auto sm:px-6 lg:px-8 mt-5">
 
                 <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg ">
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
                                   Absensi Pertemuan
                                </span>
                              </p>
                            </div>
                          </div>
                        </div>
                      </div>
                     <div class="flex px-4 py-4">
                         
                     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                         <button  wire:click="showModal()" class=" transition duration-500 ease-in-out bg-indigo-600 hover:bg-indigo-900 transform hover:-translate-y-1 hover:scale-110 text-white font-bold py-3 px-4 rounded mb-2 inline-flex items-center mr-4">
                             <svg class="fill-current text-white-600 h-6 w-4 mr-2" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M11 9h4v2h-4v4H9v-4H5V9h4V5h2v4zm-1 11a10 10 0 1 1 0-20 10 10 0 0 1 0 20zm0-2a8 8 0 1 0 0-16 8 8 0 0 0 0 16z"/> </svg>
                             <span>Import CSV</span>
                         </button>
                             @if($isOpen)
                                 @include('admin.livewire.importcsv');
                                 @endif          
                                 <button  wire:click="download()" class=" transition duration-500 ease-in-out bg-indigo-600 hover:bg-indigo-900 transform hover:-translate-y-1 hover:scale-110 text-white font-bold py-3 px-4 rounded mb-2 inline-flex items-center">
                                    <svg class="animate-bounce fill-current text-white-600 h-6 w-3 mr-2"  xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M13 8V2H7v6H2l8 8 8-8h-5zM0 18h20v2H0v-2z"/></svg>
      
                                    <span>Download Example</span>
                                </button> 
                       
                     </div>
                     <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                         <input wire:model="search" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Cari Nama..">           
                     </div>  
                        
                   
                 </div>
                 @if(session()->has('info'))
                 <br>
                 <div class="px-6">
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
                 <div class="px-4 py-4">   
                 <h1>Kelas :  {{$kelas->kode_kelas}} </h1>
                 <h1>Mata Kuliah : {{$kelas->nama_matkul}}  </h1>
                  <h1>Tanggal Pertemuan : {{$pertemuan->tanggal}}  </h1>
                    <br>
                     <table class="table-auto w-full">
                         <thead style="background-color:#4723D9">
                             <tr>
                                 <th class="px-4 py-2 text-white w-auto">No</th>
                                 <th class="px-4 py-2 text-white w-auto">NIM</th>
                                 <th class="px-4 py-2 text-white w-auto">Nama</th>
                                 <th class="px-4 py-2 text-white w-auto">Email</th>
                                 <th class="px-4 py-2 text-white w-auto">Jam Masuk</th>
                                  <th class="px-4 py-2 text-white w-auto">Jam Keluar</th>
                                 <th colspan="2" class="px-4 py-2 text-white w-auto ">Durasi</th>
                                 <th class="px-4 py-2 text-white w-auto">Status Kehadiran</th>
                               
                             </tr>
                         </thead>
                         <tbody>
                             @foreach($absensis as $i=>$absensi)
                             <tr class="h-14 hover:bg-gray-100">          
                                 {{-- <td class="text-center">{{ ++$i }}</td> --}}
                               
                                 @php
                                 $hours = floor($absensi->durasi / 60) .' Jam';
                                 $minutes = $absensi->durasi % 60 .' Menit';
                                //  $jamMasuk = date("g:i:s A", strtotime($absensi->jam_masuk))
                                 if(is_null($absensi->id)){
                                    $status = "Tidak Hadir";
                                    $absensi->jam_masuk = "-";
                                    $absensi->jam_keluar = "-";
                                    $hours = "-";
                                    $minutes="";
                                 }
                                 else{
                                     $status = "Hadir";
                                 }
                                 @endphp
                                 <td class="text-center">{{ ++$i }}</td>
                                 <td>{{ $absensi->id }}</td>
                                 <td>{{ $absensi->nama }}</td>
                                 <td>{{ $absensi->email }}</td>
                                 <td class="text-center">{{ $absensi->jam_masuk }}</td>
                                 <td class="text-center ">{{ $absensi->jam_keluar}}</td>
                                 <td class="text-right">{{$hours}}</td>
                                 <td class="text-right"> {{$minutes}}</td>
                                 <td class="text-center">{{$status}}</td>
                             </tr>
                             @endforeach
                         </tbody>
                     </table>
                <br>
                <div>
                         {{$absensis->links()}}
                 </div>
                </div>
 </div>
</body>
    </html>
 @endsection
 
 