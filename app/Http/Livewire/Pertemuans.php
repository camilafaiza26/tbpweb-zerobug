<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kelas;
use App\Models\Pertemuan;
use Illuminate\Http\Request;

class Pertemuans extends Component
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
        return view('admin.livewire.pertemuans',[
           'pertemuans' => Pertemuan::where('kelas_id',$this->kelas_id->id)->where('materi','like', $searchParams)->orderBy($this->sortBy, $this->sortDesc)->paginate(10)
        ]);
    }

    public function sortBy($field){

        return $this->sortBy = $field;
    }

    public function showModal(){
        $this->isOpen = true;
    }
    public function hideModal(){
        $this->isOpen = false;
    }

    public function store()
    {
  
       $this->validate([
           'pertemuan_ke'=>'required|min:1|integer',
           'tanggal'=>'required',
           'materi'=>'required',
           'kelas_id'=>'required',
       ]);

       Pertemuan::updateOrCreate(['id'=> $this->pertemuanId],[
        'pertemuan_ke'=> $this->pertemuan_ke,
        'tanggal'=> $this->tanggal,
        'materi'=> $this->materi,
        'kelas_id'=>$this->kelas_id->id,
       ]);

       $this->hideModal();

       session()->flash('info', $this->pertemuanId ? 'Pertemuan Berhasil Terupdate' : 'Pertemuan Berhasil Ditambah');

       $this->pertemuanId = '';
       $this->pertemuan_ke ='';
       $this->tanggal ='';
       $this->materi = '';
  

    }

    public function edit($id){
        $pertemuan = Pertemuan:: findOrFail($id);
        $this->pertemuanId = $id;
        $this->pertemuan_ke = $pertemuan->pertemuan_ke;
        $this->tanggal = $pertemuan->tanggal;
         $this->materi = $pertemuan->materi;
       
        $this->showModal();

    }

    public function deleteConfirms($id){
        $this->deleteConfirms = $id;
      
    }

    public function delete($id){

        Pertemuan::find($id)->delete();
        session()->flash('info','Pertemuan Berhasil Terhapus');  //confirm delete
        $this-> deleteConfirms = false;

    }
}
