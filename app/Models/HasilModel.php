<?php

namespace App\Models;

use CodeIgniter\Model;

class HasilModel extends Model
{
    protected $table      = 'hasil';
    protected $primaryKey = 'id_hasil';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_alternatif', 'bulan', 'tahun', 'nilai', 'status'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    public function getDataByTahun($tahun = null)
    {
        if (!is_null($tahun)) {
            $this->where('tahun', $tahun);
        }
        return $this->findAll();
    }
}
