<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithFileUploads;
use Livewire\WithPagination;
use App\Models\Kelas;
use App\Models\Kelas_Mahasiswa;
use App\Models\Pertemuan;
use App\Models\Kelas_Pertemuan;
use App\Models\Kelas_Mahasiswa_Pertemuan;
use App\Models\Mahasiswa;
use App\Models\User;
use Illuminate\Http\Request;

class Absensis extends Component
{
    public  $kelas,$kelasMPId, $csvfile, $pertemuan, $krs_id;
    public $search;
    public $sortBy = 'nim';
    public $sortDesc = 'asc';
    public $isOpen = 0;
    public $deleteConfirms = false;

    use WithFileUploads;
    use WithPagination;

    public function mount($id,$pid)
    {
        $kelas_id = Kelas::findOrFail($id);

        if($kelas_id) {
            $this->kelas = $kelas_id;
        }

        $pertemuan = Pertemuan::findOrFail($pid);

        if($pertemuan) {
            $this->pertemuan = $pertemuan;
        }
        
    }

    public function render()
    {
        $searchParams = '%'.$this->search.'%';
        return view('admin.livewire.absensis',[
            'mahasiswas' => User::join('kelas_mahasiswa','users.id','=','kelas_mahasiswa.mahasiswa_id')->where('kelas_id',$this->kelas->id)->get(),
            'absensis'=> User::join('kelas_mahasiswa','users.id','=','kelas_mahasiswa.mahasiswa_id')
            ->where('kelas_mahasiswa.kelas_id',$this->kelas->id)
            ->leftjoin('kelas_mahasiswa_pertemuan','kelas_mahasiswa_pertemuan.kelas_mahasiswa_id','=','kelas_mahasiswa.id')            
            ->leftjoin('pertemuan','kelas_mahasiswa_pertemuan.pertemuan_id','=','pertemuan.id')
            ->where('name','like', $searchParams)->orderBy($this->sortBy, $this->sortDesc)->paginate(15)

        //      ->where('pertemuan.id',$this->pertemuan->id)
            // ->get()
            
            // (Kelas_Mahasiswa_Pertemuan::join('kelas_mahasiswa','kelas_mahasiswa.id','=','kelas_mahasiswa_pertemuan.kelas_mahasiswa_id')->join('mahasiswa','kelas_mahasiswa.mahasiswa_id','=','mahasiswa.id'))
            //   ->where('kelas_mahasiswa.kelas_id',$this->kelas->id)->get(),
        ]);
    }

    public function store()
    {
       $this->validate([
        'csvfile' => 'required|mimes:csv,txt'
       ]);

            // dd($this->csvfile);
            $upload = $this->csvfile;
            $filePath = $upload->getRealPath();
            
            $file=fopen($filePath,'r');
            $header = fgetcsv($file);

            //validasi

            $escapeHeader =[];
            foreach($header as $key => $value){
                $lheader = strtolower($value);
                $escapeItems = preg_replace('/[^a-z]/','_',$lheader);
                array_push($escapeHeader,$escapeItems);
            }
            
            while($columns=fgetcsv($file)){

                if($columns[0]==""){
                    continue;
                }

                $data = array_combine($escapeHeader,$columns); 

                foreach($data as $key => $value){
                    $value=($key=="jam_masuk" || $key=="jam_keluar" )?strtotime($value) :strtotime($value) ;
                }
                  
                    //masuk 
                    // dd($data);

                    $nama = $data['nama'];
                    $email= $data['email'];
                    $jam_masuk=preg_replace('/\D/','',$data['jam_masuk']);
                    $jam_keluar=preg_replace('/\D/','',$data['jam_keluar']);
                    $durasi= $data['durasi'];

                    if($nama=='' || $email=='' || $jam_masuk=='' || $jam_keluar=='' || $durasi==''){
                        $this->hideModal();
                        session()->flash('info', $this->kelasMPId ? "Data Kosong, Silahkan Lengkapi!" : "Data Kosong, SIilahkan Lengkapi");
                    }
                    else{

                    //VALIDASI INPUT TIDAK 2 KALI
                  
                     $emailDB = User::join('kelas_mahasiswa','users.id','=','kelas_mahasiswa.mahasiswa_id')
                    ->where('kelas_mahasiswa.kelas_id',$this->kelas->id)
                    ->leftjoin('kelas_mahasiswa_pertemuan','kelas_mahasiswa_pertemuan.kelas_mahasiswa_id','=','kelas_mahasiswa.id')            
                    ->join('pertemuan','kelas_mahasiswa_pertemuan.pertemuan_id','=','pertemuan.id')
                    ->where('users.email','=',$email)->value('users.email');
                    
                    //Jika email sama ada yg sama LENGKAPIN
                   
                    if($emailDB == $email){
                         $this->hideModal();
                         session()->flash('info', $this->kelasMPId ? "Siswa :" .$nama. "Dengan " .$email .'Duplikat, Data Berhasil Terupdate' :  "Siswa : " .$nama. " Dengan Email " .$email .' Duplikat, Data Berhasil Terupdate');
                    }
                    
                    else{

                        $kelas_mahasiswa_id= User::select('kelas_mahasiswa.id')->join('kelas_mahasiswa','users.id','=','kelas_mahasiswa.mahasiswa_id')->where('kelas_id','=',$this->kelas->id)->where('email','=',$email)
                        ->value('kelas_mahasiswa.id');

                    Kelas_Mahasiswa_Pertemuan::updateOrCreate(['id'=> $this->kelasMPId],[
                        'kelas_mahasiswa_id'=> $kelas_mahasiswa_id,
                        'pertemuan_id'=> $this->pertemuan->id,
                        'jam_masuk'=> $jam_masuk,
                        'jam_keluar'=> $jam_keluar,
                        'durasi'=> $durasi,
                    
                        
                    ]);
                         $this->hideModal();

                         session()->flash('info', $this->kelasMPId ? 'Absensi Berhasil Terupdate' : 'Absensi Berhasil Ditambah');
                    }
                }

            }


    }


    public function showModal(){
        $this->isOpen = true;
    }
    public function hideModal(){
        $this->isOpen = false;
    }

    public function download()
    {
        return response()->download(storage_path('examplefile.csv'));
    }
}
