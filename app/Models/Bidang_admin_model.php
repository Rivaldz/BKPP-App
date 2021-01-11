<?php 
namespace App\Models;
use CodeIgniter\Model;

class Bidang_admin_model extends Model{

    protected $table = 'nama_bidang_db';

    public function getNamaBidang($id = false){
        if ($if == false) {
            return $this->findAll();
        }else{
            return $this->getWhere(['id_bidang' => $id]);
        }
    }
}
