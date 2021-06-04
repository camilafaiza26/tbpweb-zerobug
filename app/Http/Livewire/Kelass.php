<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kelas;
use App\Models\Krs;
use App\Models\User;


class Kelass extends Component
{
    use WithPagination;

    public $search;
    public $sortBy = 'semester';
    public $sortDesc = 'desc';
    public $isOpen = 0;
    public $deleteConfirms = false;
    public $kelasId, $kode_kelas,$kode_matkul,$nama_matkul,$semester,$tahun,$sks;
    public $mahasiswa_id, $krsId;


    public function render()

    {
        $searchParams = '%'.$this->search.'%';
        return view('admin.livewire.kelass',[
            'kelass' => Kelas::where('nama_matkul','like', $searchParams)->orderBy($this->sortBy, $this->sortDesc)->orderBy('tahun',$this->sortDesc)->paginate(10)
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
           'kode_kelas'=>'required',
           'kode_matkul'=>'required',
           'nama_matkul'=>'required',
           'semester'=>'required',
           'tahun'=>'required|max:4',
           'sks'=>'required',
       ]);

       Kelas::updateOrCreate(['id'=> $this->kelasId],[
        'kode_kelas'=> $this->kode_kelas,
        'kode_matkul'=> $this->kode_matkul,
        'nama_matkul'=> $this->nama_matkul,
        'semester'=> $this->semester,
        'tahun'=> $this->tahun,
        'sks'=> $this->sks,
       ]);

       $this->hideModal();

       session()->flash('info', $this->kelasId ? 'Kelas Berhasil Terupdate' : 'Kelas Berhasil Ditambah');

       $this->kelasId = '';
       $this->kode_kelas ='';
       $this->kode_matkul ='';
       $this->nama_matkul = '';
        $this->semester = '';
       $this->tahun='';
       $this->sks ='';

    }

    public function edit($id){
        $kelas = Kelas:: findOrFail($id);
        $this->kelasId = $id;
        $this->kode_kelas = $kelas->kode_kelas;
        $this->kode_matkul = $kelas->kode_matkul;
        $this->nama_matkul = $kelas->nama_matkul;
         $this->semester = $kelas->semester;
        $this->tahun=$kelas->tahun;
        $this->sks =$kelas->sks;

        $this->showModal();

    }
    public function deleteConfirms($id){
        $this->deleteConfirms = $id;
      
    }

    public function delete($id){

        Kelas::find($id)->delete();
        session()->flash('info','Kelas Berhasil Terhapus');  //confirm delete
        $this-> deleteConfirms = false;

    }

    public function detail($id){
        
     $kelas = Kelas::where('id',$id)->first();
     return view('livewire.showkelass', compact('kelas'));

    }   

  
    
}
