<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kelas;
use App\Models\Pertemuan;
use Illuminate\Http\Request;

class MahasiswasPertemuanss extends Component
{
    use WithPagination;

    public $pertemuanId, $kelas_id, $pertemuan_ke, $tanggal, $materi;
    public $search;
    public $sortBy = 'pertemuan_ke';
    public $sortDesc = 'asc';
    public $isOpen = 0;
    public $deleteConfirms = false;

    public function mount($id)
    {
        $kelas_idN = Kelas::findOrFail($id);

        if($kelas_idN) {
            $this->kelas_id = $kelas_idN;
        }
    }
    public function render()
    {
        $searchParams = '%'.$this->search.'%';
        return view('mahasiswa.pertemuans',[
           'pertemuans' => Pertemuan::where('kelas_id',$this->kelas_id->id)
           ->where('materi','like', $searchParams)->orderBy($this->sortBy, $this->sortDesc)->paginate(10)
        ]);
    }

    public function sortBy($field){

        return $this->sortBy = $field;
    }



}
