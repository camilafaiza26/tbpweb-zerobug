<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Kelas;
use Illuminate\Validation\Rule;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;
use Illuminate\Http\Request;

class Mahasiswas extends Component
{
    use WithPagination;

    public $search;
    public $sortBy = 'nim';
    public $sortDesc = 'asc';
    public $isOpen = 0;
    public $deleteConfirms = false;
    public $mahasiswaId, $nama,$nim,$email,$password;
   


    public function render()

    {
        $searchParams = '%'.$this->search.'%';
        return view('admin.livewire.mahasiswas',[
            'mahasiswas' => User::where('name','like', $searchParams)->orderBy($this->sortBy, $this->sortDesc)->paginate(10)
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
           'nama'=>'required',
           'nim'=>['required', 'max:10', 'not_in:'. $this->mahasiswaId],
           'email'=>['required', 'email', 'not_in:'. $this->mahasiswaId],
           'password'=>'required',
        
       ]);

       User::updateOrCreate(['id'=> $this->mahasiswaId],[
        'name'=> $this->nama,
        'nim'=> $this->nim,
        'email'=> $this->email,
        'password'=> Hash::make($this->password),
        
       ]);

       $this->hideModal();

       session()->flash('info', $this->mahasiswaId ? 'Mahasiswa Berhasil Terupdate' : 'Mahasiswa Berhasil Ditambah');

       $this->mahasiswaId = '';
       $this->nama ='';
       $this->nim ='';
       $this->email = '';
         $this->password = '';

    }


    public function edit($id){
        $mahasiswa = User:: findOrFail($id);
        $this->mahasiswaId = $id;
        $this->nama = $mahasiswa->name;
        $this->nim = $mahasiswa->nim;
         $this->email = $mahasiswa->email;
         $this->password = $mahasiswa->password;

        $this->showModal();

    }

    public function deleteConfirms($id){
        $this->deleteConfirms = $id;
      
    }

    public function delete($id){

        User::find($id)->delete();
        session()->flash('info','Mahasiswa Berhasil Terhapus');  //confirm delete
        $this-> deleteConfirms = false;

    }
}
