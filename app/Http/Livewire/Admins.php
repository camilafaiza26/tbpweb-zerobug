<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Models\Admin;
use App\Models\Kelas;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Laravel\Fortify\Contracts\CreatesNewUsers;
use Laravel\Jetstream\Jetstream;

class Admins extends Component
{
    use WithPagination;

    public $search;
    public $sortBy = 'name';
    public $sortDesc = 'asc';
    public $isOpen = 0;
    public $deleteConfirms = false;
    public $adminId, $nama,$email,$password;
    
    public function render()

    {
        $searchParams = '%'.$this->search.'%';
        return view('admin.livewire.admins',[
            'adminss' => Admin::where('name','like', $searchParams)->orderBy($this->sortBy, $this->sortDesc)->paginate(10)
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
           'email'=>'required|email|unique:users,email',
           'password'=>'required',
        
       ]);

       Admin::updateOrCreate(['id'=> $this->adminId],[
        'name'=> $this->nama,
        'email'=> $this->email,
        'password'=> Hash::make($this->password),
        
       ]);

       $this->hideModal();

       session()->flash('info', $this->adminId ? 'Admin Berhasil Terupdate' : 'Admin Berhasil Ditambah');

       $this->adminId = '';
       $this->nama ='';
       $this->email = '';
        $this->password = '';

    }

    public function edit($id){
        $admin = Admin:: findOrFail($id);
        $this->adminId = $id;
        $this->nama = $admin->name;
         $this->email = $admin->email;

        $this->showModal();

    }

    public function deleteConfirms($id){
        $this->deleteConfirms = $id;
      
    }

    public function delete($id){

        Admin::find($id)->delete();
        session()->flash('info','Admin Berhasil Terhapus');  //confirm delete
        $this-> deleteConfirms = false;

    }
}
