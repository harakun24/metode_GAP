<?php

namespace App\Models;

use CodeIgniter\Model;

class rankingModel extends Model
{
    protected $table = 'ranking';
    protected $primaryKey = 'id_ranking';
    protected $allowedFields =
    [
        'id_alternatif',
        'total'
    ];
}