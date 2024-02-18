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

    // Dalam model AlternatifModel atau model yang relevan
    public function getPenilaianByAlternatifAndKriteria($idAlternatif, $idKriteria)
    {
        $builder = $this->db->table('penilaian');
        $builder->select('penilaian.nilai, sub_kriteria.nilai as nilai_sub_kriteria');
        $builder->join('sub_kriteria', 'penilaian.nilai = sub_kriteria.id_sub_kriteria', 'left'); // Sesuaikan dengan kondisi join Anda
        $builder->where('penilaian.id_alternatif', $idAlternatif);
        $builder->where('penilaian.id_kriteria', $idKriteria);
        $query = $builder->get();

        return $query->getRowArray(); // Untuk single result atau getResultArray() untuk multiple results
    }

    public function getDistinctKriteria()
    {
        $builder = $this->db->table('penilaian p');
        $builder->select('p.id_kriteria, k.*');
        $builder->join('kriteria k', 'p.id_kriteria = k.id_kriteria');
        $builder->groupBy('p.id_kriteria');
        $builder->orderBy('p.id_kriteria', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getDistinctAlternatif()
    {

        return $this->select('id_alternatif')
            ->groupBy('id_alternatif')
            ->orderBy('id_alternatif', 'ASC')
            ->find();
    }

    public function getAllPenilaian($bulan, $tahun)
    {
        $builder = $this->db->table('penilaian p');
        $builder->select('p.*, a.alternatif');
        $builder->join('alternatif a', 'p.id_alternatif = a.id_alternatif');
        $builder->where('id_bulan', $bulan);
        $builder->where('id_tahun', $tahun);
        $builder->orderBy('p.id_alternatif', 'ASC');
        $builder->orderBy('p.id_kriteria', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }

    public function getNilaiMaxMin()
    {
        $builder = $this->db->table('penilaian');
        $builder->select('id_kriteria, MAX(nilai) as nilaiMax, Min(nilai) as nilaiMin');
        $builder->groupBy('id_kriteria');
        $builder->orderBy('id_kriteria', 'ASC');
        $builder->orderBy('id_alternatif', 'ASC');
        $query = $builder->get();
        return $query->getResultArray();
    }
}
