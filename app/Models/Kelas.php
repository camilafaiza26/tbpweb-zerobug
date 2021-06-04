<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kelas extends Model
{
    use HasFactory;
    protected $table = 'kelas';
    protected $fillable = ['kode_kelas','kode_matkul','nama_matkul','semester','tahun','sks'];
    
        
    public function pertemuans(){
        return $this->hasMany(Pertemuan::class);
    }
    public function mahasiswa(){
        return $this->belongsToMany(Mahasiswa::class)->withPivot(['id']);
    }
}
