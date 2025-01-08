<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;


class perencanaan extends Model
{
    
    use HasFactory, softDeletes;

    
    protected $fillable = 
    ['nama_program', 'deskripsi_program', 'anggaran', 'tanggal_perencanaan'];

    public function fasilitas()
    {
        return $this->belongsToMany(fasilitas::class);
    }
}
