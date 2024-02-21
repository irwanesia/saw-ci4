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

    protected $allowedFields = ['kode_hasil', 'id_alternatif', 'id_bulan', 'id_tahun', 'nilai', 'status'];

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

    public function simpanHasil($data)
    {
        return $this->insert($data);
    }

    public function getPeriode($bulan, $tahun)
    {
        $builder = $this->db->table('hasil');
        $builder->select('hasil.nilai, alternatif.alternatif');
        $builder->join('alternatif', 'hasil.id_alternatif = alternatif.id_alternatif');
        $builder->where('hasil.id_bulan', $bulan);
        $builder->where('hasil.id_tahun', $tahun);
        $query = $builder->get();

        return $query->getResultArray();
    }

    public function getCountHasilUnik()
    {
        $builder = $this->db->table('hasil');
        // Gunakan COUNT(DISTINCT column_name) untuk menghitung jumlah nilai unik
        $builder->select('COUNT(DISTINCT kode_hasil) as jumlah_unik');
        $query = $builder->get();

        return $query->getRow()->jumlah_unik; // Mengembalikan jumlah unik sebagai integer
    }
}
