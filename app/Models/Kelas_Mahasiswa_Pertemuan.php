<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas_Mahasiswa_Pertemuan extends Model
{
    use HasFactory;
    protected $table = 'kelas_mahasiswa_pertemuan';
    
    protected $fillable = ['csvfile','kelas_mahasiswa_id','pertemuan_id','jam_masuk','jam_keluar','durasi'];

    public function kelas_mahasiswa(){
        return $this->belongsToMany(Kelas_Mahasiswa::class);
    }
    
    public function pertemuan(){
        return $this->belongsToMany(Pertemuan::class);
    }

   
    

}
