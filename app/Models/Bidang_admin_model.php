<?php 
namespace App\Models;
use CodeIgniter\Model;

class Bidang_admin_model extends Model{

    protected $table = 'nama_bidang_tb';

    public function getNamaBidang($id = false){
        if ($id === false) {
            return $this->findAll();
        }else{
            return $this->getWhere(['id_bidang' => $id]);
        }
    }

    public function saveBidang($data){
        $builder = $this->db->table($this->table);
        return $builder->insert($data);
    }
}
