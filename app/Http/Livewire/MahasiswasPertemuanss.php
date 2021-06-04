<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kelas;
use App\Models\Pertemuan;
use App\Models\User;
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
    public function render(Request $request)
    {
        $searchParams = '%'.$this->search.'%';
        $email =  $email= $request->user()->email;
        return view('mahasiswa.pertemuans',[
           'pertemuans' => Pertemuan::where('kelas_id',$this->kelas_id->id)
           ->where('materi','like', $searchParams)->orderBy($this->sortBy, $this->sortDesc)->paginate(10),

           'absensiss'=> User::leftjoin('kelas_mahasiswa','users.id','=','kelas_mahasiswa.mahasiswa_id')
           ->leftjoin('kelas_mahasiswa_pertemuan','kelas_mahasiswa_pertemuan.kelas_mahasiswa_id','=','kelas_mahasiswa.id')            
           ->leftjoin('pertemuan','kelas_mahasiswa_pertemuan.pertemuan_id','pertemuan.id')
           ->where('users.email',$email)
           ->where('kelas_mahasiswa.kelas_id',$this->kelas_id->id)->get(),

        //    'absensiN' => Kelas::select('users.name', 'kelas.nama_matkul', 'absensi.', 'pertemuan.')
        //    ->join('krs', 'kelas.id', '=', 'krs.kelas_id')
        //    ->join('mahasiswa', 'kelas_mahasiswa.mahasiswa_id', '=', 'mahasiswa.id')
        //    ->join('pertemuan', 'kelas.id', '=', 'pertemuan.kelas_id')
        //    ->leftjoin('absensi', function($query){
        //        $query->on('pertemuan.id', '=', 'absensi.pertemuan_id');
        //        $query->on('kelas_mahasiswa.id', '=', 'absensi.kelas_mahasiswa_id');
        //    })
        //    ->where('kelas.id', $this->kelas_id->id)
        //    ->where('users.email',$email)
        //    ->get()
        ]);
    }

    public function sortBy($field){

        return $this->sortBy = $field;
    }



}
