<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Bidang_admin_model;

class HomeAdmin extends Controller{

    public function index(){
        $model = new Bidang_admin_model;
        $data['title'] = 'Data Bidang';
        $data['getNamaBidang'] = $model->getNamaBidang();
       return view('admin/pages/home_admin',$data);
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
    }
=======
    // public function editBidang() {
    //     $model =  new Bidang_admin_model;
    //     $data = 
    // }
>>>>>>> 81e40363ce99254987f3874dcac3595777e8ded1
}