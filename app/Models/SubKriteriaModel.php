<?php

namespace App\Models;

use CodeIgniter\Model;

class SubKriteriaModel extends Model
{
    protected $table      = 'sub_kriteria';
    protected $primaryKey = 'id_sub_kriteria';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_kriteria', 'sub_kriteria', 'nilai'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;



    // fitur search
    public function search($keyword)
    {
        $builder = $this->table('barang')
            ->like('kode_brg', $keyword)
            ->orLike('nama_brg', $keyword)
            ->orLike('satuan', $keyword)
            ->orLike('harga', $keyword);
        return $builder;
    }
}
