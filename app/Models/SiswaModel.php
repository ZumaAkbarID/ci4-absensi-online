<?php

namespace App\Models;

use CodeIgniter\Model;

class SiswaModel extends Model
{
    protected $table = 'siswa';
    protected $primaryKey = 'id';
    protected $returnType = 'object';
    protected $useTimestamps = true;
    protected $allowedFields = ['nis', 'nama', 'ttl', 'agama', 'id_kelas', 'id_role', 'telp_siswa', 'alamat_siswa', 'nama_ayah', 'nama_ibu', 'telp_ortu', 'alamat_ortu', 'status', 'avatar'];
}