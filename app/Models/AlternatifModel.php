<?php

namespace App\Models;

use CodeIgniter\Model;

class AlternatifModel extends Model
{
    protected $table      = 'alternatif';
    protected $primaryKey = 'id_alternatif';

    protected $useAutoIncrement = true;

    protected $returnType     = 'array';
    // protected $useSoftDeletes = true;

    protected $allowedFields = ['kode', 'alternatif'];

    protected $useTimestamps = false;
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    protected $validationRules    = [];
    protected $validationMessages = [];
    protected $skipValidation     = false;

    // membuat kode alternatif auto
    public function generateCode()
    {
        $builder = $this->table('alternatif');
        $builder->selectMax('kode', 'kodeMax');
        $query = $builder->get();

        if ($query->getNumRows() > 0) {
            $row = $query->getRow();
            $kodeMax = $row->kodeMax;

            // Mengambil angka dari kode terakhir (menghapus 'A' dan mengkonversi ke integer)
            $number = intval(substr($kodeMax, 1));

            // Menambahkan 1 ke angka tersebut
            $newNumber = $number + 1;

            // Membentuk kode baru dengan format 'A' diikuti oleh angka baru
            $newKode = 'A' . $newNumber;
        } else {
            // Jika tidak ada data, mulai dari 'A1'
            $newKode = 'A1';
        }

        return $newKode;
    }
}
