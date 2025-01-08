<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\softDeletes;

class Masyarakat extends Model
{
    use HasFactory, softDeletes;

    
    protected $fillable = 
    ['id','nama', 'alamat', 'kontak'];

    public function laporan_masalahs()
    {
        return $this->hasMany(Laporan_masalah::class);
    }
}
