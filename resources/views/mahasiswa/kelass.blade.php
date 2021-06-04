@extends('mahasiswa.navigation-mahasiswa')
    
@section('content')
    

<div class="bg-blue-500 w-full h-screen mx-auto sm:px-6 lg:px-16 mt-5 py-8">

             <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-4 py-4">
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
                 <div class="flex mb-4">
                 <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                   
                 </div>
                 <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                     <input wire:model="search" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Cari Mata Kuliah..">           
                 </div>  
                    
                           
             </div>   
                 <table class="table-auto w-full">
                     <thead class="h-12" style="background-color:#4723D9">
                         <tr>
                             <th class="px-4 py-2 text-white w-auto">No</th>
                             <th class="px-4 py-2 text-white w-auto">Kode Kelas</th>
                             <th class="px-4 py-2 text-white w-auto">Kode Matkul</th>
                             <th class="px-4 py-2 text-white w-auto">Nama Matkul</th>
                             <th class="px-4 py-2 text-white w-auto">Semester</th>
                             <th class="px-4 py-2 text-white w-auto">Tahun</th>
                             <th class="px-4 py-2 text-white w-auto">SKS</th>
                             <th class="px-4 py-2 text-white w-auto">Action</th>
                         </tr>
                     </thead>
                     <tbody>
                         @foreach($kelass as $i => $kelas)
                         <tr class="hover:bg-gray-100">          
                             <td class="text-center">{{ ++$i }}</td>
                             <td>{{ $kelas->kode_kelas }}</td>
                             <td>{{ $kelas->kode_matkul }}</td>
                             <td>{{ $kelas->nama_matkul }}</td>
                             <td class="text-center">{{ $kelas->semester}}</td>
                             <td class="text-center" >{{ $kelas->tahun }}</td>
                             <td class="text-center">{{ $kelas->sks }}</td>
                            
                             <td class="text-center">
                                 <!--{{  URL::to('detail/kelas/'. $kelas->id)}}" -->
                                 {{--  --}}
                                 
                                 <button onclick="window.location.href='{{route('mahasiswa.detail',$kelas->kelas_id)}}'" class="bg-green-500 hover:bg-blue-700 text-white font-bold py-1 px-4 rounded">
                                    Detail
                                 </button>
                             </td>
                         </tr>
                         @endforeach
                     </tbody>
                 </table>
            <br>
                     {{$kelass->links()}}
             </div>

</div>

<x-jet-dialog-modal wire:model="deleteConfirms">
 <x-slot name="title">
     {{ __('Hapus Kelas') }}
 </x-slot>

 <x-slot name="content">
     {{ __('Apakah anda yakin menghapus kelas ini?') }}
 </x-slot>

 <x-slot name="footer">
     <x-jet-secondary-button wire:click="$set('deleteConfirms', false)" wire:loading.attr="disabled">
         {{ __('Cancel') }}
     </x-jet-secondary-button>

     <x-jet-danger-button class="ml-2" wire:click="delete({{ $deleteConfirms }})" wire:loading.attr="disabled">
         {{ __('Hapus Kelas') }}
     </x-jet-danger-button>
 </x-slot>
</x-jet-dialog-modal>

@endsection

