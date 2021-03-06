<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pertemuan extends Model
{
    use HasFactory;
    protected $table = 'pertemuan';
    protected $fillable = ['kelas_id','pertemuan_ke','tanggal','materi'];

    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }

    public function kelas_mahasiswa()
    {
        return $this->belongsTo(Kelas_Mahasiswa::class);
    }
    

}
