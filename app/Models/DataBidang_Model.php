<?php 
namespace App\Models;
use CodeIgniter\Model;


class DataBidang_Model extends Model
{
    protected $table = 'isi_bidang_tb';
    protected $primaryKey ='id_isi_bidang';
    protected $allowFields = ['nama_isi_bidang','id_bidang'];

    public function addDataBidang($data) 
    {
        $builder = $this->db->table($this->table);
        return $builder->insert($data);

    }
    
}
