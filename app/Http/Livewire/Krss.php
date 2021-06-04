<?php

namespace App\Http\Livewire;
use Illuminate\Http\Request;
use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Kelas;     //Gunain models kelas
use App\Models\Kelas_Mahasiswa;
use App\Models\User;

class Krss extends Component
{
    use WithPagination;

    public $search;
    public $sortBy = 'nim';
    public $sortDesc = 'asc';
    public $isOpen = 0;
    public $deleteConfirms = false;
    public $mahasiswa_id, $kelas, $krsId, $kelas_id;

    public function mount($id)
    {
        $kelas_id = Kelas::findOrFail($id);

        if($kelas_id) {
            $this->kelas = $kelas_id;
        }
    }

    public function render()
    {
        $searchParams = '%'.$this->search.'%';

        // $krss = Mahasiswa::join('kelas_mahasiswa','mahasiswa.id','=','kelas_mahasiswa.mahasiswa_id')->where('kelas_id',$this->kelas->id)->get();
        // $krss =Kelas_Mahasiswa::where('kelas_id',$this->kelas->id)->get();

        return view('admin.livewire.showkelass',[
            'krss' => User::join('kelas_mahasiswa','users.id','=','kelas_mahasiswa.mahasiswa_id')->where('kelas_id',$this->kelas->id)
             ->where('name','like', $searchParams)->orderBy($this->sortBy, $this->sortDesc)->paginate(10),
            'krsss'=> User::select(['id', 'name', 'nim'])
            ->whereNotIn('id', Kelas_Mahasiswa::select(['mahasiswa_id'])
                ->where('kelas_id',$this->kelas->id)
            )->get()
            // $krss =Kelas_Mahasiswa::where('kelas_id',$this->kelas->id)->get();
            // 'krsss'=> Mahasiswa::all()
        ]);

        //dropdown
       
        // return view('livewire.showkelass', compact('krss','krsss'));
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
            'mahasiswa_id'=>'required',
        ]);

       Kelas_Mahasiswa::updateOrCreate(['id'=> $this->krsId],[
        'mahasiswa_id' => $this->mahasiswa_id,
        'kelas_id'=> $this->kelas->id,
       ]); 
    //  $request->validate([
    //     'mahasiswa_id' => 'required',

    //     ]);

    //    Krss::create($request->all());


       $this->hideModal();

       session()->flash('info', $this->krsId ? 'KRS Berhasil Terupdate' : 'KRS Berhasil Ditambah');

       $this->krsId = '';
       $this->mahasiswa_id ='';
       $this->kelas_id =$this->kelas->id;
    }

    public function deleteConfirms($id){
        $this->deleteConfirms = $id;
      
    }

    public function delete($id){

        Kelas_Mahasiswa::find($id)->delete();
        session()->flash('info','KRS Berhasil Terhapus');  //confirm delete
        $this-> deleteConfirms = false;

    }
}