<?php

namespace App\Models;

use CodeIgniter\Model;

class adminModel extends Model
{
    protected $table = 'admin';
    protected $primaryKey = 'id_admin';
    protected $allowedFields =
    [
        'nama_admin',
        'username',
        'password',
    ];
}