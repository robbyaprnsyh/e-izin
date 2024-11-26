<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Karyawan extends Model
{
    use HasFactory;
    protected $fillable = ['id_user', 'nik', 'id_jabatan','no_telp', 'tgl_lahir', 'jenis_kelamin', 'alamat', 'agama', 'cover'];
    public function user()
    {
        return $this->belongsTo(User::class, 'id_user');
    }
    public function izin()
    {
        return $this->hasMany(Izin::class, 'id_karyawan');
    }
    public function jabatan()
    {
        return $this->belongsTo(Jabatan::class, 'id_jabatan');
    }
}
