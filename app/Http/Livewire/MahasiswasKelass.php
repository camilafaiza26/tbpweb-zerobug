<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kelas;
use App\Models\Krs;
use App\Models\Mahasiswa;
use App\Models\Pertemuan;
use Illuminate\Http\Request;  


class MahasiswasKelass extends \Livewire\Component
{
    use WithPagination;
 

    public $search;
    public $sortBy = 'nama_matkul';
    public $sortDesc = 'asc';
    public $isOpen = 0;
    public $deleteConfirms = false;
    public $kelasId, $kode_kelas,$kode_matkul,$nama_matkul,$semester,$tahun,$sks;
    public $mahasiswa_id, $krsId;


    public function render(Request $request)

    {
        $email= $request->user()->email;
        $searchParams = '%'.$this->search.'%';
        return view('mahasiswa.kelass',[
            'kelass' => Kelas::join('kelas_mahasiswa','kelas.id','=','kelas_mahasiswa.kelas_id')->join('users','users.id','=','kelas_mahasiswa.mahasiswa_id')
            ->where('users.email',$email)
            ->where('nama_matkul','like', $searchParams)->orderBy($this->sortBy, $this->sortDesc)->orderBy('tahun',$this->sortDesc)->paginate(10)
        ]);
    }

    public function sortBy($field){

        return $this->sortBy = $field;
    }

    public function detail($id){

        return view('mahasiswa.pertemuans',[
            'pertemuans' => Pertemuan::where('kelas_id',$this->kelas_id->id)
         ]);

    }   

  
    
}
