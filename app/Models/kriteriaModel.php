<?php

namespace App\Models;

use CodeIgniter\Model;

class kriteriaModel extends Model
{
    protected $table = 'kriteria';
    protected $primaryKey = 'id_kriteria';
    protected $allowedFields =
    [
        'nama_kriteria',
        'bobot_kriteria',
        'bobot_core',
        'bobot_secondary',
    ];
}