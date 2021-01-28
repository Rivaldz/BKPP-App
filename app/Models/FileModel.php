<?php namespace App\Models;

use CodeIgniter\Model;

class FileModel extends Model
{
    protected $table      = 'files_tb';
    protected $primaryKey = 'id_file';

    protected $allowedFields = ['name', 'type', 'size'];

    protected $useTimestamps = true;
    protected $createdField  = 'created_at';
}