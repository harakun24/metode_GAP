<?php

namespace App\Models;

use CodeIgniter\Model;

class siswaModel extends Model
{
    protected $table = 'alternatif';
    protected $primaryKey = 'id_alternatif';
    protected $allowedFields =
    [
        'nisn',
        'nama_siswa',
        'jenis_kelamin',
    ];
}