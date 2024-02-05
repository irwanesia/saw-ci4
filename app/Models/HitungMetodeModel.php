<?php

namespace App\Models;

use CodeIgniter\Model;

class HitungMetodeModel extends Model
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


    // Buat query builder menggunakan Method getNilaiSubKriteria untuk mendapatkan nilai sub_kriteria
    public function getNilaiSubKriteria($idAlternatif, $idKriteria)
    {
        $builder = $this->db->table('penilaian');
        // $builder->select('nilai');
        $builder->select('sub_kriteria.nilai as n');
        $builder->join('sub_kriteria', 'penilaian.id_kriteria = sub_kriteria.id_kriteria');
        $builder->where('penilaian.id_alternatif', $idAlternatif);
        $builder->where('penilaian.id_kriteria', $idKriteria);
        // $builder->where('id_alternatif', $idAlternatif);
        // $builder->where('id_kriteria', $idKriteria);

        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getNilaiById($id_alternatif, $id_kriteria)
    {
        return $this->where('id_alternatif', $id_alternatif)
            ->where('id_kriteria', $id_kriteria)
            ->findAll();
    }
}
