<?php

namespace App\Models;

use CodeIgniter\Model;

class beasiswaModel extends Model
{
    protected $table = 'beasiswa';
    protected $primaryKey = 'beasiswa_id';
    protected $allowedFields =
    [
        'beasiswa_tahun',
        'beasiswa_kelas',
        'beasiswa_dari',
        'beasiswa_siswa',
    ];
    
}
