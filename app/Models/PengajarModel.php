<?php

namespace App\Models;

use CodeIgniter\Model;

class PengajarModel extends Model
{
    protected $table = 'pengajar';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = true;
    protected $allowedFields = ['nip', 'nama', 'email', 'salt', 'password', 'ttl', 'agama', 'tlp', 'status', 'avatar', 'id_role'];
}