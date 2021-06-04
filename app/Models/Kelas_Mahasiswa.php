<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas_Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'kelas_mahasiswa';
    
    protected $fillable = ['kelas_id','mahasiswa_id'];

    public function mahasiswa(){
        return $this->belongsToMany(Mahasiswa::class);
    }
    
    public function kelas(){
        return $this->belongsToMany(Kelas::class);
    }
    
    public function pertemuan(){
        return $this->belongsToMany(Pertemuan::class);
    }

}
