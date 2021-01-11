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
}