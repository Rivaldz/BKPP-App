<?php 
namespace App\Models;
use CodeIgniter\Model;

class Users_Model extends Model{

    protected $table = 'user_tb';
    protected $primaryKey = 'id_user';
    protected $allowedFields = ['username','password', 'id_bidang'];
    
    public function saveUser($data){
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }
}