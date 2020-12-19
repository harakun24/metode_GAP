<?php

namespace App\Models;

use CodeIgniter\Model;

class nilaiModel extends Model
{
    protected $table = 'penilaian';
    protected $primaryKey = 'id_penilaian';
    protected $allowedFields =
    [
        'id_alternatif',
        'id_subkriteria',
        'nilai'
    ];
}