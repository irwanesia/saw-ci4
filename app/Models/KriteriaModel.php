<?php

namespace App\Models;

use CodeIgniter\Model;

class KriteriaModel extends Model
{
    protected $table      = 'kriteria';
    protected $primaryKey = 'id_kriteria';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['kode_kriteria', 'nama', 'type', 'bobot', 'ada_pilihan'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    
    public function generateCode()
    {
        $builder = $this->table('barang');
        $builder->selectMax('kode_brg', 'kodeMax');
        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            foreach ($query->getResult() as $key) {
                $kd = '';
                $ambildata = substr((string)$key->kodeMax, -3);
                $increment = intval($ambildata) + 1;
                $kd = sprintf('%03s', $increment);
            }
        } else {
            $kd = '001';
        }

        return 'BRG-' . $kd;
    }

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
