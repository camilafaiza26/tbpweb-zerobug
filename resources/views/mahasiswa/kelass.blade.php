@extends('mahasiswa.navigation-mahasiswa')
    
@section('content')
    

<div class="w-full mx-auto sm:px-6 lg:px-8 mt-5">

             <div class="mt-8 bg-white dark:bg-gray-800 overflow-hidden shadow sm:rounded-lg px-4 py-4">
                 
                 <div class="flex mb-4">
                 <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                   
                 </div>
                 <div class="w-full md:w-1/2 px-3 mb-6 md:mb-0">
                     <input wire:model="search" type="text" class="shadow appearance-none border rounded w-full py-2 px-3 text-blue-900" placeholder="Cari Mata Kuliah..">           
                 </div>  
                    
                           
             </div>   
                 <table class="table-auto w-full">
                     <thead class="bg-blue-500">
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

