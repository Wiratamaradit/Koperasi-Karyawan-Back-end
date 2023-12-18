<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjaman extends Model
{
    use HasFactory;
    protected $table = 'pinjamans';
    protected $primaryKey = 'id';
    public $timestamps = false;

    public function anggotas()
    {
        return $this->belongsTo(Anggota::class, 'anggotaId', 'id');
    }
}
