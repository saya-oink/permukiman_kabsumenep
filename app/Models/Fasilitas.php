<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\softDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class fasilitas extends Model
{
    use HasFactory, softDeletes;

    
    protected $fillable = 
    ['id', 'jenis_fasilitas', 'lokasi', 'kondisi', 'deskripsi'];
    
    
    public function perencanaan()
    {
        return $this->belongsToMany(perencanaan::class);
    }
    
    public function laporan_masalah()
    {
        return $this->belongsTo(Laporan_masalah::class);
    }
}

