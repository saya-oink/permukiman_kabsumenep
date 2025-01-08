<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class LaporanMasalah extends Model
{
    use HasFactory,softDeletes;


    protected $fillable =
    ['id',
    'id',
    'jenis_masalah',
    'deskripsi_masalah',
    'tanggal_laporan',
    'status'];

    public function masyarakat()
    {
        return $this->belongsTo(Masyarakat::class, 'id_masyarakat');
    }
    
    public function fasilitas()
    {
        return $this->belongsTo(Fasilitas::class, 'id_fasilitas');
    }


}
