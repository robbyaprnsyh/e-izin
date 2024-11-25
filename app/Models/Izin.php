<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Izin extends Model
{
    use HasFactory;
    protected $fillable = ['id_karyawan', 'tgl_mulai', 'tgl_selesai', 'alasan'];
    public $timestamp = true;
    public function karyawan()
    {
        return $this->belongsTo(Karyawan::class, 'id_karyawan');
    }
    public function user()
    {
        return $this->belongsTo(User::class, 'id_karyawan', 'id');
    }
}
