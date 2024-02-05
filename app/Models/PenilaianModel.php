<?php

namespace App\Models;

use CodeIgniter\Model;

class PenilaianModel extends Model
{
    protected $table      = 'penilaian';
    protected $primaryKey = 'id_penilaian';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['id_alternatif', 'id_kriteria', 'nilai'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;


    public function findAllPenilaian()
    {
        $builder = $this->builder();
        $builder->select('*');
        $builder->join('alternatif', 'alternatif.id_alternatif = penilaian.id_alternatif');
        $query = $builder->get();
        return $query->getResultArray(); // Mengembalikan semua baris hasil sebagai array
    }

    public function findPenilaian()
    {
        $builder = $this->builder();
        $builder->select('*');
        $builder->join('alternatif', 'penilaian.id_alternatif = alternatif.id_alternatif');

        // menambahkan kondisi jika $id disediakan
        if ($id == null) {
            // Menambahkan filter berdasarkan ID
            $builder->where('penilaian.id_penilaian', $id);
            $query = $builder->get();
            return $query->getRowArray(); // Mengembalikan satu baris hasil sebagai array
        }

        $query = $builder->get();
        return $query->getResultArray(); // Mengembalikan semua baris hasil sebagai array
    }
}
