<?php  

namespace  App\Models;
use CodeIgniter\Model;

class FileModel extends Model {
    protected $table = 'files_tb';
    protected $primaryKey = 'id_file';
    protected $useTimestamps = true;
    protected $allowedFields = ['name', 'type'];
    protected $createdField = 'created_at';

    // public function getFile()
    // {
        
    // }
}