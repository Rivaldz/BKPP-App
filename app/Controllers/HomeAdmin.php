<?php
namespace App\Controllers;
use CodeIgniter\Controller;
use App\Models\Bidang_admin_model;

class HomeAdmin extends Controller{

    public function index(){
        $model = new Bidang_admin_model;
        $data['title'] = 'Data Bidang';
        $data['getNamaBidang'] = $model->getNamaBidang();

        // echo view('header_view', $data);
        // echo view('barang_view', $data);
        // echo view('footer_view', $data);
        return view('admin/pages/home_admin',$data);

    }
}