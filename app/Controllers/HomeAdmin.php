<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Bidang_admin_model;

class HomeAdmin extends Controller{

    protected $modelBidang;

    public function __construct() {
        $this->modelBidang = new Bidang_admin_model();
    }

    public function index(){
        $model = new Bidang_admin_model;
        $data['title'] = 'Data Bidang';
        $data['getNamaBidang'] = $model->getNamaBidang();
        
        return view('admin/pages/home_admin',$data);
        // return dd($data['getNamaBidang']);
    }

    // public function tambah(){
    //     $data = 'tambah data bidang';
    //     return view('admin/pages/tambah_bidang',$data);
    // }

    public function addBidang(){
        $model = new Bidang_admin_model;
        $data = array(
            'nama_bidang' => $this->request->getPost('nama')
        );
        $model->saveBidang($data);
        echo '<script>
                 alert("Sukses Tambah Data Barang");
                 window.location="'.base_url('homeadmin').'"
              </script>';

    }

    public function editBidang($id) {
        
        $this->modelBidang->saveBidang([
            'id_bidang' => $id,
            'nama_bidang'=>$this->request->getVar('nama')
        ]);
        return redirect()->to('/homeadmin');
    }
}