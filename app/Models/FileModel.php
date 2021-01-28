<?php namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table      = 'files';
    protected $primaryKey = 'id_file';

    protected $allowedFields = ['nama_file', 'tipe_file', 'ukuran_file'];

    protected $useTimestamps = true;

    // public function insertFile($data)
    // {
        
    // }
}