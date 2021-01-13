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

<<<<<<< HEAD
    public function editBidang($id){
        $model = new Bidang_admin_model;
        $getNamaBidang = $model->getNamaBidang($id)->getRow();
        if (isset($getNamaBidang)) {
            $data['bidang'] = $getNamaBidang;
            $data['title'] = 'Edit '.$getNamaBidang->nama_bidang;
            view('admin/pages/home_admin',$data);

        }
        else{
            '<script>
                    alert("ID barang '.$id.' Tidak ditemukan");
                    window.location="'.base_url('barang').'"
                </script>';

        }
=======
    public function editBidang($id) {
        
        $this->modelBidang->updateBidang([
            'id_bidang' => $id,
            'nama_bidang'=>$this->request->getVar('nama')
        ]);
        return redirect()->to('/homeadmin');
>>>>>>> a29566423eddaef0cb75b5d7afe4f00a8717df97
    }
}