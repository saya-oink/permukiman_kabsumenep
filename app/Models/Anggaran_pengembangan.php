<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class anggaran_pengembangan extends Model
{
    use HasFactory, softDeletes;

    use HasFactory, softDeletes;

    
    protected $fillable = 
    ['nama_kegiatan', 'deskripsi_kegiatan', 'jumlah anngaran', 'tanggal_pengajuan', 'status'];
}
