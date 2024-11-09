<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employee extends Model
{
    use HasFactory;

    protected $fillable = [
        'nip',
        'nama',
        'tempat_lahir',
        'alamat',
        'tgl_lahir',
        'jenis_kelamin',
        'gol',
        'eselon',
        'jabatan',
        'tempat_tugas',
        'agama',
        'unit_kerja',
        'no_hp',
        'npwp',
    ];
}
